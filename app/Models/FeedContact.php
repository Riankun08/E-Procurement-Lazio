<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeedContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "news";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id' , 'name' , 'email' , 'subject' , 'message'
    ];

}
