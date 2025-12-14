@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
  <div class="mb-4 text-white">
      <h2 class="text-xl font-bold">Search Results for: "{{ $searchQuery }}"</h2>
  </div>
  
  <div class="">
    @foreach($posts as $post)
       <livewire:latest-post :post="$post" :key="$post->id"/>
    @endforeach
    
    @if($posts->isEmpty())
         <div class="text-white opacity-50 text-center mt-10">No results found.</div>
    @endif
  </div>
@endsection