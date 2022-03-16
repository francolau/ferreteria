@include('nav-footer.nav')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="../resources/css/cuenta.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <div class="container-1 row" id="op">
         <!-- Inicio pedidos direcciones detalles de cuenta finalizar sesion-->
          <ul class = "col-sm-3">
            <li><a class="text-center button" href = "{{url( 'principal' )}}"><i href= "#" id="inicio">Inicio</i></a></li>
            <li><a class="text-center button" href = "{{url( 'pedidos' )}}"><i href="#" id="pedidos">Pedidos</i></a></li>
            <li><a class="text-center button" href = "{{url( 'direcciones' )}}"><i href="#" id="direcciones">Direcciones</i></a></li>
            <li><a class="text-center button" href = "{{url( 'detalles' )}}"><i href="#" id="detalles">Detalles de cuenta</i></a></li>
            <li><div class="text-center"><i href = "#" id= "finalizar">Finalizar</i></div></li>
          </ul>
          <div class="col-sm-8" id="parrafo"> 
            <div class = "col"> 
              <p> Las siguientes direcciones se utilizarán por defecto en la página de pago. </p>
              <ul>
                <li><h3 style="justify-content:center;"> Direccion de facturacion </h3></li>
                <li></li>
              </ul>
            </div>
            
          </div>      
    </div>
   