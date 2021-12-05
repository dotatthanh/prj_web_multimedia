<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
    	'code',
        'name',
        'avatar',
        'gender',
        'address',
        'birthday',
        'phone_number',
        'password',
        'email',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
