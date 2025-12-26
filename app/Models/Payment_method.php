<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;

    public function order() {
        return $this->hasMany(Order::class,'payment_id','id');
    }

    protected $fillable = [
        'method_name',
        'isDeleted',
    ];
}
