<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;

    public function product() {
        return $this->hasMany(Product::class,'ram_id','id');
    }

    protected $fillable = [
        'ram_name',
        'isDeleted'
    ];
}
