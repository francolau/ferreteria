
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
    <style>
      .container-1 {
      padding-top: 8rem;
      padding-bottom: 6rem;
      }

       a{
        text-decoration: none !important;
       }

      i{
        font-size:18px;
      }

      i:focus, i:hover, #ped:focus, #ped:hover{
          color:#ff0000;
      }

      #op{
        margin-right: 0px;
      }

      ul{
        list-style-type: none;
      }

    

      @media (max-width: 768px) {
        .container-1 {
          position:relative;
          }
        }
        .col-sm-3{
          margin: auto auto auto;
        }

        #inicio, #pedidos, #detalles, #finalizar{
          background-color: aliceblue;
          font-family: 'Poppins', sans-serif;
          font-style:normal;
          display: block;
          border: solid #d4d3d3 0.5px;
          padding: 10px 0 10px;
          margin: 5px auto;
        }
        
        .col-sm-8{
          display: inline-block;
          overflow: hidden;
          
        }

        .col-sm-8 label{
          font-weight:bold ;
          display: block;
        }

        .col-sm-8 form .required {
          color: red;
          border: 0;
          display: block;
        }

        .col-sm-8 .col p {
          font-family: 'Poppins', sans-serif;
          font-weight: lighter;
          font-size: 19px;

        }
        .col-sm-8 .col span{
          font-weight: bold;
        }
        
      
  </style>

  <link href="navbar.css" rel="stylesheet">
</head> 

<html>

@include('nav-footer.nav')
    <div class="container-1 row" id="op"> 
            @include('usuario.menu')   
            
            <div class="col-sm-8"> 
              <div class = "col" id="parrafo"> 
                <p>¡Hola bienvenido! <span> 
                  {{(Session::get('usuario'))}} </span> (¿No eres <span> {{(Session::get('usuario'))}}</span>? 
                  <a id="ped" href ="{{url( '/sesion/guardarCambios' )}}"> Cerra Sesión </a> ) </p>
                <ul>
                  <li><p>Desde el escritorio de tu cuenta puedes ver tus <a id="ped" href = "{{url( '/sesion/pedidos' )}}">pedidos recientes</a>,
                      <a id="ped" href="{{url('sesion/detalles')}}"> y los detalles de tu cuenta.</a></p></li>
                </ul>
              </div>
              
            </div>      
    </div>

   


</html>
