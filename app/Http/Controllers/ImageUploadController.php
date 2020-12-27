<?php

namespace App\Http\Controllers;

use App\Siteinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\VarDumper\VarDumper;
use App\Http\Requests\AddressStoreController;
use App\Http\Requests\AddressEditController;

class ImageUploadController extends Controller
{

    public function index(){
        
        $siteinfos = Siteinfo::all();
        return view('backend.siteinfo',compact('siteinfos'));
    }  

    public function store(AddressStoreController $request) {    

        $siteinfo = Siteinfo::create($request->only('address','phone','email'));

        return redirect()->route('siteinfo.index');
       
    }
    //create

    public function create(){
        
        return view('backend.siteinfoCreate');
    }

    //edit

    public function edit($id) {

        $siteinfo = Siteinfo::find($id);
        return view('backend.siteinfoEdit',compact('siteinfo'));
    }

    public function edit_submit(AddressEditController $request, Siteinfo $id)
    {

        $id->update($request->only('address','phone','email'));

        return redirect()->route('siteinfo.index');
    }

    public function destroy(Request $request, Siteinfo $id) {

        $id->delete();

        return redirect()->route('siteinfo.index');
    }    
}
