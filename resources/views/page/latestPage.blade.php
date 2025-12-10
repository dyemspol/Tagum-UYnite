@extends('layout.app')

@section('title', 'Latest Post')

@section('content')
  <div class="">
    @foreach($posts as $post)
    <livewire:latest-post :post="$post" :key="$post->id"/>
    @endforeach
   
    </div>

@endsection
