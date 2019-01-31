<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Reward;
use App\Models\Service;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Carbon;
use App\Notifications\AppointmentCreated;
use App\Notifications\AppointmentCanceled;

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

    public function cancel()
    {
        $appointment = Appointment::find(app('request')->id);
        return view('appointments.cancel', compact('appointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $request = Appointment::create($this->attributes($request));
        Alert::success('O compromisso foi cadastrado com sucesso!');
        $client = Client::find($request->client_id);
        $client->notify(new AppointmentCreated($request));
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
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($this->attributes($request));
        dd($appointment);
        if (count($request) <= 3) {
            $client = Client::find($request->client_id);
           
           // $client->notify(new AppointmentCanceled($request));
            Alert::success('O compromisso foi cancelado com sucesso!');
            return redirect('/');
        } else {
            Alert::success('O compromisso foi atualizado com sucesso!');
            return redirect()->route('appointments.show', $appointment->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        if (Reward::where('appointment_id', '=', $appointment->id)->first()) {
            Alert::error('O compromisso não pôde ser excluído!');
            return redirect()->route('appointments.show', $appointment->id);
        } else {
            $appointment->delete();
            Alert::success('O compromisso foi excluído com sucesso!');
            return redirect('/appointments');
        }
    }

    public function attributes(AppointmentRequest $request)
    {
        $attributes = $request->validated();
        if (!array_key_exists('canceled', $attributes) && count($attributes) > 3) {
            $attributes['inicio'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['inicio'] . ':00'));
            $attributes['fim'] = Carbon::createFromTimestamp(strtotime($attributes['data'] . $attributes['fim'] . ':00'));
        }
        return $attributes;
    }
}
