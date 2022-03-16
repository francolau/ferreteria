<section class="">

    <div class="container" style="margin: 0px; padding:0px;">

        <div class="row justify-content-left row-cols-2 row-cols-md-3 row-cols-xl-2">


            @foreach ($arrayProductos as $producto)


            <div class="col mb-3" style=" width:270px; ">


                <div class="card" style="height: 375px;">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset('storage').'/'.$producto->imagen  }}" alt="..."
                        style="height: 178px;">

                    <section class="container justify-content-between" style="margin: 0px; padding:0px;">

                            @if (Session::get('nombre') !== null && Session::get('nombre') == 'admin')
                               <form action="{{url('producto/cambiarEstado/'.$producto->codigo)}}" method="POST"
                                 enctype="multipart/form-data">
                                @csrf
                                {{@method_field('PATCH')}}
                            @else
                                <form action="{{url('carrito/agregar')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            @endif
                                <div class="row card-body text-center  align-items-center">

                                    <!-- Product name-->
                                    @if (Session::get('nombre') !== null && Session::get('nombre') == 'admin')
                                      <!-- Product name-->
                                      <h5 style="font-size:18px">
                                          <a href="{{url('producto/show/'.$producto->codigo)}}">
                                              <i class="bi bi-pencil"></i>
                                              {{$producto->nombre}}</a>
                                      </h5>
                                    @else
                                    
                                      <h5 style="font-size:18px">
                                          <a href="{{url('producto/show/'.$producto->codigo)}}">{{$producto->nombre}}</a>
                                      </h5>
                                    @endif


                                    <!-- Product price-->
                                    <div class="d-flex justify-content-center big text">${{$producto->precio}}</div>


                                </div>


                                <!-- DAR DE ALTA O DAR DE BAJA --> 
                                <div class="row card-footer border-top-0 bg-transparent ">

                                    <section class="d-flex justify-content-around align-items-center">
                                        @if (Session::get('nombre') !== null && Session::get('nombre') == 'admin')

                                          @if ( $producto->estado == 1 )
                                              <button class="btn btn-danger mt-auto" href="#" type="submit">
                                                  <i class="bi bi-trash me-1"></i>
                                                  Dar de baja </button>
                                        @else
                                          <button class="btn btn-primary mt-auto" href="#" type="submit">
                                              <i class="bi bi-plus-circle-dotted me-1"></i>
                                              Dar de alta </button>
                                        @endif

                                        @elseif(Session::get('nombre') !== null)

                                          <input type="text" id="cantidadProducto" name="cantidadProducto" value="1"
                                              style="width: 42px; height:36px; text-align:center">
                                          <button class="btn btn-primary mt-auto" href="#" type="submit">Agregar al
                                              carrito</button>

                                        @else

                                          <input type="text" id="cantidadProducto" name="cantidadProducto" value="1"
                                              style="width: 42px; height:36px; text-align:center">
                                          <a class="btn btn-primary mt-auto" data-bs-toggle="modal"
                                              data-bs-target="#modal_container">Agregar al carrito</a>

                                        @endif
                                    </section>
                                    <input class="invisible" type="text" name="codigoDelProducto" value="{{$producto->codigo}}" style="width: 0px; height:1px;">

                                </div>


                            </form>
                    </section>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
