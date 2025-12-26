<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cpus() {
        return $this->belongsTo(Cpu::class, 'cpu_id');
    }

    public function rams() {
        return $this->belongsTo(Ram::class, 'ram_id');
    }

    public function ssds() {
        return $this->belongsTo(Ssd::class, 'ssd_id');
    }

    public function screens() {
        return $this->belongsTo(Screen::class, 'screen_id');
    }

    protected $fillable = [
        'product_name',
        'image',
        'selling_price',
        'quantity',
        'category_id',
        'cpu_id',
        'ram_id',
        'ssd_id',
        'screen_id',
        'feature',
        'pro_desc',
        'isDeleted',
    ];
}
