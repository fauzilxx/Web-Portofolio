@extends('layouts.app')

@section('title', "Fauzil Azhim's Portfolio")

@section('content')
    @include('sections.navbar')
    @include('sections.hero')
    @include('sections.tech-stack')
    @include('sections.projects')
    @include('sections.about')
    @include('sections.footer')
@endsection
