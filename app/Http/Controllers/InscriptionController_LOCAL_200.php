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
					'status_id' => 2,
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
	}
}
