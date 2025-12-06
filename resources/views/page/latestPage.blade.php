@extends('layout.app')

@section('title', 'Latest Post')

@section('content')
  <div class="">
    <x-postCard :isProfilePage="$isProfilePage" />

   
    </div>

@endsection
