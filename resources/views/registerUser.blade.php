@extends('templates.header')

@section('content')
       <!-- formulario de registro -->
        <div class="contenedor-cuadro">
        	<div class="contenedor-formulario">
			    <p style="text-align: center;"><img src="{{URL::asset('img/logo.png')}}" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
        	    <form onsubmit="return valida_envia()" action="" method="post" enctype="multipart/form-data" id="formulario" name="fvalida" >
                    <p>los campos con (*) son Obligatorios</p>
					{{ csrf_field() }}
                    <div class="campos-vacios">
                        <div class="nombre">
                            <label>Nombres (*)</label>
                            <input type="text" class="form-control" id="nombre" name="Nombre" class="form-control" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required />
                        </div>
                        <div class="apellido">
                            <label>Apellidos (*)</label>
                            <input type="text" class="form-control" id="apellido" name="Apellido"class="form-control"  placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" maxlength="30" required value>
                        </div>		
                    </div>
                        
                    <label>Documento (*)</label>
                    <input type="Number" class="form-control" name="Documento" class="form-control" placeholder="Ingresa tu numero de Documento" pattern="[0-9]+" minlength="10" maxlength="10" required>
                    <label>Numero de celular (*)</label>
                    <input type="nUMBER" class="form-control" name="Celular" class="form-control" placeholder="Ingresa tu Numero de Celular" pattern="[0-9]+" minlength="11" maxlength="11" required>
                    <label>Fecha nacimiento</label>
                    <input type="date" name="Nacimiento" style="width:38%;color: #515A5A;" placeholder="Fecha de nacimiento" required class="form-control" min = "1940-01-01" max = "2004-01-01">

                    <label>Genero</label><br>
                    <select name="Genero" style="width:38%; color: #515A5A;">
                        <option value="Hombre">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="N.Especificado">No Especificado (Otro)</option>
                    </select>
                    <br>

                    <div style="display: inline-block;text-align: left;">
                        <div style="text-align: left;">País Nacimiento</div>
                            <img src="" id="flag" width="40px" style="vertical-align: top;">	
                            <select id="paises" name="Pais" onchange="actualizarEstados();actualizarCiudades();actualizarBandera()"></select>
                    </div>
                    <div style="display: inline-block;text-align: left;">
                        Estado
                        <br>
                        <select id="estados" name="Estado" onchange="actualizarCiudades()"></select>
                    </div>
                    <div style="display: inline-block;text-align: left;">
                        Ciudad
                        <br>
                        <select id="ciudades" name="Ciudad"></select>
                    </div>
                    <br>
                    <label>Direccion (*)</label><br>
                    <input type="text" name="Direccion" placeholder="Ingresa tu Direccion" class="form-control" minlength="7" maxlength="30" required>
                    <label>Email (*)</label><br>
                    <input type="email" class="form-control" name="Correo" class="form-control" placeholder="Ingresa tu Correo" minlength="12" maxlength="30" required>
                    <label>Usuario (*)</label><br>
                    <input type="text" class="form-control" name="Usuario" class="form-control" placeholder="Crea un Usuario"  minlength="3" maxlength="30" required>
                    <label>Contraseña (*)</label><br>
                    <input type="password" name="Contraseña" placeholder="Ingresa una Contraseña" id="cr1" class="form-control" maxlength="30" pattern=".{8,}" required>
                    <spam style="color: #9b9b9b; size: 5px; text-align: center;"> "La contraseña debe contener 8 caracteres"</spam><br> 
                    <label>Confirmar Contraseña (*)</label><br>
                    <input type="password" name="confirmPass" placeholder="Confirma la Contraseña" id="cr2"  class="form-control" maxlength="30" pattern=".{8,}" >
                    <div class="file-select" id="src-file1" >        
                        <input type="file" name="foto" aria-label="Archivo">    
                    </div>
                    <div class="botonRecuperar">        
                                <button type="button" id= "registrar" class="botonCorto">Registrarse</button>
                    </div>
                </form>
			</div>
		</div>

        <script>
	        actualizarPaises()
	        actualizarBandera()
	        actualizarEstados()
	        actualizarCiudades()
			verificar()
			function verificar() {
				if ( $("#nombre-input").val().trim().length > 0 ) {
				alert("El campo contiene un string válido que no son espacios");
				}
				else {
				alert("El campo contiene espacios y está vacío");
				}
			}

	        function actualizarPaises() {
	             document.getElementById("paises").innerHTML = $optionPaises()
	        }

	        function actualizarBandera() {
	             let flag = document.getElementById("flag");
	             let pais = document.getElementById("paises").value;
	             flag.src = $regiones[pais].flagSVG_4x3
	        }

	        function actualizarEstados() {
	             let pais = document.getElementById("paises").value
	             document.getElementById("estados").innerHTML = $optionEstados(pais)
	        }

	        function actualizarCiudades() {
	             let pais = document.getElementById("paises").value
	             let estado = document.getElementById("estados").value
	             document.getElementById("ciudades").innerHTML = $optionCiudades(pais, estado)
	        }
		</script>
        @endsection