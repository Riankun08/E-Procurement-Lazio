<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = "products";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id' , 'name' , 'price' , 'merk' , 'quantity' , 'remainingQuantity' , 'status' , 'image'  , 'categories' , 'description' 
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'productId');
    }

    public function testimonial()
    {
        return $this->hasMany(Testimonial::class, 'productId');
    }
}
