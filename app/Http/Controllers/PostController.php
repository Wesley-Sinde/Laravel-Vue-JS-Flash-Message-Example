<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    Use App\Models\Post;

class PostController extends Controller
{
   
    public function store(Request $request)
    {
        $insert['title'] = $request->get('title');
        $insert['description'] = $request->get('description');
        $check = Post::insertGetId($insert);
        return response()->json($check);
    }
}
