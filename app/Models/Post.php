<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    // public function myUserRelation() // i will assume the foreign is my_user_relation_id
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function user() //foreign key user_id
    {
        return $this->belongsTo(User::class);
    }
}
