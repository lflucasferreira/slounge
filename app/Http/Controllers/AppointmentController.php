<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Support\Carbon;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
        $appointments = Appointment::orderByDesc('inicio')->paginate(10);
        $appointments_total = Appointment::count();
        return view('appointments.index', compact('appointments', 'appointments_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy('nome')->get();
        $services = Service::orderBy('nome')->get();
        return view('appointments.create', compact('clients', 'services'));
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
        $attributes['inicio'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['inicio'] . ":00"));
        $attributes['fim'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['fim'] . ":00"));
        $request = Appointment::create($attributes);
        Alert::success('O compromisso foi cadastrado com sucesso!');
        return redirect('/appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $clients = Client::orderBy('nome')->get();
        $services = Service::orderBy('nome')->get();
        return view('appointments.edit', compact('appointment', 'clients', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Appointment $appointment)
    {
        $attributes = $this->validation();
        $attributes['inicio'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['inicio'] . ":00"));
        $attributes['fim'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['fim'] . ":00"));
        $appointment->update($attributes);
        Alert::success('Cliente atualizado com sucesso!');
        return redirect()->route('appointments.show', $appointment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        Alert::success('O compromisso foi excluído com sucesso!');
        return redirect('/appointments');
    }

    public function validation()
    {
        return request()->validate([
            'client_id' => ['required'],
            'service_id' => ['required'],
            'data' => ['required'],
            'inicio' => ['required', 'date_format:H:i'],
            'fim' => ['required', 'date_format:H:i', 'after:inicio'],
            'preco' => ['required'],
            'situacao' => ['required'],
            'observacao' => ['nullable']
        ]);
    }
}
