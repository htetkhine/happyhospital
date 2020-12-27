<?php

namespace App\Http\Controllers;

// use App\Siteinfo;

use App\Department;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;


class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::get();        
        $pages = Page::get();


        $departments = Department::where('add_home',true)
                        ->where('status','published')
                        ->get();
        
        // return View('welcome',['posts'=>$posts]);
        return View("welcome",[
            'posts'=> $posts,
            'pages'=>$pages,
            'departments'=>$departments
            ]);
    }
}


