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

session_start();
$_SESSION['currentUser']['id'] = 1; 		// to do after login task !!



Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index');
Route::get('/likedPublication/{id}', 'HomeController@like');
Route::get('/dislikedPublication/{id}', 'HomeController@dislike');



// to do ::


Route::post('inscription', function () {	
	$title = "SuiviDesLaureats- Accueil";
	$targetView = strtolower($_POST["targetView"]);

    return view('pages/index', ['title' => $title, 'targetView' => $targetView]);
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