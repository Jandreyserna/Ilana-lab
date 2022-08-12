<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct (){

    }

    public function insert(Request $request)
    {
        foreach ($_REQUEST as $var => $val) {
            $$var=$val;
        }
        /* print_r($_POST); */
        $resultado = DB::select("SELECT * FROM users WHERE Documento = '$Documento' OR Correo = '$Correo'");
    
        if (!empty($resultado)){
                return array('mensaje'=> 'este usuario ya fue registrado');
        }else{
            DB::table('users')->insert([
                'Nombre' => $_POST['Nombre'],          
                'Apellido' => $_POST['Apellido'],
                'Documento' => $_POST['Documento'],
                'Celular' => $_POST['Celular'],
                'Nacimiento' => $_POST['Nacimiento'],
                'Genero' => $_POST['Genero'],
                'Pais' => $_POST['Pais'] ,
                'Estado' =>  $_POST['Estado'] ,
                'Ciudad' => $_POST['Ciudad'],
                'Direccion' => $_POST['Direccion'],
                'Correo' => $_POST['Correo'],
                'Usuario' => $_POST['Usuario'],
                'Contraseña' => $_POST['Contraseña'],
            ]);
            return array('mensaje'=> 'Usuario ingresado exitosamente');
        }
    }
}
