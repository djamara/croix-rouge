<?php

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

Route::get('/', function () {
    return view('accueil');
});

Route::get('/admin', function () {
    return view('admin/index');
});

/*Route::get('/insertVolonteer', function () {
    return view('admin/insererVolontaire');
});*/
Route::get('/insertVolonteer', 'PersonneControler@afficherVue');

Route::get('/gallerie', function () {
    return view('admin/photo-gallery');
});

Route::get('/home',function(){
    return View('welcome');
});
