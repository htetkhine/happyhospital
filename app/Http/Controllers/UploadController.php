<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class UploadController extends Controller
{

     //create

     public function create(){
        
        return view('backend.siteinfoUpload');
    }

    public function upload(Request $request){

        if($request->file) {

            // $imageName = $request->file->getClientOriginalName();
            // $request->file->move(public_path('upload'),$imageName);

            // $request->session()->flash('alert-success', 'Image was successful added!');
            // return redirect()->route('home');

            $image = $request->file('file');

            $imageName = time().'.'.$image->extension();
        
            $images = $image->move(public_path('upload/'),$imageName);
   
          // return view('default.header')->with('images',$images);
          // return view('default.header',[ 'images' => $images]);
          // return View('default.header')->with(array('images'=>$images));
        }
    }

    function fetch()
    {
     $images = \File::allFiles(public_path('upload/'));
     
     $output = '<div class="row">';
     foreach($images as $image)
     {
      $output .= '
      <div class="col-md-4" style="margin:25px 0;" align="center">
                <img src="'.asset('upload/' . $image->getFilename()).'" class="img-thumbnail img-responsive" />
                <button style="text-decoration:none;" type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            </div>
      ';
     }
     $output .= '</div>';
     echo $output;

    
    }

    function delete(Request $request)
    {
     if($request->get('name'))
     {
       \File::delete(public_path('upload/' . $request->get('name')));
     }
    }
}
