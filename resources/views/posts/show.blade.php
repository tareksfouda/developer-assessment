@extends('layouts.app')

@section('content')




    <div class="jumbotron text-center">

<div class="row">
<div class="col-xs-12">
</div>
</div>
<div class="row inventory-title-container">
<div class="col-xs-12">
<h1>{{$post->make}}</h1>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-md-7">


<div class="container"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/storage/cover_images/{{$post->cover_image}}" alt="image" style="width:100%;">
      </div>

      <div class="item">
        <img src="/storage/cover_images/{{$post->cover_image2}}" alt="image" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="/storage/cover_images/{{$post->cover_image3}}" alt="image " style="width:100%;">
      </div>

            <div class="item">
        <img src="/storage/cover_images/{{$post->cover_image4}}" alt="image" style="width:100%;">
      </div>

            <div class="item">
        <img src="/storage/cover_images/{{$post->cover_image5}}" alt="image" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<br>
<br>
<!--
<div>  <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}"></div>-->





</div>

</div>

<div class="row">
<div class="col-xs-12 info-area">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#info">Information</a></li>
<li id="specs-tab"><a data-toggle="tab" href="#specs">Specifications</a></li>

</ul>
<div class="tab-content">
<div id="info" class="tab-pane fade in active container-fluid">
<span id="details"><table class="inventory-table table table-striped">
    <thead class="thead-inverse">
        <tr><th colspan="2">General</th></tr></thead><tbody>
        <tr><td>Owner :</td><td>{{$post->user->name}}</td></tr>
        <tr><td>Price :</td><td>{{$post->price}}</td></tr>
        <tr><td>Make :</td><td>{{$post->make}}</td></tr>
        <tr><td>Year :</td><td>{{$post->year}}</td></tr>
        <tr><td>Model :</td><td>{{$post->model}}</td></tr>
        </tbody>
    </table>
</span>
</div>



<div id="specs" class="tab-pane fade container-fluid">
<span id="specifications">  {!!$post->body!!}</span>
</div>
<div id="features-options" class="tab-pane fade container-fluid">
<span id="features"></span>
<span id="options"></span>
</div>
</div>
</div>
</div>




</div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <Strong><a href="mailto:{{$post->user->email}}">Click Here to Email the Seller for more Information</a></Strong>
    <button style="float:right;" onclick="window.location.href='/contact'" type="button" class="btn btn-info">Send Email</button>
    <hr>





    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif

@endsection


