<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqsController extends Controller
{
    public function index()
    {
        //FAQをidの昇順で取得
        $faqs = Faq::orderBy('id', 'asc')->paginate(20);

        // 一覧ビューでそれを表示
        return view('faqs.index', [
            'faqs' => $faqs
        ]);
    }
    
    public function show($id)
    {
        //idでFAQ情報を取得
        $faq = Faq::find($id);
        
        return view('faq.show', [
            'faq' => $faq
        ]);
    }
    
    public function create()
    {
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            $faq = new Faq;
            return view('faqs.create', [
                'faq' => $faq
            ]);
            
        } else {
            //社員以外はtopにリダイレクト
            return redirect('/');
        }
    }
    
    public function store(Request $request)
    {
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            //バリデーション
            $request->validate([
                'question' => 'required|max:255',
                'answer' => 'required|max:255'
            ]);
            
            $faq = new Faq;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->created_userName = $request->user()->name;
            $faq->updated_userName = $request->user()->name;
            $faq->save();
            
            return view('faqs.show', [
                'faq' => $faq
            ]);
            
        } else {
            //社員以外はtopにリダイレクト
            return redirect('/');  
        }
    }
    
    public function edit($id)
    {
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            // 編集したいFAQを検索して取得
            $faq = Faq::findOrFail($id);
            
            // FAQ編集画面を開く
            return view('faqs.edit', [
               'faq' => $faq
            ]);
            
        } else {
            //社員以外はtopにリダイレクト
            return redirect('/'); 
        }
    }
    
    public function update(Request $request, $faqId)
    {
        // 認証済みユーザを取得
        $user = \Auth::user();
        if ($user->category == 5) { // 社員の場合
        
            //バリデーション
            $request->validate([
                'question' => 'required|max:255',
                'answer' => 'required|max:255'
            ]);
            
            //faqIdの値でFAQ情報を検索して取得
            $faq = Faq::findOrFail($faqId);
            //FAQ情報を更新
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->updated_userName = $request->user()->name;
            $faq->save();
        
            return view('faq.show', [
                'faq' => $faq
            ]);
        
        } else {
            //社員以外はtopにリダイレクト
            return redirect('/'); 
        }
    }
    
    public function destroy($id)
    {
        //idの値でFAQを検索して取得
        $faq = Faq::findOrFail($id);
        
        $faq->delete();
        
        //FAQをidの降順で取得
        $faqs = Faq::orderBy('id', 'asc')->paginate(20);

        //FAQ一覧ビューでそれを表示
        return view('faqs.index', [
            'faqs' => $faqs
        ]);
    }
    
}
