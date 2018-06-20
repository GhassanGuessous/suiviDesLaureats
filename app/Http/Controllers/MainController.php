<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    

	public function index(){
		$title = "SuiviDesLaureats- Accueil";
		$targetView = "";

		$params = array (
			'nbrEtudiants'=>DB::table('utilisateurs')->join('status', 'utilisateurs.status_id', '=', 'status.id')->where('status.libelle', 'Etudiant')->count(),
			'nbrLaureats'=>DB::table('utilisateurs')->join('status', 'utilisateurs.status_id', '=', 'status.id')->where('status.libelle', 'Laureat')->count(),
			'nbrEnseignants'=>DB::table('utilisateurs')->join('status', 'utilisateurs.status_id', '=', 'status.id')->where('status.libelle', 'Enseignant')->count(),
			'nbrPublications'=>DB::table('publications')->count());
				   
	    return view('pages/index', ['title' => $title, 'targetView' => $targetView, 'params' => $params]);
	}



}
