<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
        //return Restaurant::all();
        $restaurant = Restaurant::paginate(25);
        return view('restaurant.index', ['title' => 'Restaurant',
                                            'restaurant' => $restaurant,]);
    }

    public function create(){
        return view('restaurant.create', ['title' => 'Add Restaurant']);
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
        
        return view('restaurant.edit', ['title' => 'Edit Restaurant', 
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
        return redirect('restaurant/'.$id);
    }

    public function destroy($id){
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect('/restaurant');
    }

    public function show($id){
        $restaurant = Restaurant::find($id);
        return view('restaurant.show', ['title' => 'Detail', 'restaurant' => $restaurant]);
    }
}
    