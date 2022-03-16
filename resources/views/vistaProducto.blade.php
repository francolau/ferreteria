
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
  <section class="container">
    
    
    @if(Session::get('nombre') != null && Session::get('nombre') == 'admin')
    @include('producto.edit',['modo'=>'editar'])
    @else
    @include('producto.show',['modo'=>'mostrar'])
    @endif


  </section>
  
  <section class="container">
    
    <div class="row mb-3"> 
      <h4>Productos relacionados</h4>
    </div>
    <div class="row mb-5"> 
      @include('producto.index',$arrayProductos)
 
    </div>
  </section>
 

  @include('nav-footer.footer')
  </html>