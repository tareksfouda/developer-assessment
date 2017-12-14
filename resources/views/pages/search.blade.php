@extends('layouts.app')

@section('content')

<div class="container">

<div class="inv-search-container inventory-search-container panel panel-filter">
   <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
             <label style="font-weight:bold; float:left; margin-right: 15px;">Type : </label><input style= "width:100%;" type="text" class="form-control" name="keyword"
                    placeholder="Search Type">
                </div>
                <div class="input-group" style="float:right;transform: translateY(-80px);">
                 <label style="font-weight:bold; float:left; margin-right: 15px;">Enter Keyword : </label> <input style= "width:100%; " type="text" class="form-control" name="random"
                    placeholder="Search Keyword">
                    <br>
                </div>
                <div class="input-group">
                    <label style="font-weight:bold; float:left; margin-right: 15px; ">Price : </label>  <input style= "width:100%; " type="text" class="form-control" name="price"
                    placeholder="Search price"> <span class="input-group-btn">
                    </div>

                    
<div class="input-group" style="float:right;transform: translateY(-30px); margin-right: -80px;">
                    <label class="radio-inline">
          <input name="reset" id="reset" value="reset" type="radio"> View All
        </label>
    </div>
                    <button type="submit" class="btn btn-default" style=" margin-left: 36%;width: 24%; color: white;background-color: grey;">
                        Search
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
</div>
     


     @if(isset($details))

     <p> The Search results for your query are :</p>
            
       @foreach($details as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}"><strong>{{$post->make}}</strong> <strong style="font-size:11px !important;"> {{$post->model}} </strong></a></h3>
                        <small>Posted on {{$post->created_at}} by the user <strong style="font-size:13px !important;"> {{$post->user->name}} </strong></small>
                        <span style="float:right !important;"><label style="font-size: 19px;">Year: </label> {{$post->year}} </span>
                        <br>
                         <span style="float: left !important;margin-top: 100px;"><label style="font-size: 19px;">Price: </label> ${{$post->price}}  </span>
                    </div>



                </div>
            </div>
        @endforeach
      
    @elseif(isset($message))
            <p>{{ $message }}</p>
            @endif







       
@endsection