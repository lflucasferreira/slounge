<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\Reward;
use App\Models\User;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderByDesc('validade')->paginate(10);
        $coupons_total = Coupon::count();
        return view('coupons.index', compact('coupons', 'coupons_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy('nome')->get();
        $users = User::orderBy('name')->get();
        return view('coupons.create', compact('clients', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $request = Coupon::create($request->validated());
        Alert::success('O cupom foi cadastrado com sucesso!');
        return redirect('/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return view('coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $clients = Client::orderBy('nome')->get();
        $users = User::orderBy('name')->get();
        return view('coupons.edit', compact('clients', 'coupon', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->validated());
        Alert::success('O cupom foi atualizado com sucesso!');
        return redirect()->route('coupons.show', $coupon->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        Alert::success('O cupom foi excluído com sucesso!');
        return redirect('/coupons');
    }
}
