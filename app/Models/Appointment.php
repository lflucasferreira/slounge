<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use Notifiable;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'data', 'inicio', 'fim'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function rewards()
    {
        return $this->hasMany(Reward::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
