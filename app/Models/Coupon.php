<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'validade'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
