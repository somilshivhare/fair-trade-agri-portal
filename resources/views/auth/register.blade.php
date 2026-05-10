@extends('layouts.app')
@section('title', 'Register - AgriMandi')
@section('content')
{{-- Redirect to login page which handles both login & register tabs --}}
@php
    return redirect()->route('login');
@endphp
@endsection
