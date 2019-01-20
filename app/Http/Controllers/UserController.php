<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::orderBy('name')->paginate(10);
        $users_total = User::count();
        return view('users.index', compact('users', 'users_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validation();
        $attributes['password'] = bcrypt('secret');
        $request = User::create($attributes);
        Alert::success('Usuário cadastrado com sucesso!');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->update($this->validation());
        Alert::success('Usuário atualizado com sucesso!');
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Service::where('user_id', '=', $user->id)->first()){
            Alert::error('Usuário não pôde ser excluído!');
            return redirect()->route('users.show', $user->id);
        } else {
            $user->delete();
            Alert::success('Usuário excluído com sucesso!');
            return redirect('/users');
        }
    }

    public function validation()
    {
        return request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:3', 'max:255']
        ]);
    }
}
