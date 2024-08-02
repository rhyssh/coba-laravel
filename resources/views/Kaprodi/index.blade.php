@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')
    @auth
        <h1 class="text-2xl font-semibold mb-6">Welcome, {{ auth()->user()->username }}</h1>
        <p>This is your dashboard.</p>
    @endauth
@endsection
