<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = "testimonials";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id' , 'name' , 'division' , 'orderId' , 'productId' , 'userId' , 'status' ,  'datePost' ,  'image' ,  'message'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }
}
