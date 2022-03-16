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






<div class="container p-3 my-2">

    <div class="row p-3 ml-3 mt-3 mb-1">
        <h3>Carrito</h3>
        <p style="color: gray">{{ count($arrayProductos) }} productos agregados</p>
    </div>


    <div class="row">
        <div class="col">
            @include('carrito.producto',[$arrayProductos,$modo])
        </div>
        <div class="col-4 p-3">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <h4 class="my-3">Detalle del Pedido</h4>
                <ol class="list-group list-group-flush">
                    @foreach($detallesProductosDelCarrito as $item)


                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">$
                                    {{ isset($item -> precio)? $item -> precio : '0' }}
                                </div>
                                {{ isset($item -> nombre)? $item -> nombre : '' }}
                            </div>
                            <span
                                class="badge bg-primary rounded-pill">{{ isset($item -> cantidad)? $item -> cantidad : '0' }}</span>
                        </li>



                    @endforeach
                </ol>
                <div class="row my-3">
                    <div class="col">
                        <h3>Total:</h3>
                    </div>
                    <div class="col-9 ">
                        <h2 class="text-right">$
                            {{ isset($item -> total)? $item -> total : '0' }}
                        </h2>

                    </div>
                </div>

                @switch($modo)
                    @case('historial')
    
                        @break
                    @case('finalizar')
                    <form action="{{ url('/pedidos/finalizarPedido') }}" method="post">
                      @csrf
                        {{ @method_field('PATCH')}}
                      <div class="d-grid gap-2">

                          <button class="btn btn-primary" type="submit">Finalizar pedido</button>

                      </div>
                  </form>

                        @break
                    @default
                        <form action="{{ url('/carrito/realizarPedido') }}" method="post">
                            @csrf
    
                            <div class="d-grid gap-2">
                            @if (count($arrayProductos) >= 1 )
                            <button class="btn btn-primary" type="submit">Realizar pedido</button>
                                
                            @else
                            <a class="btn btn-primary">Realizar pedido</a>
                            @endif
    
                            </div>
                        </form>
    
                        @break

                @endswitch

            </div>


        </div>
    </div>

</div>




@include('nav-footer.footer')

</html>
