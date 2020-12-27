<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class AboutController extends Controller
{
    public function index(){
        $about_dataes = Page::where('id', 2)->get();
        return view('about',compact('about_dataes'));
    }
}
