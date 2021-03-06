<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use App\Http\Requests\ServiceRequest;

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
        $services = Service::orderBy('nome')->paginate(10);
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
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('nome')->get();
        return view('services.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $request = Service::create($request->validated());
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
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('nome')->get();
        return view('services.edit', compact('categories', 'service', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
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
        if (Appointment::where('service_id', '=', $service->id)->first()) {
            Alert::error('O compromisso não pôde ser excluído!');
            return redirect()->route('services.show', $service->id);
        } else {
            $service->delete();
            Alert::success('Serviço excluído com sucesso!');
            return redirect('/services');
        }
    }
}
