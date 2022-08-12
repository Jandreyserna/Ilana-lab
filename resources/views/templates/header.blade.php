
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- registro bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet"/>
    <!-- hoja de estilos 1 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styleInitSession.css') }}" />
    <title>Ilana</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="{{URL::asset('img/logo.png')}}" alt="" width="60" height="60" class="rounded img-fluid d-inline-block align-text-top"/>
                    </a>
                </div>
                <div class="navbar-nav mr-auto">
                    <a class="navbar-brand">Ilana-Lab</a>
                </div>
                <div class="navbar-nav mr-auto">
                    @if(Request::path() === 'iniciarsesion' )
                        <a href="/" style="color: #FFFFFF;">volver <i class="bi bi-box-arrow-right"></i></a>
                    @elseif( Request::path() === 'registrarse')
                        <a href="iniciarsesion" style="color: #FFFFFF;">volver <i class="bi bi-box-arrow-right"></i></a>
                    @elseif (Request::path() === 'home')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSalir">Cerrar Sesión <i class="bi bi-box-arrow-right"></i></button>
                        <!-- Modal Cerrar Sesión-->
                        <div class="modal fade" id="modalSalir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" >
                                <div class="modal-content ">
                                    <div class="modal-header bg-primary" >
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #FFFFFF; text-align: center;">Advertencia!!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <h4>¿Está seguro de salir?</h4>  
                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Si</button>
                                        </a>
                                        <a href="home"><button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <ul>
                            <li>
                                <a href="iniciarsesion" style="color: #ffffff">
                                    Iniciar Sesion <i class="bi bi-arrow-return-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="registrarse" style="color: #ffffff">
                                    Registrate <i class="bi bi-arrow-return-right"></i>
                                </a>
                            </li>
                        </ul>
                    @endif
                    
                </div>
            </div>
        </nav>
    </header>
    @yield('content')   
    
</body>
<footer>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Paises,Departamentos y Ciudades -->
	<script src="https://jeff-aporta.github.io/main/00Libs/Sites/sites.min.js"></script>
    <!-- pooper js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- formulario.js -->
	<script src="js/forms.js"></script>
</footer>
</html>