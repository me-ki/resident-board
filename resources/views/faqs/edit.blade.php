@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">FAQ編集</p>
        </div>
      </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">FAQ編集</h4>
                <div class="mt-3">
                    {!! Form::model($faq, ['route' => ['faqs.update', $faq->id], 'method' => 'put']) !!}
                        
                        <div class="form-group mt-2">
                            {!! Form::label('question', '質問') !!}
                            {!! Form::text('question', $faq->question, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('answer', '回答') !!}
                            {!! Form::textarea('answer', $faq->answer, ['class' => 'form-control']) !!}
                        </div>
        
                        <div class="form-group text-center">
                            {!! Form::submit('登　録', ['class' => 'btn btn-primary w-25']) !!}
                        </div>
    
                    {!! Form::close() !!}
                </div>
            </div>
            
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection