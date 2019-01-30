<?php

namespace App\Models;

use App\Events\ClientCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // protected $dispatchesEvents = [
    //     'created' => ClientCreated::class
    // ];

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

    public function isUser()
    {
        return User::where('email', $this->email)->first();
    }
}
