<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data['Record'] = User::get();
        return view('admin.user.list',$data);
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $save        = new User;
        $save->name  = $request->name;
        $save->email = $request->email;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('asset/user'),$imageName);
            $save->image = $imageName;
        }
        $save->bio   = $request->bio;
        $save->save();
        return redirect()->route('userlist')->with('success','User Added Successfully..!!');
    }
    public function edit($id){
        $data['user'] = User::find($id);
        return view('admin.user.edit',$data);
    }
    public function update(Request $request,$id){
        // dd($request->all());
        $save        = User::find($id);
        $save->name  = $request->name;
        $save->email = $request->email;
        if($request->hasFile('image')){
           if($save->image && file_exists(public_path('asset/user/'.$save->image))){
                unlink(public_path('asset/user/'.$save->image));
        }       
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('asset/user/'),$imageName);
        $save->image = $imageName;
        }
        $save->bio   = $request->bio;
        $save->save();
        return redirect()->route('userlist')->with('success','User Updated Successfully..!!');      
    }
    public function destroy($id) {
        $user = User::find($id);
        if ($user) {
            if ($user->image && file_exists(public_path('asset/user/' . $user->image))) {
                unlink(public_path('asset/user/' . $user->image));
            }
            User::destroy($id); 
            return redirect()->route('userlist')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('userlist')->with('error', 'User not found');
        }
    }
    
}