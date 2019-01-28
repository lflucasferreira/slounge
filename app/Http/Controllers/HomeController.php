<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Wallet;
use App\Models\Reward;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $topClient = DB::table('appointments')
                        ->select(DB::raw('count(*) as appointments_count, client_id, sum(preco) as total'))
                        ->groupBy('client_id')
                        ->havingRaw('MAX(preco)')
                        ->orderByDesc('total')
                        ->first();
        if (!is_null($topClient)) {
            $topClientInfo = Client::where('id', $topClient->client_id)->first()->toArray();
        } else {
            $topClientInfo = null;
        }
        $categories = Category::count();
        $clients = Client::count();
        $coupons = Coupon::count();
        $rewards = Reward::count();
        $services = Service::count();
        $mostRecentReward = Reward::latest('id')->first();
        $users = User::count();
        $wallets = Wallet::count();
        return view('home', compact('appointments', 'categories', 'clients', 'coupons', 'mostRecentReward', 'rewards', 'services', 'topClient', 'topClientInfo', 'users', 'wallets'));
    }
}
