<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


    protected $fillable = [ 'cover_image', 'cover_image3', 'cover_image4', 'cover_image5'];
        // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
}
