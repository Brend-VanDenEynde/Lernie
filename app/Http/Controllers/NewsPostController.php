<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function index()
    {
        return view('news.index');
    }
}