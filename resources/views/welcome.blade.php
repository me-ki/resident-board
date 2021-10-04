@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if(Auth::user()->category == '1')
            @include('resident/index')
        @else
            @include('staff/index')
        @endif
    @else
        @include('auth/login')
    @endif
@endsection