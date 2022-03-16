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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        <blade media|%20(min-width%3A%20768px)%20%7B%0D>.bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
        }

    </style>

    <link href="navbar.css" rel="stylesheet">
</head>
<html>


    @include('nav-footer.nav')


<div class="container py-3">
    <div class="row">
        <div class="col d-flex align-items-center ">
            <section class="container">

                <div class="row">
                    <h1 class="display-flex"> <i class="bi bi-x-octagon"></i> Ups..</h1>
                </div>
                <div class="row">
                    <p style="font-size: 25px">al parecer no tenés permisos para ingresar a esta sección :(</p>

                </div>
                
            </section>
        
    </div>

    <div class="col">
        <img style="height: 500px" class="img-fluid" src="https://media.istockphoto.com/vectors/no-data-illustration-vector-concept-vector-id1300261821?k=20&m=1300261821&s=612x612&w=0&h=yQZGdLw_ndlXcpNnOlnNcne86JwmsLifMM1DWdKar7Q=" alt="">
    </div>
</div>

</div>




@include('nav-footer.footer')

</html>
