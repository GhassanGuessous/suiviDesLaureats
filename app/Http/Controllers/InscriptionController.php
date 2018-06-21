<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Utilisateurs;

if(!isset($_SESSION)){
	session_start();
}

class InscriptionController extends Controller
{    
	public function index(){
		
	}

	public function saveEtudiantLaureat(){

		extract($_POST);
		$utilisateur = Utilisateurs::where('email', $email)->first();

		if($utilisateur == null){

			$codeErreur = $_FILES['photo']['error'];

            if ($codeErreur == UPLOAD_ERR_OK) {
                // Le fichier a bien été transmis
                $fichier = $_FILES['photo'];
                // Persister la championnat dans la BD
                $photoName = $nom . "_" . $prenom . ".jpg";                
				
				$utilisateur = Utilisateurs::create([
					'cne' => $cne,
					'nom' => $nom,
					'prenom' => $prenom,
					'date_naissance' => $dateNaiss,
					'email' => $email,
					'promo' => $promo,
					'login' => $login,
					'password' => $pass,
					'filiere_id' => $filiere,
					'status_id' => 1,
					'url_photo' => $photoName
				]);

				// Copie du fichier dans le répertoire assets/images/users/
                copy($fichier['tmp_name'], "assets/images/users/" . $photoName);

				$this->sessionFunc($utilisateur);

				return redirect('/home');
			}
		}

		return redirect('/')->with('erreur', 'emailExist');
	    
	}

	public function saveEnseignant(){

		extract($_POST);
		$utilisateur = Utilisateurs::where('email', $email)->first();

		if($utilisateur == null){
			$codeErreur = $_FILES['photo']['error'];
			
            if ($codeErreur == UPLOAD_ERR_OK) {
                // Le fichier a bien été transmis
                $fichier = $_FILES['photo'];
                // Persister la championnat dans la BD
				$photoName = $nom . "_" . $prenom . ".jpg";
				
				$utilisateur = Utilisateurs::create([
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'login' => $login,
					'password' => $pass,
					'status_id' => 3,
					'url_photo' => $photoName
				]);
				
				// Copie du fichier dans le répertoire assets/images/users/
				copy($fichier['tmp_name'], "assets/images/users/" . $photoName);
				
				$this->sessionFunc($utilisateur);

				return redirect('/home');
			}
		}
				   
	    return redirect('/')->with('erreur', 'emailExist');
	}

	public function auth(){

		extract($_POST);

		$utilisateur = Utilisateurs::where('email', $email)->first();

		if($utilisateur != null){

			if($utilisateur->password == $pass){

				$this->sessionFunc($utilisateur);

				if($utilisateur->status_id == 4){
					//admin
					return redirect('/admin');
				}else{
					// enseignant / etudiant / laureat
					return redirect('/home');
				}
			}else{
				// pass incorrect
				return redirect()->back()->with('erreur', 'mdp');

			}
		}else{
			//email not found
			return redirect()->back()->with('erreur', 'notFound');
		}
	}

	public function deconnexion(){
		session_destroy();
		return redirect('/');
	}

	// public static function verifyEmail($email){
	// 	$utilisateur = Utilisateurs::where('email', $email)->first();

	// 	if($utilisateur != null){
	// 		return false;
	// 	}else{
	// 		return true;
	// 	}
	// }

	public function sessionFunc($utilisateur){
		$_SESSION['currentUser']['id'] = $utilisateur->id; 		
		$_SESSION['currentUser']['email'] = $utilisateur->email; 		
		$_SESSION['currentUser']['nom'] = $utilisateur->nom; 		
		$_SESSION['currentUser']['prenom'] = $utilisateur->prenom; 
		$_SESSION['currentUser']['photo'] = $utilisateur->url_photo;
	}

	public function evaluerInscription(){

		extract($_POST);
		
		$utilisater = Utilisateurs::find($idUser);

		if(isset($accepter))
			$utilisater->etat = 1;
		if(isset($refuser))
			$utilisater->etat = 2;

		$utilisater->save();

		return redirect('/admin?targetView=validerInscriptions');
	}

	public function evaluerUtilisateur(){

		extract($_POST);
		
		$utilisater = Utilisateurs::find($idUser);

		if(isset($bloquer))
			$utilisater->etat_compte = 0;
		if(isset($debloquer))
			$utilisater->etat_compte = 1;
			
		$utilisater->save();

		return redirect('/admin?targetView=activerDesactiverCompte');
	}

	public function evaluerPublication(){

		extract($_POST);
		
		if(isset($accepter))
			$etat = 'active';
		if(isset($refuser))
			$etat = 'refusée';

		$publication = DB::update('update publications set etat = "' . $etat . '" where id = ' . $idPub);

		return redirect('/admin?targetView=validerPublications');
	}

	public function evaluerDemandes(){

		extract($_POST);
		
		$demande = DB::select('select * from demandes where id = ' . $idDemande);

		if(isset($accepter)){
			$etat = 'acceptée';
			$utilisateur = Utilisateurs::find($demande[0]->utilisateur_id);

			//from etudiant to laureat
			$utilisateur->status_id = 2;
			$utilisateur->save();
		}
		if(isset($refuser))
			$etat = 'refusée';

		$publication = DB::update('update demandes set etat = "' . $etat . '" where id = ' . $idDemande);

		return redirect('/admin?targetView=chengementStatut');
	}
}
