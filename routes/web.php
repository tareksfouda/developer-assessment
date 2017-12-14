<?php
use App\User;
use App\Post;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Auth::routes();



Route::get('/dashboard', 'DashboardController@index');
Route::any ( '/search', function () {
	$keyword = Input::get ( 'keyword' );
	$price = Input::get ( 'price' );
$reset = Input::get ( 'reset' );


if($reset=="reset"){

	 $post=Post::all();
	 return view ( 'pages.search' )->withDetails ( $post );
}
	//$post = Post::where ( 'keyword', 'LIKE', '%' . $q1 . '%' )->get ();
	$post = Post::where([
    ['keyword', 'LIKE', '%' . $keyword . '%'],
    ['price', 'LIKE', '%' . $price . '%'],
])->get();





	
	if (count ( $post ) > 0){

		return view ( 'pages.search' )->withDetails ( $post );
	
	
}
	
	else{
		return view ( 'pages.search' )->withMessage ( 'No Details found. Try to search again !' );
	}
} );


Route::get('contact', 
  ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'AboutController@store']);



  