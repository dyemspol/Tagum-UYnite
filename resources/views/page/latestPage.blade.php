@extends('layout.app')

@section('title', 'Latest Post')

@section('content')
  <div class="">
    <livewire:post-feed type="latest" />
  </div>

@endsection
