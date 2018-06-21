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



Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index');



// to do ::


Route::post('inscription', function () {	
	$title = "SuiviDesLaureats- Accueil";
	$targetView = strtolower($_POST["targetView"]);
	$params = array (
		'nbrEtudiants'=>DB::table('utilisateurs')->join('status', 'utilisateurs.status_id', '=', 'status.id')->where('status.libelle', 'Etudiant')->count(),
		'nbrLaureats'=>DB::table('utilisateurs')->join('status', 'utilisateurs.status_id', '=', 'status.id')->where('status.libelle', 'Laureat')->count(),
		'nbrEnseignants'=>DB::table('utilisateurs')->join('status', 'utilisateurs.status_id', '=', 'status.id')->where('status.libelle', 'Enseignant')->count(),
		'nbrPublications'=>DB::table('publications')->count());
	
	if($targetView == "etudiant" || $targetView == "laureat"){

		$filieres = DB::select('select * from filieres');
		array_push($params, $filieres);
	}
    return view('pages/index', ['title' => $title, 'targetView' => $targetView, "params" => $params]);
});

Route::post('inscrireEtudiantLaureat', 'InscriptionController@saveEtudiantLaureat');
Route::post('inscrireEnseignant', 'InscriptionController@saveEnseignant');
Route::post('authentification', 'InscriptionController@auth');


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