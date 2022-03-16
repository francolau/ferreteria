
    <head>
  
  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <title>Inicio</title>
    
         <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">  
        <!-- SCRIPT PARA PODER OCUPAR LAS FUNCIONALIDADES DEL NAV-->
        <!-- <script src="bootstrap-5.1.3-examples\assets\dist\js\bootstrap.bundle.min.js""></script> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Bootstrap core CSS -->
          <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>  
     
        <link href="navbar.css" rel="stylesheet">
    </head> 

<html>
@include('nav-footer.nav')

<body style="background-color: #6279c8" >
    


<section class="container my-5 py-4 px-4 shadow p-3 mb-5 bg-body rounded" style="background-color: white">
  
    <div class="row">
        
        <h2 class="text text-center"> <i class="bi bi-bag"></i> Pedido realizado con éxito</h2>
    </div>
    <hr>

    <div class="row text text-start">
        <h4>Número de pedido #{{$id_compra}}</h4>
        <p class="inactive">Entregale este codigo al cajero </p>
        <div class="d-flex w-100 justify-content-left">
            <p class="mr-3">Cliente: </p> <p> {{$apellidoYnombre}}</p>
        </div>
        <div class="d-flex w-100 justify-content-left">
            <p class="mr-3">Fecha y hora del pedido: </p> <p> {{$fecha_hora}}</p>
        </div>
        <section class="px-5">
            <ul class="list-group list-group-flush">
                <!-- c.id_compra, dc.subtotal,dc.cantidad,p.precio,p.nombre,c.total, c.id_cliente,p.codigo --> 
                @foreach ($detalleCompra as $detalle)
                    
                
                <li class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <p>{{$detalle -> nombre .' x '. $detalle -> cantidad}}</p>
                        <p>${{$detalle -> subtotal}}</p>
                    </div>    
                </li>

                @endforeach
                   <!-- /LOOP --> 
                 
              </ul> 
        </section>
        <hr>
        <section class="d-flex justify-content-between align-items-center"> 
            <h4>Total a pagar: </h4><h1>{{$detalle -> total}}</h1>
        </section>
    
    </div>

</section>

<section class="container  my-5 py-4 px-3" style="background-color: white">

    <div class="row">
        
        <h2 class="text text-center"> <i class="bi bi-pin-map"></i> Retiralo en nuestro local</h2>
        <hr>
    </div>

    <div class="row text text-start">
        <h1>Ferretería Ipsum</h1>
        <h4>AV. Pellgrini 1321</h4>
        <h5>Horarios: 12am a 52pm</h5>  
    </div>

    <div class="row">
        <img src="https://programacion.net/files/article/20170405040453_mapa.jpg" style="height: 500px" alt="">
    </div>


    <div class="row mt-4">
        
        <h2 class="text text-center"> <i class="bi bi-cash-coin"></i> Métodos de pago</h2>
        <hr>
    </div>
 

</section>


 

</body>

@include('nav-footer.footer')
 
</html>

