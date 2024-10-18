<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $data['Record'] = Country::paginate(2); 
        return view('admin.country.list',$data);
    }
    public function create(){
        return view('admin.country.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $pract = new Country;
        $pract->name = $request->country;
        $pract->save();
        return redirect()->route('countrylist')->with('success','Country Added Successfully..');
    }
    public function edit(Request $request,$id){
        $data['Record'] = Country::find($id);
        return view('admin.country.edit',$data);
    }
    public function update(Request $request,$id){
        // dd($request->all());
        $output = Country::find($id);
        $output->name = $request->country;
        $output->save();
        return redirect()->route('countrylist')->with('success','Country Updated Sucessfully...');
    }
    public function destroy(Request $request,$id){
        Country::destroy($id);
        return redirect()->route('countrylist')->with('success','Country Deleted Sucessfully...');
    }
}
