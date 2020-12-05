<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('nombreusuario', $_POST['usuario'])->first();

$mensaje='';
if ($user->password == $_POST['password']) {
    $mensaje = "<h1> ¡Bienvenido: {$user->nombreperfil} {$user->nombreusuario}!</h1>
    <br><a href='inicio.php?idusuario={$user->idusuario}'>Entrar al sistema escolar </a>";
} else {
    $mensaje = "<h1>Usuario y contraseña incorrectos, vuelve a intentarlo</h1>
    <br><a href='index.php'>Regresar</a>";
}

echo $mensaje;
