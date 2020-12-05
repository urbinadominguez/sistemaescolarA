<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

DB::table('calificaciones')->where('idcalificacion', $_GET['id'])->delete();

echo "Se elimino la calificacion con el id: {$_GET['id']}
<a class='button' href='consultar.php'>Regresar</a>";
