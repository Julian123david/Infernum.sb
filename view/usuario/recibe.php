<?php
require('config.php');
$tipo       = $_FILES['dataUsuario']['type'];
$tamanio    = $_FILES['dataUsuario']['size'];
$archivotmp = $_FILES['dataUsuario']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $NombreUsuario               = !empty($datos[0])  ? ($datos[0]) : '';
		$ClaveUsuario               = !empty($datos[1])  ? ($datos[1]) : '';
        $EstadoUsuario              = !empty($datos[2])  ? ($datos[2]) : '';
        $IdRol           = !empty($datos[3])  ? ($datos[3]) : '';

       
    $insertar = "INSERT INTO Usuario( 
            NombreUsuario,
			ClaveUsuario,
            EstadoUsuario,
            IdRol
        ) VALUES(
            '$NombreUsuario',
			'$ClaveUsuario',
            '$EstadoUsuario',
            '$IdRol'
        )";
        mysqli_query($con, $insertar);
    }

      echo '<div>'. $i. "). " .$linea.'</div>';
    $i++;
}


  echo '<p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p>';

?>

<a href="IndexUsuario.php">Atras</a>