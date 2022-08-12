<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('init');
});

Route::get('/iniciarsesion', function () { 
    return view('initSession');
});


Route::get('/registrarse', function () { 
    return view('registerUser');
});

Route::post('/login', function (){
    session_start();
    $email=$_POST['Correo'];
	$pass=$_POST['pass'];
    $consulta_resultante = DB::select("SELECT * FROM users WHERE Correo='$email' AND Contraseña='$pass'");
    if(!empty($consulta_resultante)){
?>
                <script>
                    window.location.href="/home";
                </script>
<?php
	}else{
		echo '<script language="javascript">alert("Error de autentificacion");
		window.location.href="/"</script>';
	}
    die();
});

Route::get('/home', function () {
    return view('user');
});