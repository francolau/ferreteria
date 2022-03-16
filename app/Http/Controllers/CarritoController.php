<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('nombre') != null)
        {

            $idCliente = Session::get('id');
            $productosDelCarrito = DB::select('call devolverProductosDelCarrito('.$idCliente.')');
            $detallesDelProductoDelCarrito = DB::select(' call devolverDetallesDeProductosDelCarrito('.$idCliente.')');
            
        
            

            $parametros = [
                "arrayProductos" => $productosDelCarrito,
                "detallesProductosDelCarrito" => $detallesDelProductoDelCarrito,
                "modo" => 'realizar',
                "atributosProductos" => ["Codigo","Nombre","Marca","Stock","precio","imagen","Descripcion","Categoria"]
            ];

        }
        else
        {
            return view('error_permisos');
        }

    

        return view('carrito.index',$parametros);
    }

    public function agregarProducto(Request $request)
    {
        if(Session::get('nombre') != null)
        {
            $cantidadDelProducto =  $request ->get('cantidadProducto');
            $codigoDelProducto =  $request->get('codigoDelProducto');

            $idCliente = Session::get('id');
                # `agregarProducto`(id_cliente int(11), codigo_producto int(11), cantidad_producto int(5))
                DB::select('call agregarProducto('.$idCliente.','. $codigoDelProducto .','.$cantidadDelProducto.')');  
                return redirect('/carrito');
        }
        else
        {
            return view('error_permisos');
        }

    }

    public function realizarPedido()
    {
        if(Session::get('nombre') != null)
        {

            $idCliente = Session::get('id');
    

            $detallesDelProductoDelCarrito = DB::select(' call devolverDetallesDeProductosDelCarrito('.$idCliente.')');
            $id_compra = $detallesDelProductoDelCarrito[0] -> id_compra;
            $detalleCompra = DB::select(' call devolverDetalleCompra('. $id_compra.')');
            $apellidoYnombre = $detalleCompra[0] -> apellidoYnombre;
            $fecha_hora = $detalleCompra[0] -> fecha_hora;

            DB::select('call realizarPedido('.$idCliente.')');
            $parametros = [ 
                "detalleCompra" => $detalleCompra,
                "id_compra" => $id_compra,
                "fecha_hora" => $fecha_hora,
                "apellidoYnombre" => $apellidoYnombre
            ];

            return view('carrito.ticket',$parametros);
        }
        else
        {
            return view('error_permisos');
        }
    }

    public function eliminarProducto($codigo)
    {
        if(Session::get('nombre') != null)
        {

        $idCliente = Session::get('id');
        DB::select('call eliminarProducto('.$idCliente.','. $codigo.')');
        return redirect('/carrito');
        }
        else
        {
            return view('error_permisos');
        }
    }

    public function modificarProducto(Request $request, $codigo)
    {
        
        // debo devolver el idCliente de la base de datos de la compra y compararlo para ver si es el que quiere modificar sus cosas
        if(Session::get('nombre')!= null )
        {
           
             
                    $cantidad = $request ->get('cantidadProducto');
                    $idCliente = Session::get('id'); 
                     DB::select('call modificarPedido('.$idCliente.','. $codigo.','.$cantidad.')');
                   
                    return back();
          
        } else 
        {
            return view('error_permisos');
        }
    }

  
}
