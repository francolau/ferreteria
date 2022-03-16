<div class="container m-3">



    @foreach($arrayProductos as $producto)
        <div class="card pt-3" style="max-width: 880px;">
            <!-- md-3 --> 
            <div class="row g-0">
                <div class="col-md-2">
                
                    <img src="{{ asset('storage').'/'.$producto->imagen }}"
                        class="img-fluid rounded-start" alt="...">
                </div> 
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size:16px;">{{ $producto ->nombre }}
                        </h5>
                        <p class="card-text" style="margin:0px;">{{ $producto ->marca }}</p>

                        <div class="row">

                            <div class="col-8">
                                <div class="row justify-content-start">

                                    <div class="col">
                                        <p class="card-text" style="font-size:24px;">{{ $producto -> precio }}</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="card-text" style="font-size:24px;">x</p>
                                    </div>
                              

                                        <div class="col-4 d-flex justify-content-center align-items-center">
                                          @if (Session::get('nombre') == 'admin')  
                                          <form
                                            action="{{ url('/pedidos/modificar/'.$producto->codigo) }}"
                                            method="post">
                                              @csrf
                                              {{ @method_field('PATCH') }}     
                                          @else
                                            <form
                                            action="{{ url('/carrito/modificarProducto/'.$producto->codigo) }}"
                                            method="post">
                                              @csrf
                                              {{ @method_field('PATCH') }}
                                              
                                          @endif
                                          
                                          @if ( isset($modo) && $modo == 'historial')
                                          <p class="card-text" style="font-size:24px;">{{ $producto -> cantidad }}</p>
                                              
                                          @else
                                          <div class="input-group mb-3">
                                            <input type="text" class="form-control"  name="cantidadProducto"  value="{{ $producto -> cantidad }}" aria-describedby="button-addon2">
                                            <button   
                                              type="submit" 
                                              class="btn btn-secondary" type="button" 
                                              id="button-addon2"><i
                                              class="bi bi-pencil"></i></button>
                                          </div>
                                          
                                        </form>
                                              
                                          @endif
                                        </div> 
                            
                                    <div class="col-1">
                                        <p class="card-text" style="font-size:24px;">=</p>
                                    </div>


                                </div>

                            </div>

                            <div class="col">
                                <p class="text" style="font-size:24px;">${{ $producto -> subtotal }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if ( isset($modo) && $modo == 'historial')
                    
                @else
                <div class="col-2 d-flex justify-content-center align-items-center ">

                  @if (Session::get('nombre') == 'admin')
                    <form
                    action="{{ url('/pedidos/eliminarProducto/'.$producto->codigo) }}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i
                                class="bi bi-trash"></i>Eliminar</button>
                    </form>
                  @else
                  <form
                      action="{{ url('/carrito/eliminarProducto/'.$producto->codigo) }}"
                      method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i
                              class="bi bi-trash"></i>Eliminar</button>
                  </form>
                      
                  @endif
                     
                </div>
                    
                @endif

            </div>
        </div>

    @endforeach

</div>