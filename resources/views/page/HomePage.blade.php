@extends('layout.app')

@section('title', 'Home')

@section('content')
  <div class="">
    <x-postCard :isProfilePage="$isProfilePage" />

   
    </div>

@endsection
