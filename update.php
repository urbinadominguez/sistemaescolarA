<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

DB::table('calificaciones')
->where('idcalificacion', $_POST['idcalificacion'])
->update(['calificacion' => $_POST['calificacion']]);

echo "Se actualizó la calificación con el id: {$_POST['idcalificacion']}
<a class='button' href='consultar.php'>Regresar</a>";
