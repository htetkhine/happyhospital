<?php

namespace App\Http\Controllers\Frontend;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Traits\Translatable;

class DepartmentController extends Controller
{

    public function index($local){

        App::setLocale($local);
        $local = app()->getLocale();
        
        $departments = Department::withTranslations($local)->latest()->paginate(4);
        // $departments = Department::paginate();

        return view('departments',compact('departments'));
    }


    public function detail($local , $slug){
        // dd($local,$slug);
        App::setLocale($local);
        $local = app()->getLocale();

        $detail = Department::withTranslations($local)->where('slug','=', $slug)->firstOrFail();       
        // dd($detail);

       return view('single_department', compact('detail'));
    }
}
