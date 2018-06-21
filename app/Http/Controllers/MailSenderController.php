<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class MailSenderController extends Controller
{
	public function index(Request $request){	
		$etat = "erreur";

		try {
				$messageText = $request->input('message');
			//	$objet= $request->input('objet');
				$userToName = $request->input('from');
			//	$userToMail = $request->input('mailAdresse');
			//	$userFromMail = $_SESSION['currentUser']['email'];
				$userFromName = $_SESSION['currentUser']['prenom'].' '.$_SESSION['currentUser']['nom'];

				$user['userFromMail'] = $_SESSION['currentUser']['email'];
				$user['userToMail'] = $request->input('mailAdresse');
				$user['userToName'] = $request->input('from');
				$user['objet'] = $request->input('objet');

			  	Mail::send('emails.contact', ['userToName' => $userToName, 'messageText' => $messageText, 'userFromName' => $userFromName], function ($m) use ($user) {
		            $m->from($user['userFromMail'], 'Alumni-ENSA-Safi')->cc($user['userFromMail']);

		            $m->to($user['userToMail'], $user['userToName'])->subject($user['objet']);
		        });

			  	$etat = "done";
		} catch (Exception $e) {
			$etat = "erreur";
		}

		$item = new ProfilController();
		return $item->index($request->input('idProfil'), $etat);


	}
}
