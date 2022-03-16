


<section class="container">
  
  <div class="row py-3  justify-content-between">
    
    <div class="col">
        <h2>Todos los productos</h2>
        <p style="color: gray">Se han encontrado {{count($arrayProductos)}} productos</p>
      </div>
      @if ( (Session::get('nombre') !== null && Session::get('nombre') == 'admin'))
      <div class="col">
        <a class="btn btn-success" type="button" href="{{url('/producto/create')}}">
          <i class="bi bi-plus-circle"></i>
          Agregar nuevo producto
        </a> 
      </div>
      @endif
      

  </div>

    <div class="row">
        <!-- FILTROS --> 
        <div class="col-2 py-3 me-4">
          <form action="{{url('tienda/filtrar')}}" method="get">
            <h4>Categorias</h3>
              @foreach ($categorias as $categoria) 
                <div class="form-check py-1">
                  @if ( isset($categoriasSeleccionadas) && array_search($categoria->nombre,$categoriasSeleccionadas))
                  <input checked class="form-check-input" type="checkbox" value="{{$categoria->nombre}}" id="{{$categoria->nombre}}" name="checkbox {{$categoria->nombre}}">
                      
                  @else
                  <input class="form-check-input" type="checkbox" value="{{$categoria->nombre}}" id="{{$categoria->nombre}}" name="checkbox {{$categoria->nombre}}">
                  @endif
                    <label class="form-check-label" for="{{$categoria->nombre}}">
                      {{$categoria->nombre}}
                    </label>
                  </div>
                @endforeach 
            <div class="py-2"> 
              <h4>Precio</h3>
              <div class="py-2"> 
                <input type="text" name="precioMin" id="precioMin" placeholder="mínimo" style="width: 90px" value="{{isset($precioMin)?$precioMin:null; }}"> 
                <input type="text" name="precioMax" id="precioMax" placeholder="máximo" style="width: 90px" value="{{isset($precioMax)?$precioMax:null; }}">
              </div>
            </div>
            <div class="row py-1">
              <button class="btn btn-outline-primary" type="submit">Aplicar filtros</button>
            </div>
           
          </form>
        </div>
        <!-- /FILTROS --> 
 
        <!-- Productos --> 
        <div class="col ps-2 d-flex justify-content-center">
           
          @include('producto.index',$arrayProductos)
          
        </div>
    </div>
</section>