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
$_SESSION['currentUser']['email'] = 'connectedUserMail@gmail.com'; 		// to do after login task !!
$_SESSION['currentUser']['nom'] = 'connectedUserNom'; 		// to do after login task !!
$_SESSION['currentUser']['prenom'] = 'connectedUserPrenom'; 		// to do after login task !!



Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index');

Route::get('/likedPublication/{id}', 'HomeController@like');
Route::get('/dislikedPublication/{id}', 'HomeController@dislike');

Route::get('/profil/{id}', 'ProfilController@index');

Route::post('/contact', 'MailSenderController@index');
Route::get('/publier', 'PublierController@index');

Route::get('/recherche', 'RechercheController@index');
Route::post('/getRechercheResult', 'RechercheController@getRechercheResult');



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


Route::get('/admin', function () {
	$title = "SuiviDesLaureats- Admin";
	$targetView = (isset($_GET["targetView"])) ? $_GET["targetView"] : '';

    return view('pages/admin', ['title' => $title, 'targetView' => $targetView]);
});