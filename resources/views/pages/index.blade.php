@extends('master')

@section('header')
	@include('pages/headers/beforeAuth')
@stop


@section('sections.basic')
	@include('pages/basic/slideShow')
	@include('pages/basic/services')
	@include('pages/basic/statistiques')
	@include('pages/tasks/auth')
@stop