<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Earthnbuilding;

class EarthnbuildingController extends Controller
{
    
    public function index(){
        $earthnbuilding = Earthnbuilding::all();
        return view('earthnbuilding.index', ['title' => 'Pbb',
                                            'earthnbuilding' => $earthnbuilding]);
    }

    public function create(){
        $list_kelurahan = array( 'Bacukiki' => ['Galung Maloang' => 'Galung Maloang',
                                                'Lemoe' => 'Lemoe',
                                                'Lumpue' => 'Lumpue',
                                                'Watang Bacukiki' => 'Watang Bacukiki'],
                                'Bacukiki Barat' => ['Bumi Harapan' => 'Bumi Harapan',
                                                    'Cappa Galung' => 'Cappa Galung',
                                                    'Kampung Baru' => 'Kampung Baru',
                                                    'Lumpue' => 'Lumpue',
                                                    'Sumpang Minangae' => 'Sumpang Minangae',
                                                    'Tiro Sompe' => 'Tiro Sompe'],
                                'Soreang' => ['Bukit Harapan' => 'Bukit Harapan',
                                            'Bukit Indah' => 'Bukit Indah',
                                            'Kampung Pisang' => 'Kampung Pisang',
                                            'Lakessi' => 'Lakessi',
                                            'Ujung Baru' => 'Ujung Baru',
                                            'Ujung Lare' => 'Ujung Lare',
                                            'Watang Soreang' => 'Watang Soreang'],
                                'Ujung' => ['Labukkang' => 'Labukkang',
                                            'Lapadde' => 'Lapadde',
                                            'Mallusetasi' => 'Mallusetasi',
                                            'Ujung Bulu' => 'Ujung Bulu',
                                            'Ujung Sabbang' => 'Ujung Sabbang'],
        );
        return view('earthnbuilding.create', ['title' => 'Add PBB', 'list_kelurahan' => $list_kelurahan]);
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required',
            'region' => 'required',
            'address' => 'required',
            'building' => 'required',
            'soil' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'information' => 'required',
        ]);

        Earthnbuilding::create([
            'name' => $request->name,
            'region' => $request->region,
            'address' => $request->address,
            'building' => $request->building,
            'soil' => $request->soil,
            'lat' => $request->lat,
            'long' => $request->long,
            'information' => $request->information,
        ]);

        return redirect('/pbb');
    }

    public function edit($id){
        $earthnbuilding = Earthnbuilding::find($id);
        $list_kelurahan = array( 'Bacukiki' => ['Galung Maloang' => 'Galung Maloang',
                                                'Lemoe' => 'Lemoe',
                                                'Lumpue' => 'Lumpue',
                                                'Watang Bacukiki' => 'Watang Bacukiki'],
                                'Bacukiki Barat' => ['Bumi Harapan' => 'Bumi Harapan',
                                                    'Cappa Galung' => 'Cappa Galung',
                                                    'Kampung Baru' => 'Kampung Baru',
                                                    'Lumpue' => 'Lumpue',
                                                    'Sumpang Minangae' => 'Sumpang Minangae',
                                                    'Tiro Sompe' => 'Tiro Sompe'],
                                'Soreang' => ['Bukit Harapan' => 'Bukit Harapan',
                                            'Bukit Indah' => 'Bukit Indah',
                                            'Kampung Pisang' => 'Kampung Pisang',
                                            'Lakessi' => 'Lakessi',
                                            'Ujung Baru' => 'Ujung Baru',
                                            'Ujung Lare' => 'Ujung Lare',
                                            'Watang Soreang' => 'Watang Soreang'],
                                'Ujung' => ['Labukkang' => 'Labukkang',
                                            'Lapadde' => 'Lapadde',
                                            'Mallusetasi' => 'Mallusetasi',
                                            'Ujung Bulu' => 'Ujung Bulu',
                                            'Ujung Sabbang' => 'Ujung Sabbang'],
        );
        return view('earthnbuilding.edit', [
            'earthnbuilding' => $earthnbuilding,
            'list_kelurahan' => $list_kelurahan
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name' => 'required',
            'region' => 'required',
            'address' => 'required',
            'building' => 'required',
            'soil' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'information' => 'required',
        ]);

        $earthnbuilding = Earthnbuilding::find($id);
        $earthnbuilding->name = $request->name;
        $earthnbuilding->region = $request->region;
        $earthnbuilding->address = $request->address;
        $earthnbuilding->building = $request->building;
        $earthnbuilding->soil = $request->soil;
        $earthnbuilding->lat = $request->lat;
        $earthnbuilding->long = $request->long;
        $earthnbuilding->information = $request->information;

        $earthnbuilding->save();
        
        return redirect('/pbb');
    }

    public function show($id){
        $pbb = Earthnbuilding::find(id);
        return view('earthnbuilding.show')->with('pbb', $pbb);
    }

    public function destroy($id){
        $earthnbuilding = Earthnbuilding::find($id);
        $earthnbuilding->delete();
        return redirect('/pbb');
    }
}
