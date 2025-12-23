<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function index()
    {
        $newsPosts = NewsPost::latest()->get(); 
        
        return view('news.index', compact('newsPosts'));
    }

    public function show(NewsPost $newsPost)
    {
        return view('news.show', compact('newsPost'));
    }
}