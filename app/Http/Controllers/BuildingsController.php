<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Building;

class BuildingsController extends Controller
{
    public function index()
    {
        // 建物一覧をidの昇順で取得
        $buildings = Building::orderBy('id', 'asc')->paginate(10);

        // 管理物件一覧ビューでそれを表示
        return view('buildings.index', [
            'buildings' => $buildings
        ]);
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
            
            // 建物一覧をidの昇順で取得
            $buildings = Building::orderBy('id', 'asc')->paginate(10);
    
            // 管理物件一覧ビューでそれを表示
            return view('buildings.index', [
                'buildings' => $buildings
            ]);
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
        
        // 建物一覧をidの昇順で取得
        $buildings = Building::orderBy('id', 'asc')->paginate(10);

        // 管理物件一覧ビューでそれを表示
        return view('buildings.index', [
            'buildings' => $buildings
        ]);
    }
    
    public function destroy($id)
    {
        // idの値で建物を検索して取得
        $building = Building::findOrFail($id);
        
        $building->delete();
        
        // 建物をidの降順で取得
        $buildings = Building::orderBy('id', 'asc')->paginate(10);

        // 管理物件一覧ビューでそれを表示
        return view('buildings.index', [
            'buildings' => $buildings
        ]);
    }
}
