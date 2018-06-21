@extends('master')

@section('header')
	@include('pages/headers/beforeAuth')
@stop


@section('sections.basic')

	@if(session('erreur') == 'mdp')
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>swal("Mot de passe incorrect !");</script>
	@endif
	@if(session('erreur') == 'notFound')
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>swal("Utilisateur introuvable !");</script>
	@endif
	@if(session('erreur') == 'emailExist')
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>swal("Cette adresse E-mail exist deja !");</script>
	@endif

	@include('pages/basic/slideShow')
	@include('pages/basic/services')
	@include('pages/basic/statistiques')
	@include('pages/tasks/auth')
	@include('pages/tasks/inscription')
@stop