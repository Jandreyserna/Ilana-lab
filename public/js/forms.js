$(document).ready(function(){
    
    actualizarPaises();
    actualizarBandera();
    actualizarEstados();
    actualizarCiudades();
    function actualizarPaises() {
        document.getElementById("paises").innerHTML = $optionPaises()
    }
    $('select').on("change", '#paises', function(){
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
    });
	
	

    $('.campos-vacios').on("change", '#nombre', function(){
        var name = $('#nombre').val().trim();
        var apellido = $('#apellido').val();
        name = name.split(/\s+/).join(' ');
        var html = '<div class="nombre">'+       
                        '<label>Nombres</label>'+
                        '<input type="text" class="form-control" id="nombre" name="nombre" class="form-control"'+
                        'value = "'+name+'" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" '+
                        ' minlength="3" maxlength="30" required />'+
                    '</div>'+
                    '<div class="apellido">'+
                        '<label>Apellidos</label>'+
                        '<input type="text" class="form-control" id="apellido" name="apellido"class="form-control"'+
                        'value = "'+apellido+'" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" '+
                        ' maxlength="30" required value>'+
                    '</div>';
        $('.nombre').remove();
        $('.apellido').remove();

        console.log('campos vacios')
        $('.campos-vacios').append(html);
        
    });

    $('.campos-vacios').on("change", '#apellido', function(){
        var apellido = $('#apellido').val().trim();
        var name = $('#nombre').val();
        apellido = apellido.split(/\s+/).join(' ');
        var html = '<div class="nombre">'+       
                        '<label>Nombres</label>'+
                        '<input type="text" class="form-control" id="nombre" name="nombre" class="form-control"'+
                        'value = "'+name+'" placeholder="Ingresa tu Nombre" pattern="[A-Za-z-Zñóéíáú ]+" '+
                        ' minlength="3" maxlength="30" required />'+
                    '</div>'+
                    '<div class="apellido">'+
                        '<label>Apellidos</label>'+
                        '<input type="text" class="form-control" id="apellido" name="apellido"class="form-control"'+
                        'value = "'+apellido+'" placeholder="Ingresa tu Apellido" pattern="[A-Za-z-Zñóéíáú ]+" minlength="3" '+
                        ' maxlength="30" required value>'+
                    '</div>';
        $('.nombre').remove();
        $('.apellido').remove();

        console.log('campos vacios')
        $('.campos-vacios').append(html);
        
    });

    $('#registrar').click(function(){
        console.log('si');
        const datas = new FormData(document.getElementById('formulario'));
        console.log(datas);
        if (document.fvalida.Nombre.value.length==0){
                alert("Tiene que escribir su nombre")
                document.fvalida.Nombre.focus()
                return false
        }else if (document.fvalida.Apellido.value.length==0){
                alert("Tiene que escribir sus apellidos")
                document.fvalida.Apellido.focus()
                return false
        }else if (document.fvalida.Documento.value.length==0){
                alert("Falta por ingresar su documento")
                document.fvalida.Documento.focus()
                return false
        }else if (document.fvalida.Celular.value.length==0){
                alert("Debe ingresar su numero de celular")
                document.fvalida.Celular.focus()
                return false
        }else if (document.fvalida.Direccion.value.length==0){
                alert("Debe ingresar la direccion de su hogar")
                document.fvalida.Direccion.focus()
                return false
        }else if (document.fvalida.Correo.value.length==0){
                alert("Debe ingresar su correo electronico")
                document.fvalida.Correo.focus()
                return false
        }else if (document.fvalida.Usuario.value.length==0){
                alert("Falta por ingresar su usuario")
                document.fvalida.Usuario.focus()
                return false
        }else if (document.fvalida.Contraseña.value.length==0){
                alert("Debe ingresar una contraseña")
                document.fvalida.Contraseña.focus()
                return false
        }else if (document.fvalida.confirmPass.value.length==0){
                alert("Debe confirmar la contraseña")
                document.fvalida.confirmPass.focus()
                return false
        }else {
            // Ejemplo implementando el metodo POST:
            async function postData(url = '', datas) {
                // Opciones por defecto estan marcadas con un *
                const response = await fetch(url, {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    mode: 'cors', // no-cors, *cors, same-origin
                    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: 'same-origin', // include, *same-origin, omit
                    redirect: 'follow', // manual, *follow, error
                    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                    body: datas // body data type must match "Content-Type" header
                });
                return response.json(); // parses JSON response into native JavaScript objects
            }
        
            postData('http://127.0.0.1:8000/api/register', datas)
                .then(data => {
                    const array = [];

                    for(var i in data) {
                        array.push([i,data[i]]);
                    }
                    console.log(array);
                    if(array[2] == 'Usuario ingresado exitosamente'){
                        alert('Usuario ingresado exitosamente');
                        window.location.href="/";
                    }else{
                        alert('Error al Registrar usuario');
                        window.location.href="/";
                    }
                });
        }
                
    });  
});