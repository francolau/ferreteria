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

        html,
        body {
            height: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

    </style>
    <style>
        a {
            text-decoration: none !important;
        }

        i {
            font-size: 18px;
        }

        .container-1 {
            padding-top: 8rem;
            padding-bottom: 6rem;
            justify-content: space-around;
        }

        i:focus,
        i:hover,
        #ped:focus,
        #ped:hover {
            color: #ff0000;
            text-decoration: none;
        }

        #op {
            margin-right: 0px;
        }

        ul {
            list-style-type: none;
        }



        <blade media|%20(max-width%3A%20768px)%20%7B%0D>.container-1 {
            position: relative;
        }
        }

        .col-sm-3 {
            margin: auto auto auto;
        }

        #inicio,
        #pedidos,
        #detalles,
        #finalizar {
            background-color: aliceblue;

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            display: block;
            border: solid #d4d3d3 0.5px;
            padding: 10px 0 10px;
            margin: 5px auto;
        }

        .col-sm-8 {
            display: inline-block;
        }

        .col-sm-8 label {
            font-weight: bold;
            display: block;
        }

        .col-sm-8 form .required {
            color: red;
            border: 0;
            display: block;
        }

        .div-head {
            background-color: #1e85be;
            border: 2px solid #1e85be;
            margin-bot: 0.5px;
            block-size: 1%;
        }

        .parr,
        #bot-ped {
            font-size: 19px;
        }

        #main {
       
            border: 0.2px solid #d4d3d3;
            margin-right: 1rem;
        }

        th {
            font-size: 18px;
            font-family: 'Poppins', sans-serif;
        }

        #otro {
            display: flex !important;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding-top: 25px;
            background-color: aliceblue;
        }

        #before {
            display: block !important;
            align-self: center;
            margin-bottom: 5.4%;
        }

        #parr-flex {
            display: flex !important;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding-top: 25px;
        }

        #pedido {
            font-size: 18px;
            font-family: 'Poppins', sans-serif;
        }

    </style>

    <link href="navbar.css" rel="stylesheet">
</head>

@include('nav-footer.nav')
<div class="container-1 row" id="op">
    @include('usuario.menu')

    
    <div class="col-sm-8 p-5 me-5 shadow" id="main">
        
        <h3>Pedidos en curso</h3>
        
        @if( $pedidos != null && count($pedidos) > 0)
            <table class="table table-hover my-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Estado</th>
                        <th scope="col">Fecha y Hora</th>
                        <th class="text text-end" scope="col">Total</th>
                        <th class="text text-center" colspan="2" scope="col"> Opciones </th>
                        <!-- <th scope="col"> </th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)


                        <tr>
                            <th scope="row">{{ $pedido->id_compra }}</th>

                            <td>{{ $pedido->estado }} </td>
                            <td>{{ $pedido->fecha_hora }} </td>
                            <td class="text text-end">$ {{ $pedido->total }} </td>
                            <td class="text text-end">
                                <a class="btn btn-primary"
                                    href="{{ url('/sesion/detallecompra/'. $pedido->id_compra) }}">
                                    <i class="bi bi-bag"></i> Ver
                                </a>
                            </td>
                            <td>

                                <a class="btn btn-danger" href="{{url('/pedidos/eliminar/'.$pedido->id_compra)}} ">
                                    <i class="bi bi-trash"></i> Cancelar pedido
                                </a>

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            @else
            <div style="font-family:'Poppins',sans-serif; background-color: aliceblue;
        font-size: 16px; padding-left:0px;
                padding-right:0px; height: 7rem; justify-content:space-around; " class="col d-block" id="before">
                <div class="div-head col"></div>
                <div class="d-flex" id="parr-flex">
                    <a class="parr text-center">No se ha hecho ningún pedido todavía. </a>
    
                    <a class="col-xl-5 btn-info btn" href="{{ url ('tienda') }}" id="bot-ped">
                        Explorar los productos </a>
                </div>
    
            </div>
            @endif

            <h3 class=" mt-3">Pedidos finalizados</h3>
          
            <table class="table table-hover  my-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Estado</th>
                        <th scope="col">Fecha y Hora</th>
                        <th class="text text-end" scope="col">Total</th>
                        <th class="text text-center" colspan="2" scope="col"> Opciones </th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidosFinalizados as $pedido)


                        <tr>
                            <th scope="row">{{ $pedido->id_compra }}</th>

                            <td>{{ $pedido->estado }} </td>
                            <td>{{ $pedido->fecha_hora }} </td>
                            <td class="text text-end">$ {{ $pedido->total }} </td>
                            <td class="text text-end">
                                <a class="btn btn-primary"
                                    href="{{ url('/sesion/detallecompra/'. $pedido->id_compra) }}">
                                    <i class="bi bi-bag"></i> Ver
                                </a>
                            </td>
                    
                        </tr>

                    @endforeach
                </tbody>
            </table>


        </div>

</div>
