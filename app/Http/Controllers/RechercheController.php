<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class RechercheController extends Controller
{
    public function index(){
		$title = "SuiviDesLaureats- Recherche";   
    	return view('pages/tasks/recherche', ['title' => $title]);
	}



	public function getRechercheResult(Request $request){
	
		$name = $request->input('name');

		$users = DB::table('utilisateurs')
					->where('prenom', 'like', $name.'%')
					->orwhere('prenom', 'like', '%'.$name)
					->orwhere('prenom', 'like', '%'.$name.'%')
					->get();


		foreach ($users as $key => $value) {
			echo "<div class='div1'>";
			echo "<img class='img' src='assets/images/users/".$value->url_photo."'>";
			echo "<span class='span1'>".$value->nom.' '.$value->prenom."</span>";
			echo "<div class='div2'>";
			echo "<span class='span2'><a href='/profil/".$value->id."'>consulter le profil</a></span>";
			echo "</div>";
			echo "</div>";
		}

	}

}