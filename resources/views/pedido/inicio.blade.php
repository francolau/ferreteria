
<html>




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
  
  
  @include('nav-footer.nav')
  
 <section class="container py-3">
      <div class="row">
        <h3>Pedidos</h3>
        <p>Se han encontrado {{count($pedidos)}} pedidos por entregar</p>
 
      </div> 
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Email</th>
              <th scope="col">Fecha y Hora</th>
              <th class="text text-end" scope="col">Total</th>
              <th class="text text-center" colspan="2" scope="col"> Opciones </th>
              <!-- <th scope="col"> </th> -->
            </tr>
          </thead>
          <tbody>
            @foreach ($pedidos as $pedido)
    

              <tr>
                <th scope="row">{{$pedido->id_compra }}</th>
                <td>{{$pedido ->apellidoYnombre}}</td>
                <td>{{$pedido ->email}}</td>
                <td>{{$pedido ->fecha_hora}}</td>
                <td class="text text-end">${{$pedido ->total}}</td>
                <td class="text text-end">
                     <a class="btn btn-primary" href="{{url('/pedidos/mostrar/'.$pedido->id_compra)}}">
                      <i class="bi bi-bag"></i> Ver
                      </a>
                </td>
                <td>
                    
                  <a class="btn btn-danger" href="{{url('/pedidos/eliminar/'.$pedido->id_compra)}}">
                    <i class="bi bi-trash"></i> Eliminar
                  </a>  
            
                </td>
              </tr>
         
              @endforeach
          </tbody>
        </table>
       
    
 </section>

  
  @include('nav-footer.footer')
  </html>