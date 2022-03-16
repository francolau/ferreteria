
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


@if (Session::get('nombre') !== null && Session::get('nombre') == 'admin')
  <nav class="navbar navbar-expand-lg navbar-dark sticky-lg-top " aria-label="Third navbar example" style="background-color:#6279c8;">
    <div class="container-fluid col-md-10">
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="https://i0.wp.com/colindustria.com/wp-content/uploads/2015/04/cropped-iconos-14-1.png?ssl=1" alt="" width="30" height="30" class="d-inline-block align-text-top"> Ferretería </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="col-md-4" action="{{url('tienda/filtrar')}}" method="GET">
        <input class="form-control" value=""  name="textoBuscador" type="text" placeholder="Buscar productos, marcas, categorias..." aria-label="Search">
      </form>
      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto  mb-sm-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="{{url('/')}}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{url('tienda')}}">Editar Productos</a>
            </li>
            
            <li class="nav-item position-relative">
              
              <a class="nav-link active " style="" href="{{url('pedidos')}}">Ver pedidos
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  5 
                  <span class="visually-hidden">pedidos sin entregar</span>
                </span>
              </a>
            
            </li>
            
        </ul>
        <ul class="navbar-nav me-0 mb-1 mb-sm-0"> 
          
          @if(Session::get('nombre')!= null) 
          
            <li class="nav-item">
              <a class="nav-link active btn btn-success" aria-current="page" href="{{ url ( '/sesion/principal' )}}">
                {{Session::get('nombre')}}
              </a>
            <li class="nav-item">
              <a class="nav-link active btn btn-success" aria-current="page" href="{{ url ( '/sesion/salir' )}}" style="margin-left: 10px"> Logout </a>
            </li>
            </li> 

            
          
          @else <li class="nav-item">
              <a class="nav-link active btn btn-success" aria-current="page" href="#" data-toggle="modal" data-target="#modal_container" id="open"> Cuenta </a>
            </li> 
          @endif 
        
        </ul>
      </div>
    </div>
  </nav> @include('usuario.modal.create')
@else
  <nav class="navbar navbar-expand-lg navbar-dark sticky-lg-top " aria-label="Third navbar example" style="background-color:#6279c8;">
    <div class="container-fluid col-md-10">
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="https://i0.wp.com/colindustria.com/wp-content/uploads/2015/04/cropped-iconos-14-1.png?ssl=1" alt="" width="30" height="30" class="d-inline-block align-text-top"> Ferretería </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-1 mb-sm-0">
          <form class="col-md-10" action="{{url('tienda/filtrar')}}" method="GET">
            <input class="form-control" value="{{ isset($buscador)?$buscador:null; }}" name="textoBuscador" type="text" placeholder="Buscar productos, marcas, categorias..." aria-label="Search">
          </form>
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('tienda')}}">Tienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('nosotros')}}">Nosotros</a>
             <!--<ul class="dropdown-menu" aria-labelledby="dropdown03">
              ACA DEBERÍAN GENERARSE POR DEFECTO TODAS LAS CATEGORIAS DISPONIBLES
              <li>
                <a class="dropdown-item" href="#">Baño</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Carpintería</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Construcción</a>
              </li> 
               
            </ul>  -->
          </li>
        </ul>
        <ul class="navbar-nav me-0 mb-1 mb-sm-0"> 
          
          @if(Session::get('nombre')!= null) 
          
            <li class="nav-item">
              <a class="nav-link active btn btn-success" aria-current="page" href="{{ url ( '/sesion/principal' )}}">
                {{Session::get('nombre')}}
              </a>
            <li class="nav-item">
              <a class="nav-link active btn btn-success" aria-current="page" href="{{ url ( '/sesion/salir' )}}" style="margin-left: 10px"> Logout </a>
            </li>
            </li> 

            <li class="nav-item" style="background-color: rgba(134, 129, 129, 0.15); ">
              <div class="navbar-nav me-0 mb-2 mb-sm-0">
                <!-- <img src="laravel\ferreteria\icon\carrito.png" alt="" width="24" height="24" class="d-inline-block align-text-top">
              -->
                <a class="nav-link active" aria-current="page" href="{{ url ( '/carrito' )}}">
                  <i class="bi bi-cart-fill"></i> Carrito </a>
              </div>
            </li>
          
          @else <li class="nav-item">
              <a class="nav-link active btn btn-success" aria-current="page" href="#" data-toggle="modal" data-target="#modal_container" id="open"> Cuenta </a>
            </li> 
          @endif 
        
        </ul>
      </div>
    </div>
  </nav> @include('usuario.modal.create')
@endif

