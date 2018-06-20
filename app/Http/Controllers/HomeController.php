<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
   



	public function index(){
		$title = "SuiviDesLaureats- Accueil";
		$targetView = "";





		
	   
	    return view('pages/tasks/home', ['title' => $title, 'targetView' => $targetView]);
	}





}
