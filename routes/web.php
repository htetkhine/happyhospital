<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

// use Illuminate\Support\Routing\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::redirect('/','/en');
// Route::redirect('/about-us','/en/about-us');
// Route::redirect('/departments','/en/departments');
// Route::redirect('/departments/{slug}','/en/departments/{slug}');
Route::redirect('/home','/en');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    //contact information
    Route::get('/site-info', 'ImageUploadController@index')->name('siteinfo.index');
    Route::get('/site-info/create', 'ImageUploadController@create')->name('siteinfo.create');  
    Route::post('/site-info','ImageUploadController@store')->name('siteinfo.store');
    
    Route::get('/site-info/edit/{id}', 'ImageUploadController@edit')->name('siteinfo.edit');
    Route::patch('/site-info/edit/{id}', 'ImageUploadController@edit_submit')->name('siteinfo.update');
    Route::delete('/site-info/{id}','ImageUploadController@destroy')->name('siteinfo.destroy');

    //image uplaod
    Route::get('/site-info/upload', 'UploadController@create');
    Route::post('/site-info/upload','UploadController@upload')->name('image.upload');

    Route::get('site-info/fetch', 'UploadController@fetch')->name('image.fetch');
    Route::get('site-info/delete', 'UploadController@delete')->name('image.delete');
}); 

Route::get('/', function () {
    return redirect(app()->getLocale());
});


Route::group(['prefix' => '{locale}','where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setlocale'], function() {

    Route::get('/', 'HomeController@index')->name('home'); 
    
    Route::get('/','WelcomeController@index')->name('welcome');
     //about
    Route::get('/about-us', 'Frontend\AboutController@index')->name('about');
    //departments
    Route::get("/departments", "Frontend\DepartmentController@index")->name('departments');

    Route::get("/departments/{slug}", "Frontend\DepartmentController@detail")->name('single');
   
    Auth::routes(['login'=>false,'register'=>false]);

    
    // Route::get('/home', function(Request $request){
    //     if($request->route()->named("/home/{id}")) {
    //         return redirect()->route('home');
    //     }
    // });
});






