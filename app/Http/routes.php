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
// $_SESSION['currentUser']['id'] = 1; 		// to do after login task !!
// $_SESSION['currentUser']['email'] = 'connectedUserMail@gmail.com'; 		// to do after login task !!
// $_SESSION['currentUser']['nom'] = 'connectedUserNom'; 		// to do after login task !!
// $_SESSION['currentUser']['prenom'] = 'connectedUserPrenom'; 		// to do after login task !!



Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index');

Route::get('/likedPublication/{id}', 'HomeController@like');
Route::get('/dislikedPublication/{id}', 'HomeController@dislike');

Route::get('/profil/{id}', 'ProfilController@index');

Route::post('/contact', 'MailSenderController@index');
Route::get('/publier', 'PublierController@index');

Route::get('/recherche', 'RechercheController@index');
Route::post('/getRechercheResult', 'RechercheController@getRechercheResult');

Route::get('/monProfil', 'MonProfilController@index');
Route::post('/modifierInfos', 'MonProfilController@modifierInfos');
Route::post('/modifierInfosAuth', 'MonProfilController@modifierInfosAuth');
Route::post('/ajouterCV', 'MonProfilController@ajouterCV');





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



Route::get('/admin', function () {
	$title = "SuiviDesLaureats- Admin";
	$targetView = (isset($_GET["targetView"])) ? $_GET["targetView"] : '';
	$nomAdmin = $_SESSION['currentUser']['nom'] . " " .  $_SESSION['currentUser']['prenom'];
	$idAdmin = $_SESSION['currentUser']['id'];
	$photo = $_SESSION['currentUser']['photo'];

	$dataNotif = array(
		'nbrNewInsc'=>DB::select('select count(id) nbr from utilisateurs where etat = 0 and status_id <> 4'),
		'nbrComptesDesactives'=>DB::select('select count(id) nbr from utilisateurs where etat_compte = 0 and status_id <> 4'),
		'nbrPubAEvaluer'=>DB::select('select count(id) nbr from publications where etat = "désactiver"'),
		'nbrDemandesChgt'=>DB::select('select count(id) nbr from demandes where etat = "en attente" and admin_id = ' . $_SESSION['currentUser']['id'])
	);

	$params = array();

	switch($targetView){
		case 'validerInscriptions' : 
			$insc = DB::select('
				select u.cne, u.id, u.nom, u.prenom, u.etat, u.status_id, s.libelle 
				from utilisateurs u, status s 
				where u.status_id = s.id 
				and etat = 0 
				and status_id <> 4'
			);
			array_push($params, $insc);break;

		case 'activerDesactiverCompte' : 
			$comptes = DB::select('
				select u.id, u.nom, u.prenom, u.etat_compte, s.libelle 
				from utilisateurs u, status s 
				where u.status_id = s.id 
				and etat = 1 
				and status_id <> 4'
		);
			array_push($params, $comptes);break;

		case 'validerPublications' : 
			$publications = DB::select('
				select * 
				from utilisateurs u, status s, publications p
				where u.id = p.utilisateur_id
				and u.status_id = s.id
				and p.etat = "désactiver"
				and status_id <> 4'
			);
			array_push($params, $publications);break;

		case 'chengementStatut' : 
			$chgtStatus = DB::select('
				select us.cne, us.nom, us.prenom, s.libelle, d.date, d.id
				from demandes d, utilisateurs us, utilisateurs ua, status s 
				where d.admin_id = ua.id
				and d.utilisateur_id = us.id
				and ua.id = '.$idAdmin.'
				and us.status_id = s.id 
				and d.etat = "en attente"
				and us.etat = 1'
			);
			array_push($params, $chgtStatus);break;
	}

    return view('pages/admin', [
		'title' => $title, 
		'nom_admin' => $nomAdmin,
		'photo' => $photo,
		'data_notif' => $dataNotif,
		'targetView' => $targetView,
		'params' => $params
	]);
});

Route::get('/deconnexion', 'InscriptionController@deconnexion');

Route::post('/admin/evaluerInscription', 'InscriptionController@evaluerInscription');
Route::post('/admin/evaluerUtilisateur', 'InscriptionController@evaluerUtilisateur');
Route::post('/admin/evaluerPublication', 'InscriptionController@evaluerPublication');
Route::post('/admin/evaluerDemandes', 'InscriptionController@evaluerDemandes');