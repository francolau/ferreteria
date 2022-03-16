 

<form method="post" action="registro" class="formulario" name="formulario_registro">
    @csrf
    <div class="input-group-personal-data">
    <h3> Datos Personales</h3> 
    
        <div class="input-group-data">
            <label class="apellido_nombre" for="nombreInput">Nombre</label>  <input type="text" class="DNI" name="nombreInput" id="nombreInput" autocomplete="false"> 
         </div>
         <div class="input-group-data">
            <label class="apellido_nombre"  for="apellidoInput">Apellido</label> <input type="text" class="DNI" name="apellidoInput" id="apellidoInput" autocomplete="false">
         </div>
         <div class="input-group-data">
            <label for="">Fecha de Nacimiento</label> <input type="text" class="DNI" name="fechaNacimientoInput">
         </div>
         <div class="input-group-data">
            <label for="">Telefono</label> <input type="number" class="DNI" name="telefonoInput" >
         </div>
      
    </div>
   
    <div class="input-group-usuario-data">

        <h3> Datos de Usuario</h3> 
        <div class="input-group-data">
        <label for="">Usuario</label> <input type="text" class="usuario" name="usuarioInput">
        </div>
        <div class="input-group-data">
        <label for="">Email</label> <input type="email" class="usuario" name="emailInput">
        </div>
        <div class="input-group-data">
        <label for="">Contrasenia</label> <input type="password" class="usuario" name="contraseniaInput">
        </div> 
        <div class="input-group-data">
        <label for="">Repetir Contrasenia</label> <input type="password" class="usuario" name="repetirContraseniaInput">
        </div>
   
</div>
    <button type="submit">Registrar</button>
</form>


    <table>
        <thead>
            <tr>
            @foreach ($atributosClientes as $encabezado)
            <th>{{$encabezado}}</th>
            @endforeach
            </tr>
        
        </thead>
        <tbody >
            
            @foreach ($arrayClientes as $clientes)
            <tr>
                <td>{{$clientes->id_cliente}}</td>
                <td>{{$clientes->nombre}}</td>
                <td>{{$clientes->apellido}}</td>
                <td>{{$clientes->email}}</td>
                <td>{{$clientes->fecha_nacimiento}}</td>
                <td>{{$clientes->usuario}}</td>
                <td>{{$clientes->telefono}}</td>
            </tr>
            @endforeach
             
        </tbody>


    </table>    



 
