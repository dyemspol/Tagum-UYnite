@extends('layout.app')

@section('title', 'Popular Post')

@section('content')
  <div class="">
    

    @foreach ($posts as $post)
    <livewire:popular-post :post="$post" key="$post->id"/>
    @endforeach
    
    </div>

@endsection
