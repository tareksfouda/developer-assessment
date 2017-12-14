<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{





     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
        //$posts = Post::orderBy('created_at','desc')->paginate(1);
        $posts = Post::orderBy('created_at','asc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'make' => 'required',
            'model' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);


        // Handle File Upload 1
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }



                // Handle File Upload 2
        if($request->hasFile('cover_image2')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image2')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image2')->storeAs('public/cover_images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }



                // Handle File Upload 3
        if($request->hasFile('cover_image3')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image3')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image3')->storeAs('public/cover_images', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }


                // Handle File Upload 4
        if($request->hasFile('cover_image4')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image4')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image4')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore4= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image4')->storeAs('public/cover_images', $fileNameToStore4);
        } else {
            $fileNameToStore4 = 'noimage.jpg';
        }


                // Handle File Upload 5
        if($request->hasFile('cover_image5')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image5')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image5')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore5= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image5')->storeAs('public/cover_image', $fileNameToStore5);
        } else {
            $fileNameToStore5 = 'noimage.jpg';
        }


        // Create Post
        $post = new Post;
        $post->title = $request->input('model');
        $post->model = $request->input('model');
        $post->body = $request->input('body');
        $post->keyword = $request->input('keyword');
        $post->make = $request->input('make');
        $post->price = $request->input('price');
        $post->year = $request->input('year');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->cover_image2 = $fileNameToStore2;
        $post->cover_image3 = $fileNameToStore3;
        $post->cover_image4 = $fileNameToStore4;
        $post->cover_image5 = $fileNameToStore5;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }


        return view('posts.edit')->with('post', $post);  





          }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
         // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post = Post::find($id);
        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }





}
