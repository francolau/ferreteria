<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::select("SELECT id_cliente,nombre,apellido,email,fecha_nacimiento,usuario,telefono FROM cliente");
        $parametros = [
            "arrayClientes" => $clientes,
            "atributosClientes" => ["ID","Nombre","Apellido","Email","Fecha de Nacimiento","Usuario","Telefono"]
        ];
        return view("telefonia",$parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * id_cliente int(11) AI PK 
     * nombre varchar(45)
     * apellido varchar(45) 
     * email varchar(45)
     * usuario varchar(45) 
     * contrasenia varchar(45) 
     * fecha_nacimiento date 
     * telefono varchar(45)
     */
    public function store(Request $request)
    { 
        $clienteNuevo = [
            "nombre" => $request->post("nombreInput"),
            "apellido" =>  $request->post("apellidoInput"),
            "email" => $request->post("emailInput"),
            "usuario" => $request->post("usuarioInput"),
            "contrasenia" => $request->post("contraseniaInput"),
            "fecha_nacimiento" =>$request->post("fechaNacimientoInput"),
            "telefono" => $request->post("telefonoInput")

        ];
      
        DB::table('cliente')->insert($clienteNuevo);  
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Este es el id del cliente numero: ".$id;  
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
    public function destroy($id)
    {
        //
    }
}
