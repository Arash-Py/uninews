<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('tazasgayan',compact('news'));
    }

    public function details(News $news){
        return view('web.details',compact('news'));
    }
}
