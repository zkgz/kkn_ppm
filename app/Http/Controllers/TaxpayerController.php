<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Taxpayer;

class TaxpayerController extends Controller{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(){
        $taxpayer = Taxpayer::paginate(25);
        return view('taxpayer.index', ['title' => 'Taxpayer', 'taxpayer' => $taxpayer,]);
    }

    public function create(){
        return view('taxpayer.create', ['title' => 'Add Taxpayer']);
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'information' => 'required'
    	]);
 
        Taxpayer::create([
    		'name' => $request->name,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->long,
            'information' => $request->information
    	]);
 
    	return redirect('/taxpayer');
    }

    public function edit($id){
        $taxpayer = taxpayer::find($id);
        
        return view('taxpayer.edit', ['title' => 'Edit Taxpayer', 'taxpayer' => $taxpayer]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name'          => 'required',
            'address'       => 'required',
            'lat'           => 'required',
            'long'          => 'required',
            'information'   => 'required'
        ]);
    
        $taxpayer = taxpayer::find($id);
        $taxpayer->name           = $request->name;
        $taxpayer->address        = $request->address;
        $taxpayer->lat            = $request->lat;
        $taxpayer->long           = $request->long;
        $taxpayer->information    = $request->information;

        $taxpayer->save();
        return redirect('taxpayer/'.$id);
    }

    public function destroy($id){
        $taxpayer = taxpayer::find($id);
        $taxpayer->delete();
        return redirect('/taxpayer');
    }

    public function show($id){
        $taxpayer = taxpayer::find($id);
        return view('taxpayer.show', ['title' => 'Detail', 'taxpayer' => $taxpayer]);
    }
}
    