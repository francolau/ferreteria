
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
  <section class="container mb-5">
    <div class="col">
      <div class="row">
        <img
          class="img-fluid"
          src="https://http2.mlstatic.com/storage/splinter-admin/o:f_webp,q_auto:best/1617222992695-headerdesktop.jpg"
          alt=""
        />
      </div>
      <div class="row m-5">
        <h4 class="text-center" style="font-size: 16px; color:rgb(209, 209, 209)">
          CON NOSOTROS VAS A ENCONTRAR PRODUCTOS DE PRIMERA CALIDAD
        </h4>
      </div>
  
      <div class="row">
        
        <section class="d-flex justify-content-center">
          @include('producto.index',$arrayProductos)
        </section>
     
      </div>
  
      <div class="row mt-5">
        <div class="container">
         
            <div class="row">
               <section class="d-flex justify-content-center">
                  <div class="col align-self-left">
                    <img
                      style="width: 600;  "
                      src="{{url('storage/uploads/banner_pedi_retira.png')}}"
                      alt=""
                    />
                  </div>
                  <div class="col align-self-end">
                    <img
                      style="width: 600;"
                      src="https://http2.mlstatic.com/D_NQ_NP_758115-MLA45347999721_032021-OO.webp"
                      alt=""
                    />
                  </div>
               </section>
            </div>
       
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-4 g-2 mt-5 justify-content-around">
        @foreach ($categorias as $categoria)
        <div class="col">
          <div class="card">
              <a href="{{url('tienda/filtrar/')}}">
            <img src="https://http2.mlstatic.com/D_NQ_NP844943-MLA45346081592_032021-B.webp" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">{{$categoria->nombre}}</h5>
             
            </div>
          </div>
        </a>
        </div>
        @endforeach
       
      </div>


    </div>
  </section>
        
       

    </div>  
  </section>
  <div class="mt-5">
    @include('nav-footer.footer')
  </div>

  </html>