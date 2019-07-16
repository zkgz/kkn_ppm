<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
        //return Restaurant::all();
        $restaurant = Restaurant::all();
        return view('restaurant/restaurant', ['title' => 'Restaurant',
                                            'restaurant' => $restaurant,]);
    }

    public function add(){
        return view('restaurant/add_restaurant', ['title' => 'Add Restaurant']);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'information' => 'required'
    	]);
 
        Restaurant::create([
    		'name' => $request->name,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->long,
            'information' => $request->information
    	]);
 
    	return redirect('/restaurant');
    }

    public function edit($id){
        $restaurant = Restaurant::find($id);
        return view('restaurant/edit_restaurant', ['title' => 'Edit Restaurant', 
                                                'restaurant' => $restaurant]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'information' => 'required'
        ]);
    
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->lat = $request->lat;
        $restaurant->long = $request->long;
        $restaurant->information = $request->information;

        $restaurant->save();
        return redirect('/restaurant');
    }

    public function delete($id){
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect('/restaurant');
    }

    public function show($id){
        $restaurant = Restaurant::find($id);
        return view('restaurant/show_restaurant', ['title' => 'Detail', 'restaurant' => $restaurant]);
    }
}
    