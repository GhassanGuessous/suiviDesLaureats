<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use DateTime;


class ProfilController extends Controller
{
    
	public function index($id, $etat=''){
		$title = "SuiviDesLaureats- User.Profil";

		$targetUser = DB::table('utilisateurs')
			->join('status', 'utilisateurs.status_id', '=', 'status.id')
            ->join('filieres', 'utilisateurs.filiere_id', '=', 'filieres.id')
            ->where('utilisateurs.id', '=', $id)
            ->select('utilisateurs.*', 'status.libelle', 'filieres.nom AS filiereName')
            ->get();

        $nombrePubs = DB::table('publications')
			->join('utilisateurs', 'utilisateurs.id', '=', 'publications.utilisateur_id')
            ->where('utilisateurs.id', '=', $id)
            ->count();

            $datetime1 = new DateTime();
			$datetime2 = new DateTime($targetUser[0]->date_naissance);
			$interval = $datetime1->diff($datetime2);
			$age = ROUND($interval->format("%a")/30/12); 

  		return view('pages/tasks/userProfil', ['title' => $title, 'idProfil' =>$id, 'targetUser' => $targetUser, 'age' => $age, 'nombrePubs' => $nombrePubs, 'etat' => $etat]);
	}




}
