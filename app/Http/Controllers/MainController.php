<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    
    public function index(Request $request)
    {
       
        $categorias = DB::select("call devolverTodasLasCategorias()");
        $texto = trim($request->get('textoBuscador'));
        
        if(Session::get('nombre')!= null && Session::get('nombre') == 'admin'){
            $productos =  DB::select("SELECT * FROM producto  ORDER BY precio DESC");
        } else{
            $productos =  DB::select("call devolverProductos('%".$texto."%');");
        }
     
        $parametros = [
            "categorias" => $categorias,
            "arrayProductos" => $productos,
            "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
        ];

       return view('index', $parametros);
    } 

    public function filtrar(Request $request)
    {
        $categoriasSeleccionadas = $request->except('precioMin','precioMax','textoBuscador');
        $buscador = trim($request->get('textoBuscador'));
        $precioMin =trim($request->get('precioMin'));
        $precioMax =trim($request->get('precioMax'));

        $categorias = DB::select("call devolverTodasLasCategorias()");

        $categoriasString = $this -> convertirEnElementosParaBaseDeDatos($categoriasSeleccionadas);
        
      

        $selectWhere = "SELECT * FROM producto WHERE estado = 1 AND stock > 1 ";
        $wherePrecioMin = "AND precio >= ".$precioMin." ";
        $wherePrecioMax = "AND precio <= ".$precioMax." ";
        $whereCategoria = (count($categoriasSeleccionadas)>0)? "AND categoria IN (".$categoriasString.") ":"";
        $whereBuscador = (strlen($buscador)>0)?
                    "AND (nombre LIKE '%$buscador%' OR marca LIKE '%$buscador%'  OR descripcion LIKE '%$buscador%' OR categoria LIKE '%$buscador%')"
                    :"";

        $orderByDESC = "ORDER BY precio DESC ";

        if($precioMin == null || $precioMax == null)
        {
            $string = $selectWhere;
            if(strlen($precioMax) > 0 )
            {
                $string = $string.$wherePrecioMax;
            } else if ( strlen($precioMin) > 0 )
            {
                $string =  $string.$wherePrecioMin;

            }
             
             $string = $string.$whereBuscador.$whereCategoria;

        } else if($precioMax != null || $precioMax != null)
            {
                $string = $selectWhere.$wherePrecioMin.$wherePrecioMax.$whereBuscador.$whereCategoria;
            }
 

           
        

        $productos = DB::select($string);
        
       
     

        $parametros = [
            "categorias" => $categorias,
            "arrayProductos" => $productos,
            "precioMax" => $precioMax,
            "precioMin" => $precioMin,
            "filtroBuscador" =>  $buscador,
            "categoriasSeleccionadas" => $categoriasSeleccionadas
        ];

       return view('index', $parametros);
    }

    private function convertirEnElementosParaBaseDeDatos($arreglo)
    {
        $categoriasString ="";
        
        foreach($arreglo as $caategorias)
        {
            $categoriasString = $categoriasString."'".$caategorias."',";
        }

        $categoriasString = substr($categoriasString,0,-1);

        return $categoriasString; 
    }
}
