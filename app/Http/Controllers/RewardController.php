<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Reward;

class RewardController extends Controller
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
        $rewards = Reward::orderBy('created_at')->paginate(10);
        $rewards_total = Reward::count();
        return view('rewards.index', compact('rewards', 'rewards_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointments = Appointment::where([['situacao', 'concluido'], ['status', '1']])->get();
        $clients = Client::orderBy('nome')->get();
        return view('rewards.create', compact('appointments', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request = Reward::create($this->attributes());
        Alert::success('A pontuação foi cadastrada com sucesso!');
        return redirect('/rewards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        $appointment = Appointment::find($reward->appointment_id);
        return view('rewards.show', compact('appointment', 'reward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        $appointments = Appointment::where('client_id', $reward->client_id)->get();
        $clients = Client::orderBy('nome')->get();
        return view('rewards.edit', compact('appointments', 'clients', 'reward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Reward $reward)
    {
        $reward->update($this->attributes());
        Alert::success('A pontuação foi atualizada com sucesso!');
        return redirect()->route('rewards.show', $reward->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();
        Alert::success('A pontuação foi excluída com sucesso!');
        return redirect('/rewards');
    }

    public function attributes()
    {
        $attributes = $this->validation();
        $attributes['user_id'] = auth()->id();
        if (!(is_null($attributes['data']) || $attributes['data'] == '')) {
            if (!(is_null($attributes['hora']) || $attributes['hora'] == '')) {
                $attributes['validade'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['hora'] . ":00"));
            }else{
                $attributes['validade'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . "23:59:59"));
            }
        }
        $attributes = array_except($attributes, ['data']);
        $attributes = array_except($attributes, ['hora']);
        return $attributes;
    }

    public function validation()
    {
        return request()->validate([
            'client_id' => ['required'],
            'appointment_id' => ['nullable'],
            'pontos' => ['required'],
            'data' => ['required_with:hora'],
            'hora' => ['nullable', 'date_format:H:i'],
            'status' => ['required'],
            'resgatado' => ['required'],
            'observacao' => ['nullable']
        ]);
    }
}
