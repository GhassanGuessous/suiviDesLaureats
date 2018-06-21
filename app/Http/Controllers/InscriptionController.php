<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Utilisateurs;

class InscriptionController extends Controller
{
    

	public function index(){
		
	}

	public function saveEtudiantLaureat(){

		extract($_POST);
		$utilisateur = Utilisateurs::where('email', $email)->first();

		if($utilisateur == null){
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
				'status_id' => 2
			]);

			session_start();
			$_SESSION["email"] = $utilisateur->email;

			return view('pages/tasks/home', ['title' => 'Home']);
		}

		return redirect('/')->with('erreur', 'emailExist');
	    
	}

	public function saveEnseignant(){

		extract($_POST);
		$utilisateur = Utilisateurs::where('email', $email)->first();

		if($utilisateur == null){
			$utilisateur = Utilisateurs::create([
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'login' => $login,
				'password' => $pass,
				'status_id' => 1
			]);
			
			session_start();
			$_SESSION["email"] = $utilisateur->email;

			return view('pages/tasks/home', ['title' => 'Home']);
		}
				   
	    return redirect('/')->with('erreur', 'emailExist');
	}

	public function auth(){

		extract($_POST);

		$utilisateur = Utilisateurs::where('email', $email)->first();

		if($utilisateur != null){

			if($utilisateur->password == $pass){

				if($utilisateur->status_id == 4){
					//admin
					return redirect('/admin');
				}else{
					// enseignant / etudiant / laureat
					session_start();
					$_SESSION["email"] = $utilisateur->email;

					return view('pages/tasks/home', ['title' => 'Home']);
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


}
