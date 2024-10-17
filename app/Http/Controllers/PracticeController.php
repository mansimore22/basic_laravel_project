<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        $data['Record'] = Practice::get();
        return view('admin.practice.list',$data);
    }

    public function create()
    {
        return view('admin.practice.create');
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'skills' => 'array', // Skills can be an array
            'gender' => 'required|string',
            'position' => 'required|string',
        ]);
        

        $data = new Practice;
        $data->date = $request->dob;
        $data->link = $request->website;
        $data->skill = implode(',', $request->skills);
        $data->gender = $request->gender;
        $data->position = $request->position;
        $data->save();
        return redirect()->route('practicelist')->with('success','Practice Data Added Successfully..!!');

    }

    
    public function edit(String $id)
    {
        $data['Record'] = Practice::find($id);
        return view('admin.practice.edit',$data);
    }

    
    public function update(Request $request, String $id)
    {
        // dd($request->all());
        $request->validate([
            'skills' => 'array', // Skills can be an array
            'gender' => 'required|string',
            'position' => 'required|string',
        ]);
        

        $data = Practice::find($id);
        $data->date = $request->dob;
        $data->link = $request->website;
        $data->skill = implode(',', $request->skills);
        $data->gender = $request->gender;
        $data->position = $request->position;
        $data->save();
        return redirect()->route('practicelist')->with('success','Practice Data Updated Successfully..!!');
    }

    
    public function destroy(string $id)
    {
        Practice::destroy($id);
        return redirect()->route('practicelist')->with('success','Practice Details Deleted Sucessfully...');
    }
}
