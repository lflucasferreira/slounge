<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'data', 'inicio', 'fim', 'deleted_at'
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

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
}
