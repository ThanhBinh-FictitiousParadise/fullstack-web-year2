<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = false;

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];
}
