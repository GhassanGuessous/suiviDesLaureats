@extends('masterAdmin')


@section('autres.sections')
	@include('pages/admin/navMenu')
	@include('pages/admin/notifications')

	@if 	($targetView == 'validerInscriptions')			@include('pages/admin/validerInscriptions')
	@elseif ($targetView == 'activerDesactiverCompte')		@include('pages/admin/activerDesactiverCompte')
	@elseif ($targetView == 'validerPublications')			@include('pages/admin/validerPublications')	
	@elseif ($targetView == 'chengementStatut')				@include('pages/admin/chengementStatut')
	@endif
@stop