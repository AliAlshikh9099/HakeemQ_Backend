<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Auth\Authenticatable;

class Doctor extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory,HasApiTokens;
    use Authenticatable;
    protected $guarded = ['profile_image'];
    
    protected $hidden = [
        'password',
    ];


public function appointments()
{
return $this->hasMany(appointment::class);
}
}
