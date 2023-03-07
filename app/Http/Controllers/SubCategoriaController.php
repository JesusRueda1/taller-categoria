<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

/**
 * Class SubCategoriaController
 * @package App\Http\Controllers
 */
class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategorias = SubCategoria::paginate();

        return view('sub-categoria.index', compact('subCategorias'))
            ->with('i', (request()->input('page', 1) - 1) * $subCategorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategoria = new SubCategoria(); 
        $category = Categoria::pluck('name','id');
        return view('sub-categoria.create', compact('subCategoria','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SubCategoria::$rules);

        $subCategoria = SubCategoria::create($request->all());

        return redirect()->route('subcategoria.index')
            ->with('success', 'SubCategoria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategoria = SubCategoria::find($id);
        $category = Categoria::pluck('name','id');

        return view('sub-categoria.show', compact('subCategoria','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategoria = SubCategoria::find($id);
        $category = Categoria::pluck('name','id');
        return view('sub-categoria.edit', compact('subCategoria','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SubCategoria $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategoria $subCategoria)
    {
        request()->validate(SubCategoria::$rules);

        $subCategoria->update($request->all());

        return redirect()->route('subcategoria.index')
            ->with('success', 'SubCategoria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subCategoria = SubCategoria::find($id)->delete();

        return redirect()->route('subcategoria.index')
            ->with('success', 'SubCategoria deleted successfully');
    }
}
