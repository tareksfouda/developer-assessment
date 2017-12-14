@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
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
        {{$posts->links()}}
    @else
        <p>No Listings found</p>
    @endif
@endsection