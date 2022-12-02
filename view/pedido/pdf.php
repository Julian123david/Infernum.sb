<?php

class Conexion {
    var $ruta;
    var $usuario;
    var $contrasena;
    var $baseDatos;

    function Conexion(){
        $this->ruta = "localhost";
        $this->usuario ="root";
        $this->contrasena="";
        $this->baseDatos="proyecto";
    }
    function conectarse(){
        $enlace = mysqli_connect($this->ruta, $this->usuario, $this->contrasena, $this->baseDatos);
        if ($enlace) {
            //echo"conexion exitosa";
        } else {
            die('Error de conexion('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
    return($enlace);   
    }
}

?>
<?php
header('Content-type:application/pdf');
header('Content-Disposition: attachement; filename=intento.pdf');

$conn=new Conexion ();
$link= $conn-> conectarse();

$query="SELECT * FROM subtotal";
$result=mysqli_query($link, $query);

?>

<table>
    <tr>
        <th>SubTotal</th>
        <th>IdPedido</th>
    </tr>
<?php
  while ($row=mysqli_fetch_assoc($result)) {
     ?>

     <tr>
         <td><?php echo $row ['subtotal'];?></td>
         <td><?php echo $row ['idPedido'];?></td>
     </tr>
     <?php

  }
?>
    <tr>
        <td>data</td>
    </tr>
</table>