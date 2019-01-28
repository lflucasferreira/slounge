<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function rewards()
    {
        return $this->hasMany(Reward::class);
    }
}
