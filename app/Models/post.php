<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';

    public $timestamps = false;
    protected $table ='users_post';
    protected $fillable = [
        'title',
        'image',
        'description',
        'status'        
    ];

    // public function user(){
    //     return $this->hasMany(user_post::class);
    // }
   
}
