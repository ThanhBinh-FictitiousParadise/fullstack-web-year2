<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;

    protected $fillable = [
        'imei_number',
        'isDeleted',
    ];

    public function product() {
            return $this->belongsTo(Product::class,'product_id','id');
        }

    public static function findByImei($imei)
    {
        return static::where('imei_number', $imei)
                     ->where('isDeleted', 0)
                     ->first();
    }
}
