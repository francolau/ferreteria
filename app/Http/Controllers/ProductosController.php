<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
 

class ProductosController extends Controller
{
     
    public function index()
    {
    
        $productos = DB::select("SELECT * FROM producto ORDER BY precio DESC");

   

        $parametros = [
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

        return view("producto.index",$parametros);
    
    }
 
    public function create()
    {
        if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
        {

            return view('producto.create');
        }
        else
        {
            return view('error_permisos');
        }

    }

  
    public function store(Request $request)
    {
        if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
        {

            $productoNuevo = request()->except('_token');        

            if($request -> hasFile('imagen')){
                $productoNuevo['imagen']=$request->file('imagen') ->store('uploads','public');
            }
            
            DB::table('producto')->insert($productoNuevo);  

            return redirect('producto');

        }
        else
        {
            return view('error_permisos');
        }


         
    }
 
    public function show($id)
    {

        $producto = DB::table('producto')->where('codigo','=',$id)->get('*')->firstOrFail();
  
        $productos = DB::select("SELECT * FROM producto WHERE categoria LIKE '".$producto->categoria."'");
     
       
        $parametros = [
            "producto" => $producto,
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

        return view("vistaProducto",$parametros); 
    }

  
    public function edit($id)
    {
        if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
        {

            $producto = DB::table('producto')->where('codigo','=',$id)->get('*');
            $producto = $producto->first(); 
            return view('producto.edit')->with('producto',$producto);
        }
        else
        {
            return view('error_permisos');
        }

        
    }

 
    public function update(Request $request, $codigo)
    { 
        if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
        {
            $datosProducto = $request->except(['_method','_token']);

            if($request -> hasFile('imagen')){
                if( $request->file('imagen') != 'uploads/error-imagen.png') {
                    Storage::delete('public/'.$datosProducto['imagen']);
                }
                $datosProducto['imagen']=$request->file('imagen') ->store('uploads','public');
            }

            DB::table('producto')->where('codigo','=',$codigo)->update($datosProducto);
            
            return redirect('/tienda');
        }
        else
        {
            return view('error_permisos');
        }

      
    }

   
    public function destroy($id)
    {
        if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
        {
                
            $producto = DB::table('producto')->where('codigo','=',$id)->get('*');
            $producto = $producto->first(); 

            if(Storage::delete('public/'.$producto->imagen)){
                DB::delete('DELETE FROM producto WHERE codigo ='.$id);
            }  
            return redirect('producto');
        }
        else
        {
            return view('error_permisos');
        }
    }

    public function cambiarEstado($codigo)
    {
        if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
        { 
            DB::SELECT('call cambiarEstadoProducto('.$codigo.')');

            return redirect('/tienda');
        }
        else
        {
            return view('error_permisos');
        } 
    }
}
