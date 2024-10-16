<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(){
        $data['Record'] = State::with('country')->get(); // Fetch states with associated countries
        return view('admin.state.list', $data);
    }
    public function create(){
        $data['Country'] = Country::all(); // Fetch all countries
        return view('admin.state.create',$data);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $save             = new State;
        $save->country_id = $request->country_id;
        $save->name       = $request->state;
        $save->save();
        return redirect()->route('statelist')->with('success','State Added Successfully..');
    }
    public function edit($id)
    {
        $state = State::find($id); // Find the state
        $countries = Country::all(); // Fetch all countries
        return view('admin.state.edit', compact('state', 'countries'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $state = State::find($id);
        $state->country_id = $request->country_id;
        $state->name = $request->state;
        $state->save();
        return redirect()->route('statelist')->with('success','State Updated Successfully..');
    }
    public function destroy(Request $request,$id){
        State::destroy($id);
        return redirect()->route('statelist')->with('success','State Deleted Sucessfully...');
    }

}
