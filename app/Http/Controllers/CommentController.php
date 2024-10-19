<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comment.list');
    }

    public function create()
    {
        return view ('admin.comment.create');
    } 

    public function store(Request $request)
    {
        //
    }

    public function edit(comment $comment)
    {
        return view('admin.comment.edit');
    }

    
    public function update(Request $request, comment $comment)
    {
        //
    }

    
    public function destroy(comment $comment)
    {
        //
    }
}
