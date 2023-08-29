<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function CityView()
    {
        $cities = city::all();
        $countries = country::all() ;
        return view('city.index',compact('cities','countries'));
    }

    public function CityCreate()
    {
        $countries = country::all() ;
        return view('city.create',compact('countries')) ;
    }

    public function CityStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:cities,name',
            
        ]);


        $city = new city() ;
        $city->name = $request->input('name');
        $city->country_id = $request->input('country_id');
        $city->save() ;

        $notification = array(
    		'message' => 'City Created Successfully',
    		'alert-type' => 'success'
    	);

        return redirect()->route('city.index')->with($notification) ;

    }

    public function CityEdit($id)
    {
        $city = city::findOrFail($id);
        $countries = country::all();
        return view('city.update',compact('city','countries')) ;
    }

    public function CityUpdate(Request $request, $id)
    {
        $city = city::findOrFail($id) ;

        $validatedData = $request->validate([
            'name' => 'required|unique:cities,name,'.$city->id,
            
        ]);


        $city = city::findOrFail($id) ;
        $city->name = $request->input('name');
        $city->country_id = $request->input('country_id') ;
        $city->save() ;

        $notification = array(
    		'message' => 'City Updated Successfully',
    		'alert-type' => 'info'
    	);

        return redirect()->route('city.index')->with($notification) ;


    } 

    public function CityDelete($id)
    {
        $city = city::findOrFail($id) ;
        $city->delete();
        return redirect()->route('city.index') ;

    }
}
