<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $incrementing = false;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}

