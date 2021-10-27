@extends('layouts.app')

@section('content')
    @if(!empty($request))
        <div class="alert alert-success">
        {{$request['email']}}にメールを送信しました。
        </div>
    @endif
@endsection
