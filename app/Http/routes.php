<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	$title = "SuiviDesLaureats- Accueil";
	$targetView = "";
   
    return view('pages/index', ['title' => $title, 'targetView' => $targetView]);
});


Route::post('inscription', function () {	
	$title = "SuiviDesLaureats- Accueil";
	$targetView = strtolower($_POST["targetView"]);

    return view('pages/index', ['title' => $title, 'targetView' => $targetView]);
});


Route::get('/home', function () {
	$title = "SuiviDesLaureats- Accueil";
	$targetView = "";
   
    return view('pages/tasks/home', ['title' => $title, 'targetView' => $targetView]);
});


Route::get('/monProfil', function () {
	$title = "SuiviDesLaureats- Accueil";
	$targetView = "";
   
    return view('pages/tasks/monProfil', ['title' => $title, 'targetView' => $targetView]);
});


Route::get('/recherche', function () {
	$title = "SuiviDesLaureats- Recherche";   
    return view('pages/tasks/recherche', ['title' => $title]);
});


Route::get('/profil', function () {
	$title = "SuiviDesLaureats- User.Profil";   
    return view('pages/tasks/userProfil', ['title' => $title]);
});

Route::get('/admin', function () {
	$title = "SuiviDesLaureats- Admin";
	$targetView = (isset($_GET["targetView"])) ? $_GET["targetView"] : '';

    return view('pages/admin', ['title' => $title, 'targetView' => $targetView]);
});