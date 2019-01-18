<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::paginate(10);
        $services_total = Service::count();
        return view('services.index', compact('services', 'services_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
        $request = Service::create($attributes);
        Alert::success('Serviço cadastrado com sucesso!');
        return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service)
    {
        $service->update($this->validation());
        Alert::success('Serviço atualizado com sucesso!');
        return redirect()->route('services.show', $service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Alert::success('Serviço excluído com sucesso!');
        return redirect('/services');
    }

    public function validation()
    {
        return request()->validate([
            'nome' => ['required', 'min:3', 'max:50'],
            'descricao' => ['required', 'min:3', 'max:50'],
            'preco' => ['nullable'],
            'duracao' => ['nullable'],
            'inicio' => ['nullable'],
            'fim' => ['nullable'],
            'user_id' => ['nullable'],
            'category_id' => ['nullable']
        ]);
    }
}
