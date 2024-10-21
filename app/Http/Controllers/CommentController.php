<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data['comment'] = Comment::with('blogpost')->get();
        return view('admin.comment.list',$data);
    }

    public function create()
    {
        $data['blogs'] = BlogPost::all();
        return view ('admin.comment.create',$data);
    } 

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'content' =>'required',
        ]);
        $save                 = new Comment;
        $save->post_id        = $request->post_id;
        $save->content        = $request->content;
        $save->commenter_name = $request->commenter_name;
        $save->save();
        return redirect()->route('commentlist')->with('success','Comment Added Successfully..!!');
    }

    public function edit(Request $request,string $id)
    {
        $comment = Comment::find($id);
        $blogs = BlogPost::all();
        return view('admin.comment.edit',compact('comment','blogs'));
    }

    
    public function update(Request $request, string $id)
    {
        $save                 = Comment::find($id);
        $save->post_id        = $request->post_id;
        $save->content        = $request->content;
        $save->commenter_name = $request->commenter_name;
        $save->save();
        return redirect()->route('commentlist')->with('success','Comment Updated Successfully..!!');
    }

    
    public function destroy(string $id)
    {
        Comment::destroy($id);
        return redirect()->route('commentlist')->with('success','Comment Deleted Sucessfully...');
    }

    public function details(){
        $data['blogs'] = BlogPost::with('comments')->paginate(5);
        return view('admin.blogdetails.list',$data);
    }
}
