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

Route::get('/formulaire_modif_volontaire/{id}', 'PersonneControler@afficherVueModif');

Route::post('/Login', 'UserLoginController@authenticate');

Route::get('/Liste_Volontaire', 'PersonneControler@afficherListerVolontaire');

Route::get('/Liste_Comite', 'ComiteController@AfficherComite');

Route::post('/inserer_Volontaire', 'PersonneControler@insererVolontaire');

Route::post('/insererFormVolontaire', 'PersonneControler@insererFomrVolontaire');

Route::post('/modifier_Volontaire', 'PersonneControler@modifier_Volontaire');

Route::get('/inserer_Volontaire/{idVol}', 'PersonneControler@insererVolontaire');

Route::post('/FileVolontaire', 'PersonneControler@uplaodFile');

Route::get('/insertHistoVolontaire', 'InsertHistoVolontaire@afficheHistorique');

Route::post('/insertComite', 'ComiteController@InsererComite');

Route::get('/token', 'PersonneControler@getToken');

Route::get('/gallerie', function () {
    return view('admin/photo-gallery');
});


Route::get('/generateQR', function () {

    \QrCode::size(500)
            ->format('svg')
            ->generate('www.7itmind.com/rapport/idrisse.pdf', public_path('jasperfile/qrcode1.svg'));

  return view('qrCode');

});

Route::get('/generateRapport/{id}','PersonneControler@generateRapport');

Route::get('/showFiche','PersonneControler@showFiche');

Route::get('/createCompte','UserLoginController@createCompte');

Route::get('/afficherCompte/{idcompte}','UserLoginController@afficherCompte');

Route::post('/removeVolontaire','PersonneControler@removeVolontaire');

Route::post('/inserer_compte','UserLoginController@insererCompte');

Route::post('/modifier_compte','UserLoginController@modifierCompte');

Route::get('/listeComptes','UserLoginController@listeComptes');

Route::get('/home',function(){
    return View('welcome');
});
