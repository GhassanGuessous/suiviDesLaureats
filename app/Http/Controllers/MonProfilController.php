<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use DateTime;

class MonProfilController extends Controller
{

   public function index($etat=''){
		$title = "SuiviDesLaureats- MonProfil";
		$targetView = "";

		$targetUser = DB::table('utilisateurs')
			->join('status', 'utilisateurs.status_id', '=', 'status.id')
	        ->join('filieres', 'utilisateurs.filiere_id', '=', 'filieres.id')
	        ->where('utilisateurs.id', '=', $_SESSION['currentUser']['id'])
	        ->select('utilisateurs.*', 'status.libelle', 'filieres.nom AS filiereName')
	        ->get();

        $nombrePubs = DB::table('publications')
			->join('utilisateurs', 'utilisateurs.id', '=', 'publications.utilisateur_id')
            ->where('utilisateurs.id', '=', $_SESSION['currentUser']['id'])
            ->count();

        $datetime1 = new DateTime();
		$datetime2 = new DateTime($targetUser[0]->date_naissance);
		$interval = $datetime1->diff($datetime2);
		$age = ROUND($interval->format("%a")/30/12); 


		$description = $targetUser[0]->libelle.' '.$targetUser[0]->promo.' '.$targetUser[0]->filiereName;

	    return view('pages/tasks/monProfil', ['title' => $title, 'targetView' => $targetView, 'targetUser'=>$targetUser, 'nombrePubs'=>$nombrePubs, 'age'=>$age, 'description'=>$description, 'etat'=>$etat]);
	}
	
	public function modifierInfos(Request $request){
		$etat = 'error';

		try {
			$id = $request->input('idUserToAlter');
			$nom = $request->input('nom');
			$prenom = $request->input('prenom');
			$cne = $request->input('cne');
			$dateNaissance = new DateTime($request->input('dateNaissance'));

			DB::table('utilisateurs')
	            ->where('id', $id)
	            ->update([
	            		'nom' => $nom,
	            		'prenom' => $prenom,
	            		'cne' => $cne,
	            		'date_naissance' => $dateNaissance
	            	]);
	        $etat = 'done';

		} catch (Exception $e) {
			$etat = 'error';
		}

        $item = new MonProfilController();
		return $item->index($etat);
	}

	public function modifierInfosAuth(Request $request){
		$etat = 'error';

		try {
			$id = $request->input('idUserToAlter');
			$email = $request->input('email');
			$nouveauMotDePasse = $request->input('motdepasse');

			DB::table('utilisateurs')
	            ->where('id', $id)
	            ->update([
	            		'email' => $email,
	            		'password' => $nouveauMotDePasse
	            	]);
	        $etat = 'done auth';
	        
		} catch (Exception $e) {
			$etat = 'error';
		}

        $item = new MonProfilController();
		return $item->index($etat);
	}

	public function ajouterCV(Request $request){
		$etat = 'error';

		$id = $request->input('idUserToAlter');
		$err = $_FILES['documentCV']['error'];
		$extension = pathinfo($_FILES['documentCV']['name'], PATHINFO_EXTENSION);


		$fileName = 'cv_'.$id.'.'.$extension;
		$test = false;

		if ($err == UPLOAD_ERR_OK) {
			$test = copy($_FILES['documentCV']['tmp_name'], "documents_cvs/" . $fileName);
		}

		if($test == true){
			DB::table('utilisateurs')
            ->where('id', $id)
            ->update([
            		'url_cv' => $fileName
            	]);
        	$etat = 'done cv';
		}

        $item = new MonProfilController();
		return $item->index($etat);
	}

}
