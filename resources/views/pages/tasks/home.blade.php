@extends('master')

@section('header')
	@include('pages/headers/afterAuth')
@stop


@section('sections.basic')
	@include('pages/basic/slideShow')
	@include('pages/tasks/publication')
	@include('pages/tasks/nouveautes')
@stop