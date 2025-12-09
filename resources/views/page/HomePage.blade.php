@extends('layout.app')

@section('title', 'Home')

@section('content')
  <div class="">

    @foreach($posts as $post)
        <livewire:post-card :post="$post" :key="$post->id" />
    @endforeach
   
    </div>

@endsection
