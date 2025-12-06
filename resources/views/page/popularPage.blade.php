@extends('layout.app')

@section('title', 'Popular Post')

@section('content')
  <div class="">
    <x-postCard :isProfilePage="$isProfilePage" />

   
    </div>

@endsection
