<link href="../resources/css/login.css" rel="stylesheet">
<script src="{{ asset('../resources/js/forms.js') }}" defer></script>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <div class="modal fade text-center" id="modal_container" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="align-items:center" class="title">{{ ('Usuario') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{ url ('sesion/login/') }}">
                        @csrf

                    <div class="login-form" id="formulario">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" placeholder="Ingrese Usuario" name="user"
                              name="user" required autocomplete="user"/>
                        </div>
                        <div class="form-group">
                            
                            <input type="password" class="form-control" id="inputPw" placeholder="Ingrese Contraseña" 
                             name="password" required autocomplete="current-password"/>
                        </div>
                              
                            <button href="{{ url ('inicio')}}" type="submit">Ingresar</button>
                            <p class="mensaje">No estas registrado? <a href="#">Crea una cuenta</a></p>
                    </div>
                    </form>


                    <form role="form" method="POST" action="{{ url ('sesion/registro/') }}" >
                        @csrf

                    <div class="register-form" id="formulario">

                        <div class="form-group">
                            <input type="text" class="form-control" id="inputName" placeholder="Ingrese su Nombre" 
                            name="name" required-autocomplete="name"/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="inputLastname" placeholder="Ingrese su Apellido" 
                            name="lastname" required-autocomplete="lastname"/>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="inputUser" placeholder="Ingrese Usuario" 
                            @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user" autofocus/>
                        </div>
                               
                                
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPw" placeholder="Ingrese Contraseña" name="password"/>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Ingrese Email"
                             @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                        </div>
                            
                            

                        <div class="form-group">
                            <input type="date" class="form-control" id="inputDate" placeholder="Ingrese Fecha de Nacimiento" 
                            @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date"/>
                        </div>
                           

                        <div class="form-group">
                            <input type="tel" class="form-control" id="inputTel" placeholder="Ingrese Telefono de Contacto" 
                            @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel"/>
                        </div>

                        <button href="#" type="submit">Crear</button>
                        <p class="mensaje2">Ya estas registrado? <a href="#">Inicia Sesion</a></p>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


