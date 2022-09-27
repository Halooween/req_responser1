<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_post extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $table ='user';
    protected $fillable = [
        'name',
        'age',
        'image',
        'bio',
        
    ];

    // public function post(){
    //     return $this->belongsTo(post::class);
    // }
}
