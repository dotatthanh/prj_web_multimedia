<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

class Customer extends Authenticatable
{
    use HasRoles;
    protected $guard_name = 'web';
    protected $guard = 'web';

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