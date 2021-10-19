@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if(Auth::user()->category == '10')
            @include('resident/index')
        @else(Auth::user()->category == '5')
            @include('staff/index')
        @endif
    @else
        @include('auth/login')
    @endif
@endsection