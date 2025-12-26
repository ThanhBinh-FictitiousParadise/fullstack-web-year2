<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        return $this->hasMany(Product::class,'category_id','id');
    }

    protected $fillable = [
        'category_name',
        'isDeleted'
    ];
}
