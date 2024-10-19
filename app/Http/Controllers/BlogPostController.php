<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $data['Record'] = BlogPost::get();
        return view ('admin.blogpost.list',$data);
    }

    public function create()
    {
        return view ('admin.blogpost.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:200',
            'author_name' =>'required',
            'published'=>'required'
        ]);

        $save               = new BlogPost;
        $save->title        = $request->title;
        $save->content      = $request->content;
        $save->author_name  = $request->author_name;
        $save->published_at = $request->published;
        $save->save();
        return redirect()->route('blogpostlist')->with('success','Blog Post Added Successfully..!');
    }

    
    public function edit(string $id)
    {
        $data['Record'] = BlogPost::find($id);
        return view ('admin.blogpost.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        $save               = BlogPost::find($id);
        $save->title        = $request->title;
        $save->content      = $request->content;
        $save->author_name  = $request->author_name;
        $save->published_at = $request->published;
        $save->save();
        return redirect()->route('blogpostlist')->with('success','Blog Post Updated Successfully..!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogPost::destroy($id);
        return redirect()->route('blogpostlist')->with('success','Blog Post Deleted Successfully...');
    }
}
