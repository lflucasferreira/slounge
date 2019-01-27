<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::orderBy('nome')->paginate(10);
        $categories_total = Category::count();
        return view('categories.index', compact('categories', 'categories_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        $request = Category::create($attributes);
        Alert::success('Categoria cadastrada com sucesso!');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $category->update($this->validation());
        Alert::success('Categoria atualizada com sucesso!');
        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Service::where('category_id', '=', $category->id)->first()){
            Alert::error('Categoria não pôde ser excluída!');
            return redirect()->route('categories.show', $category->id);
        } else {
            $category->delete();
            Alert::success('Categoria excluída com sucesso!');
            return redirect('/categories');
        }
    }

    public function validation()
    {
        return request()->validate([
            'nome' => ['required', 'min:3', 'max:255'],
            'status' => ['required']
        ]);

    }
}
