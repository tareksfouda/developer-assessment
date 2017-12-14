@extends('layouts.app')

@section('content')
    <h1>Create a listing</h1>

 {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}          



        <div class="form-group">
            {{Form::label('make', 'Make')}}
            {{Form::text('make', '', ['class' => 'form-control', 'placeholder' => 'make'])}}
        </div>

        <div class="form-group">
            {{Form::label('model', 'Model')}}
            {{Form::text('model', '', ['class' => 'form-control', 'placeholder' => 'Model'])}}
        </div>

        <div class="form-group">
            {{Form::label('year', 'Year')}}
            {{Form::text('year', '', ['class' => 'form-control', 'placeholder' => 'year'])}}
        </div>

        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'price'])}}
        </div>


   <div class="form-group">
            {{Form::label('keyword', 'Keyword')}}
            {{Form::select('keyword',       [
   'Motorcycle' => 'Motorcycle',
   'RV' => 'RV',
   'Car' => 'Car',
   'Truck' => 'Truck'], null, ['class' => 'form-control'])}}
        </div>
  


        <div class="form-group">
            {{Form::label('body', 'Description :')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description Text'])}}
        </div>
       <div class="form-group">
            {{Form::file('cover_image')}}
        </div> 
        <br>
               <div class="form-group">
            {{Form::file('cover_image2')}}
        </div> 
        <br>
               <div class="form-group">
            {{Form::file('cover_image3')}}
        </div> 
        <br>
               <div class="form-group">
            {{Form::file('cover_image4')}}
        </div> 
        <br>
               <div class="form-group">
            {{Form::file('cover_image5')}}
        </div> 
        <br>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection