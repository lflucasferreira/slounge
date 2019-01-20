<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Wallet;
use App\Models\Reward;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointments = Appointment::count();
        $categories = Category::count();
        $clients = Client::count();
        $coupons = Coupon::count();
        $rewards = Reward::count();
        $users = User::count();
        $wallets = Wallet::count();
        return view('home', compact('appointments', 'categories', 'clients', 'coupons', 'rewards', 'users', 'wallets'));
    }
}
