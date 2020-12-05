<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$users = DB::table('calificaciones')
->leftJoin('alumno', 'calificaciones.idalumno', '=', 'alumnos.idalumno')
->get();
$promedio = DB::table('calificaciones')->avg('calificacion');
$promedio = number_format($promedio, 1);
echo <<<_TABLE
<table class="table">
<thead>
    <tr>
      <th> #ID </th>
      <th> Calificacion </th>
      <th> Alumno </ht>
      <th colspan='2'> Operaciones </th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Promedio: </th>
        <th> $promedio </th>
    </tr>
</tfoot>
<tbody>
_TABLE;
foreach ($users as $fila) {
    echo <<<_ROW
    <tr>
        <th>$fila->idcalificacion </th>
        <th>{$fila->nombre} {$fila->primer_apellido} {$fila->segundo_apellido} </th>
        <td><center>$fila->calificacion </center></td>
        <td><a class='button' href='delete.php?id={$fila->idcalificacion}'>ELIMINAR</a></td>
        <td>
            <form action="update.php" method="post">
                <input id="idcalificacion" type="text" name="idcalificacion" value="{$fila->idcalificacion}" hidden>
                <input id="calificacion" type="text" name="calificacion" size="3">
                <input class="button" type="submit" value="Actualizar">
            </form>
        </td>
    </tr>
    _ROW;
}

echo "</tbody></table>
<a class='button' href='incio.html'>Regresar</a>";
