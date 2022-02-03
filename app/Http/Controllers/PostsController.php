<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create(Request $request)
    {
        $posts = new Post;
        $posts->user_id = Auth::id(); //ここでログインしているユーザidを登録しています
        $posts->post = $request->post;
        $posts->save();

        return view('posts.index');
    }

    protected function loggedOut(Request $request)
    {
        return redirect('layouts.logout');
    }
}
