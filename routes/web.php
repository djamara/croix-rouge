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

Route::get('/slide', function () {
    return view('slide');
});

/*Route::get('/admin', function () {
    return view('admin/index');
});*/
Route::get('/admin', 'Accueil@accueil');
/*Route::get('/insertVolonteer', function () {
    return view('admin/insererVolontaire');
});*/
Route::get('/formulaire_volontaire', 'PersonneControler@afficherVue');

Route::post('/Login', 'UserLoginController@authenticate');

Route::get('/Liste_Volontaire', 'PersonneControler@afficherListerVolontaire');

Route::get('/Liste_Comite', 'ComiteController@AfficherComite');

Route::post('/inserer_Volontaire', 'PersonneControler@insererVolontaire');

Route::post('/FileVolontaire', 'PersonneControler@uplaodFile');

Route::get('/insertHistoVolontaire', 'InsertHistoVolontaire@afficheHistorique');

Route::post('/insertComite', 'ComiteController@InsererComite');

Route::get('/gallerie', function () {
    return view('admin/photo-gallery');
});

Route::get('/home',function(){
    return View('welcome');
});
