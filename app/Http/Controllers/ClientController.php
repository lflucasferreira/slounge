<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\Reward;
use App\Http\Requests\ClientRequest;
use App\Notifications\ClientCreatedSuccessfully;

class ClientController extends Controller
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
        $clients = Client::orderBy('nome')->paginate(10);
        $clients_total = Client::count();
        return view('clients.index', compact('clients', 'clients_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $request = Client::create($request->validated());
        Alert::success('Cliente cadastrado com sucesso!');
        $client = Client::where('email', $request->email)->first();
        $client->notify(new ClientCreatedSuccessfully($request));
        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        Alert::success('Cliente atualizado com sucesso!');
        return redirect()->route('clients.show', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if (Appointment::where('client_id', '=', $client->id)->first() || Reward::where('client_id', '=', $client->id)->first()) {
            Alert::error('O cliente não pôde ser excluído!');
            return redirect()->route('clients.show', $client->id);
        } else {
            $client->delete();
            Alert::success('Cliente excluído com sucesso!');
            return redirect('/clients');
        }
    }
}
