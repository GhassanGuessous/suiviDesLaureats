<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

if(!isset($_SESSION)){
	session_start();
}

class HomeController extends Controller
{
   



	public function index($etat=''){
		$title = "SuiviDesLaureats- Accueil";
		$targetView = "";
		$found = 'false';
		$nom_prenom = $_SESSION['currentUser']['nom'] . " " . $_SESSION['currentUser']['prenom'];
		$allPublications = DB::table('publications')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'publications.utilisateur_id')
            ->join('status', 'utilisateurs.status_id', '=', 'status.id')
            ->join('filieres', 'utilisateurs.filiere_id', '=', 'filieres.id')
            ->where('publications.etat', '=', 'active')
            ->select('publications.*', 'publications.id AS id_publication', 'utilisateurs.*', 'status.libelle', 'filieres.nom AS fillereName')
            ->orderByRaw('date DESC')
            ->get();

        $allLikes = DB::table('likes')->get();

    //    dd($allPublications);

	 	return view('pages/tasks/home', ['title' => $title, 'targetView' => $targetView, 'allPublications' => $allPublications, 'allLikes' => $allLikes, 'found' => $found, 'etat' => $etat, 'nomPrenom' => $nom_prenom]);
	}


	public function like($id){
		DB::table('publications')
            ->where('id', $id)
            ->increment('nombreJaime');

		DB::table('likes')->insert([
							'id_publication' => $id, 
						    'id_user' => $_SESSION['currentUser']['id']
						]);

		return redirect('/home#nouveautes');
	}


	public function dislike($id){
		DB::table('publications')
            ->where('id', $id)
            ->decrement('nombreJaime');		

		DB::table('likes')
			->where('id_publication', '=', $id)
			->where('id_user', '=', $_SESSION['currentUser']['id'])
			->delete();

		return redirect('/home#nouveautes');
	}


}
