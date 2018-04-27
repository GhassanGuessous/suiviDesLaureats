@extends('master')

@section('header')
	@include('pages/headers/afterAuthAdmin')
@stop


@section('sections.basic')
	@include('pages/basic/slideShow')
	@include('pages/tasks/nouveautes')	
	@include('pages/tasks/admin/validerInscriptions')
@stop