<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['productos']=Producto::paginate(1);
        return view('producto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Descripcion_del_Producto'=>'required|string|max:50',
            'Categoria'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Stock'=>'required|numeric|max:100',
            'Fotografia'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Peso_Dimension'=>'required|string|max:100',
            'Fecha_Ingreso'=>'required|date|max:100',
        ];

        $mensaje=[
                'required'=>'El :attribute es requerido',
                'Fotografia.required'=>'La Fotografia es requerida'
        ];

        $this->validate($request, $campos, $mensaje);


        /*$datosProducto = request()->all();*/
        $datosProducto = request()->except('_token');

        if($request->hasFile('Fotografia')){
            $datosProducto['Fotografia']=$request->file('Fotografia')->store('uploads','public');
        }

        Producto::insert($datosProducto);
        //return response()->json($datosProducto);
        return redirect('producto')->with('mensaje','Producto agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $producto=Producto::findOrFail($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Descripcion_del_Producto'=>'required|string|max:50',
            'Categoria'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
            'Stock'=>'required|numeric|max:100',
            'Peso_Dimension'=>'required|string|max:100',
            'Fecha_Ingreso'=>'required|date|max:100',
        ];

        $mensaje=[
                'required'=>'El :attribute es requerido',
                
        ];

        if($request->hasFile('Fotografia')){
            $campos=['Fotografia'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Fotografia.required'=>'La Fotografia es requerida'];
        }

        $this->validate($request, $campos, $mensaje);

        //
        $datosProducto = request()->except(['_token','_method']);
        
        if($request->hasFile('Fotografia')){
            $producto=Producto::findOrFail($id);
            Storage::delete('public/'.$producto->Fotografia);
            $datosProducto['Fotografia']=$request->file('Fotografia')->store('uploads','public');
            }




        Producto::where('id','=',$id)->update($datosProducto);
        $producto=Producto::findOrFail($id);
        //return view('producto.edit', compact('producto'));

        return redirect('producto')->with('mensaje','Producto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $producto=Producto::findOrFail($id);

        if(Storage::delete('public/'.$producto->Fotografia)){
            Producto::destroy($id);
        }

        return redirect('producto')->with('mensaje','Producto Borrado');
    }
}
