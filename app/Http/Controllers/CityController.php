<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
   public function index(){
      $data['cities'] = City::with('state.country')->get();
      return view('admin.city.list',$data);
   }
   public function create(){
      $data['countries'] = Country::all(); // Fetch all countries
      return view('admin.city.create',$data);
   }
   public function store(Request $request){
    $save = new City;
    $save->country_id = $request->country_id;
    $save->state_id = $request->state_id;
    $save->name = $request->city_name;
    $save->save();
    return redirect()->route('citylist')->with('success','City Added Successfully....!');
   }
   // Important for getting state related to country
   public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }
   public function edit($id){
      $city = City::find($id);
      $countries = Country::all();
      $states = State::where('country_id', $city->state->country_id)->get();
      return view('admin.city.edit', compact('city', 'countries', 'states'));
    }
    public function update(Request $request,$id){
      $city             = City::find($id);
      $city->country_id = $request->country_id;
      $city->state_id   = $request->state_id;
      $city->name       = $request->city_name;
      $city->save();
      
      return redirect()->route('citylist')->with('success','City Updated Successfully....!');
    }
    public function destroy(Request $request,$id){
      City::destroy($id);
      return redirect()->route('citylist')->with('success','City Deleted Sucessfully...');
  }
}