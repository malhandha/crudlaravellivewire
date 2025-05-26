@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:post.edit :id="$postId" />
    @endsection