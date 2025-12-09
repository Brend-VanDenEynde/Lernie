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
}