<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="../resources/css/cuenta.css" rel="stylesheet">

    <!-- Inicio pedidos direcciones detalles de cuenta finalizar sesion-->
     <ul class = "col-3 ms-5">
       <li><a class="text-center " href = "{{url( '/sesion/principal' )}}"><i href= "#" id="inicio">Inicio</i></a></li>
       <li><a class="text-center " href = "{{url( '/sesion/pedidos' )}}" ><i href="#" id="pedidos">Pedidos</i></a></li>
       <li><a class="text-center"  href = "{{url( '/sesion/detalles' )}}"><i href="#" id="detalles">Detalles de cuenta</i></a></li>
       <li><a class="text-center" href ="{{url( '/sesion/guardarCambios' )}}"><i href = "#" id= "finalizar">Finalizar</i></a></li>
     </ul>
     


