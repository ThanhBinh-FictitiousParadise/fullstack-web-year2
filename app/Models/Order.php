<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function admin() {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    protected $fillable = [
        'customer_id',
        'status',
        'order_date',
        'isDeleted',
        'total_amount',
    ];
}
