<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function countries()
    {
        $countries = country::all() ;
        return view('country.index',compact('countries')) ;

    }


    public function addcountries()
    {
        return view('country.create') ;
    }


    public function storecountries(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:countries,name',
            
        ]);
        

        $count = new country() ;
        $count->name = $request->input('name') ;
        $count->save() ;

        $notification = array(
    		'message' => 'Country Added Successfully',
    		'alert-type' => 'success'
    	);

        return redirect()->route('countries')->with($notification) ;

    }


    public function editcountries($id)
    {
        $count = country::findOrFail($id) ;
        return view('country.update',compact('count')) ;
    }
    

    public function updatecategories(Request $request , $id)
    {
        $count = country::findOrFail($id) ;

        $validatedData = $request->validate([
            'name' => 'required|unique:countries,name,'.$count->id,
            
        ]);

        $count->name = $request->input('name') ;
        $count->save() ;

        $notification = array(
    		'message' => 'Country Updated Successfully',
    		'alert-type' => 'success'
    	);

        return redirect()->route('countries')->with($notification) ;
    }

    public function delcountries($id)
    {
        $count = country::findOrFail($id) ;
        $count->delete();

        $notification = array(
            'message' => 'Country Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('countries')->with($notification) ;
    }

}