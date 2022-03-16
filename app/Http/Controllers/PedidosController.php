<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
 

class PedidosController extends Controller
{
 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('nombre')!= null && Session::get('nombre') == 'admin')
        { 
            $pedidos = DB::SELECT('call devolverPedidosRealizados()');

            $parametros = [
                'pedidos' => $pedidos
            ];

            return view('pedido.inicio', $parametros);
        } else
        {
            return view('error_permisos');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($codigo)
    {
        if(Session::get('nombre')!= null && Session::get('nombre') == 'admin')
        {
            $productosDelCarrito = DB::select('call devolverCarritoRealizado('.$codigo.')');
            $detallesDelProductoDelCarrito = DB::select(' call devolverDetalleCarritoRealizado('.$codigo.')');
            if(Session::get('idCompra') == null)
            {
                Session::put('idCompra',$codigo);

            }
            else
            {
                //Session::forget('idCompra');
                Session::remove('idCompra');
                Session::put('idCompra',$codigo);
           
            }
            $parametros = 
            [
                "arrayProductos" => $productosDelCarrito,
                "detallesProductosDelCarrito" => $detallesDelProductoDelCarrito, 
                "modo" => 'finalizar'
            ];
    
            return view('carrito.index',$parametros);

        } else
        {
            return view('error_permisos');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($codigo)
    {
        
       // $Compra = DB::select("SELECT * FROM compra WHERE id_compra = ".$codigo);
        $Compra = DB::table('compra')->where('id_compra','=',$codigo)->get('*')->firstOrFail();
        $idCliente = Session::get('id');
        

        if( $idCliente == $Compra->id_cliente || (Session::get('nombre')!= null && Session::get('nombre') == 'admin'))
        {
            DB::table('detalle_compra')->where('id_compra','=', $codigo)->delete();
            DB::table('compra')->where('id_compra','=', $codigo)->delete();
    
            return back();

        } else
        {
            return view('error_permisos');
        }

    }

    public function modificar(Request $request, $codigo)
    {
        if(Session::get('nombre')!= null && Session::get('nombre') ==  'admin' )
        {
            $cantidad = $request ->get('cantidadProducto');
     
            DB::select('call modificarPedidoRealizado('.Session::get('idCompra'). ','. $codigo.','.$cantidad.')');
               
            return back();
        } else
        {
            return view('error_permisos');
        }
    }

    public function finalizar(Request $request)
    {
        if(Session::get('nombre')!= null && Session::get('nombre') ==  'admin' )
        {
        
            $idCompra= Session::get('idCompra');

            DB::table('compra')->where('id_compra','=',$idCompra)->update([
                'estado' => 'finalizada'
            ]);
               
            return url('/tienda');
        } else
        {
            return view('error_permisos');
        }
    }

    public function eliminarProducto($codigo)
    {
        DB::select('call eliminarProductoDePedido('.Session::get('idCompra').','. $codigo.')');
        return back();
    }
 

}
