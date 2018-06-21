<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use DateTime;

class PublierController extends Controller
{
    
	public function index(Request $request){
		$etat = "erreur";

		try {
			$publicationContent = $request->input('pubText');
			$datePub = new DateTime();

			DB::table('publications')->insert([
								'date' => $datePub, 
								'contenu' => $publicationContent, 
							    'utilisateur_id' => $_SESSION['currentUser']['id']
							]);
		
		 	$etat = "done";
		} catch (Exception $e) {
			$etat = "erreur";
		}

		$item = new HomeController();
		return $item->index($etat);	
	}

}
