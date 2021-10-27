<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Building;

class BuildingsController extends Controller
{
    public function index(Request $rq)
    {
        ///キーワード受け取り
        $keyword = $rq->input('keyword');
    
        //クエリ生成
        $query = \App\Building::query();
    
        //もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('name','like','%'.$keyword.'%');
            $query->orWhere('address','like','%'.$keyword.'%');
        }
    
        // 全件取得 +ページネーション
        $buildings = $query->orderBy('id','desc')->paginate(10);
        return view('buildings.index')->with('buildings',$buildings)->with('keyword',$keyword);
    }
    
    public function create()
    {
        $building = new Building;
        return view('buildings.create', [
            'building' => $building,
        ]);
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'units' => 'required|max:10'
        ]);
        
            $building = new Building;
            $building->name = $request->name;
            $building->address = $request->address;
            $building->units = $request->units;
            $building->save();
            
            return redirect()->to('buildings');
    }
    
    public function edit($id)
    {
        // 編集したい建物検索して取得
        $building = Building::findOrFail($id);
        
        // 建物編集画面を開く
        return view('buildings.edit', [
           'building' => $building
        ]);
    }
    
    public function update(Request $request, $buildingId)
    {
        //バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'units' => 'required|max:10'
        ]);
        
        // buildingIdの値で建物情報を検索して取得
        $building = Building::findOrFail($buildingId);
        // 建物情報を更新
        $building->name = $request->name;
        $building->address = $request->address;
        $building->units = $request->units;
        $building->save();
        
        return redirect()->to('buildings');
    }
    
    public function destroy($id)
    {
        // idの値で建物を検索して取得
        $building = Building::findOrFail($id);
        
        $building->delete();
        
        return redirect()->to('buildings');
    }
}
