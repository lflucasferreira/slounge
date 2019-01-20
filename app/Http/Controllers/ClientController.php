<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Client;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $attributes = $this->validation();
        $request = Client::create($attributes);
        Alert::success('Cliente cadastrado com sucesso!');
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
    public function update(Client $client)
    {
        $client->update($this->validation());
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
        $client->delete();
        Alert::success('Cliente excluído com sucesso!');
        return redirect('/clients');
    }

    public function validation()
    {
        return request()->validate([
            'nome' => ['required', 'min:3', 'max:255'],
            'sobrenome' => ['required', 'min:3', 'max:255'],
            'endereco' => ['nullable', 'max:255'],
            'complemento' => ['nullable', 'max:255'],
            'edificio' => ['nullable', 'max:255'],
            'bairro' => ['nullable', 'max:255'],
            'cidade' => ['nullable', 'max:255'],
            'cep' => ['nullable', 'max:255'],
            'estado' => ['nullable', 'max:255'],
            'data_nascimento' => ['nullable', 'max:10'],
            'email' => ['nullable', 'unique:clients', 'max:255'],
            'status' => ['nullable', 'max:1'],
            'telefone_fixo' => ['nullable', 'max:11'],
            'telefone_celular' => ['nullable', 'max:11'],
            'telefone_comercial' => ['nullable', 'max:11'],
            'cpf' => ['nullable', 'unique:clients', 'max:11'],
            'rg' => ['nullable', 'max:10'],
            'orgao' => ['nullable', 'max:10']
        ]);
    }
}
