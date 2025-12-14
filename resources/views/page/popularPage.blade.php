@extends('layout.app')

@section('title', 'Popular Post')

@section('content')
  <div class="">
    

    <livewire:post-feed type="popular" />
    
    </div>

@endsection
