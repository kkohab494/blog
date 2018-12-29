<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::latest()->take(6)->get();
    	$categories = Category::all();
    	return view('welcome', compact('categories', 'posts'));
    }
}
