<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::paginate(5);
    	$tags = Tag::get();

    	return view('home',compact('posts', 'tags'));
    }

    public function category($slug)
    {
    	$posts = Category::where('slug', $slug)->first()->posts()->paginate(5);
    	return view('home',compact('posts'));
    }

    public function detailPost($slug)
    {
    	$post = Post::where('slug', $slug)->first();
    	return view('post',compact('post'));
    }

    public function listPostByTag($slug)
    {
    	$posts = Tag::where('slug', $slug)->first()->posts()->paginate(5);
    	$tags = Tag::get();
    	return view('home',compact('posts', 'tags'));
    }
}
