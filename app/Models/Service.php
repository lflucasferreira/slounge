<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'inicio', 'fim'
    ];

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
