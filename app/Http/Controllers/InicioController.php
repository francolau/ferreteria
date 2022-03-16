<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = DB::select("call devolverTodasLasCategorias()");
        if(Session::get('nombre')!= null && Session::get('nombre') == 'admin'){
            $productos =  DB::select("SELECT * FROM producto  ORDER BY precio DESC LIMIT 4");
        } else{
            $productos =  DB::select("SELECT * FROM producto  WHERE estado = 1 AND stock > 0 ORDER BY precio DESC LIMIT 4");
        }
        $parametros = [
            "categorias" => $categorias,
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

        return view('inicio',$parametros);
    }


    public function nosotros()
    {
        return view('nosotros');
    }


}
