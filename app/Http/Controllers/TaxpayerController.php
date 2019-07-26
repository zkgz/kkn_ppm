<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Taxpayer;
use File;
use App\Imports\TaxpayersImport;
use Maatwebsite\Excel\Facades\Excel;

class TaxpayerController extends Controller{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'stats']]);
    }

    public function index(){
        $taxpayer = Taxpayer::all();
        return view('taxpayer.index', ['title' => 'Taxpayer', 'taxpayer' => $taxpayer,]);
    }

    public function create(){
        return view('taxpayer.create', ['title' => 'Add Taxpayer']);
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name'          => 'required',
            'type'          => 'required',
            'region'        => 'required',
            'address'       => 'required',
            'lat'           => 'required',
            'long'          => 'required',
            'information'   => 'required',
            'pajak_per_bulan'   => 'nullable',
            'potensi_pajak_per_bulan'   => 'nullable',
            'photo'         => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
    	]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        if(!is_null($file))
		    $photo_name = time()."_".$file->getClientOriginalName();
        else
            $photo_name = null;
          
            // isi dengan nama folder tempat kemana file diupload
        $upload_folder = 'data_file';

        if(!is_null($file))
		    $file->move($upload_folder,$photo_name);

        Taxpayer::create([
            'name'                       => $request->name,
            'type'                       => $request->type,
            'region'                     => $request->region,
            'address'                    => $request->address,
            'lat'                        => $request->lat,
            'long'                       => $request->long,
            'pajak_per_bulan'            => $request->pajak_per_bulan,
            'potensi_pajak_per_bulan'    => $request->potensi_pajak_per_bulan,
            'information'                => $request->information,
            'photo'                      => $photo_name
    	]);
 
    	return redirect('/taxpayer');
    }

    public function edit($id){
        $taxpayer = Taxpayer::find($id);
        return view('taxpayer.edit', ['title' => 'Edit Taxpayer', 'taxpayer' => $taxpayer]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name'                       => 'required',
            'type'                       => 'required',
            'region'                     => 'required',
            'address'                    => 'required',
            'lat'                        => 'required',
            'long'                       => 'required',
            'information'                => 'required',
            'pajak_per_bulan'            => 'nullable',
            'potensi_pajak_per_bulan'    => 'nullable',
            'photo'                      => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        if(!is_null($file))
           $photo_name = time()."_".$file->getClientOriginalName();
        else
            $photo_name = null;

         // isi dengan nama folder tempat kemana file diupload
        $upload_folder = 'data_file';
        if(!is_null($file))
           $file->move($upload_folder,$photo_name);
    
        $taxpayer = Taxpayer::find($id);
        $taxpayer->name                     = $request->name;
        $taxpayer->type                     = $request->type;
        $taxpayer->region                   = $request->region;
        $taxpayer->address                  = $request->address;
        $taxpayer->lat                      = $request->lat;
        $taxpayer->long                     = $request->long;
        $taxpayer->information              = $request->information;
        $taxpayer->pajak_per_bulan          = $request->pajak_per_bulan;
        $taxpayer->potensi_pajak_per_bulan  = $request->potensi_pajak_per_bulan;
        $taxpayer->photo                    = $photo_name;

        $taxpayer->save();
        return redirect('taxpayer/'.$id);
    }

    public function destroy($id){
        $taxpayer = Taxpayer::find($id);
        $taxpayer->delete();

        // Delete file
        File::delete('data_file/'.$taxpayer->photo);

        return redirect('/taxpayer');
    }

    public function show($id){
        $taxpayer = Taxpayer::find($id);
        return view('taxpayer.show', ['title' => 'Detail', 'taxpayer' => $taxpayer]);
    }

    public function stats() {
        $tp = Taxpayer::all();

        $taxpayers = [];

        foreach($tp as $key => $value) {
            $taxpayers[$value->region]['Restaurant'] = 0;
            $taxpayers[$value->region]['Parking'] = 0;
            $taxpayers[$value->region]['Property'] = 0;
            $taxpayers[$value->region]['Hotel'] = 0;
            $taxpayers[$value->region]['Region'] = $value->region;
        }
        
        foreach($tp as $key => $value) {
            $taxpayers[$value->region][$value->type] += $value->pajak_per_bulan;
        }
        $this->updateData($taxpayers);
        return view('taxpayer.stats', ['title' => 'Statistics', 'taxpayers' => $taxpayers]);
    }

    private function updateData($taxpayers) {
        $jsonString = file_get_contents('parepare.json');
        $decoded = json_decode($jsonString, true);
        $i = 0;
        foreach($decoded["features"] as & $kelurahan) {
            $decoded["features"][$i]["properties"]["pajak_per_bulan"] = 0;
            foreach($taxpayers as $taxpayer) {
                if($decoded["features"][$i]["properties"]["NAME_4"] == $taxpayer['Region']) {
                    $decoded["features"][$i]["properties"]["pajak_per_bulan"] = $taxpayer['Parking'] + $taxpayer['Hotel'] + $taxpayer['Property'] + $taxpayer['Restaurant'];
                    break;
                }
            }
            $i++;
        }

        $newJsonString = json_encode($decoded);
        file_put_contents('taxpayer.json', $newJsonString);
    }
    public function import() {
        \Excel::import(new TaxpayersImport, public_path('PajakBumiBangunan.xlsx'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
