<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    
    protected $table = "orders";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id' , 'productId' , 'userId' , 'quantity' , 'totalPrice', 'name' , 'email' , 'phone' , 'city' , 'district' , 'address' , 'type' , 'payment' ,  'status' , 'evidence'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }


    public function testimonial()
    {
        return $this->hasMany(Testimonial::class, 'orderId');
    }
}
