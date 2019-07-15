<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarthnbuildingController extends Controller
{
    public function index(){
        $earthnbuilding = Earthnbuilding::all();
        return view('earthnbuilding', ['earthnbuilding => $earthnbuilding']);
    }

    public function add(){
        return view('add_earthnbuilding');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'kelurahan' => 'required',
            'address' => 'required',
            'buildingarea' => 'required',
            'surfacearea' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'information' => 'required',
        ]);

        Earthnbuilding::create([
            'name' => $request->name,
            'kelurahan' => $request->kelurahan,
            'address' => $request->address,
            'buildingarea' => $request->buildingarea,
            'surfacearea' => $request->surfacearea,
            'lat' => $request->lat,
            'long' => $request->long,
            'information' => $request->information,
        ]);

        return redirect('/pbb');
    }

    public function edit($id){
        $earthnbuilding = Earthnbuilding::find($id);
        return view('edit_pbb', [
            'earthnbuilding' => $earthnbuilding
        ]);
    }

    public function update($id, Request $request){
        
    }
}
