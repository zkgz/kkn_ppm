<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxpayer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['welcome', 'stats']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home', ['title' => 'Home',]);
    }

    public function welcome() {
        $this->stats();
        return view('Welcome', ['title' => 'KKN PPM Unhas']);
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
}
