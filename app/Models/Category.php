<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
    	'code',
    	'name',
    	'type',
    ];

    public function news(){
    	return $this->hasMany(News::class);
    }

    public function products(){
    	return $this->hasMany(Product::class);
    }
}
