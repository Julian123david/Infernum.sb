<?php
if(isset($_POST["boton"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 


$NombreUsuario=$_POST['NombreUsuario'];
$ClaveUsuario=$_POST['ClaveUsuario'];
$EstadoUsuario=$_POST['EstadoUsuario'];
$IdRol=$_POST['IdRol'];
// Realizamos la consulta para saber si coincide con uno de esos criterios
$sql = "SELECT * from Usuario where NombreUsuario='$NombreUsuario'";
$result = mysqli_query($conn, $sql);

 // Validamos si hay resultados
 if(!empty($result) AND mysqli_num_rows($result) > 0)
 {
  	echo " <p class='titulos'>Ya existe el nombre de usuario que intenta registrar</p>";

}
else
{
$sql2 = "INSERT INTO Usuario(NombreUsuario, ClaveUsuario, EstadoUsuario, IdRol)VALUES ('$NombreUsuario', '$ClaveUsuario', '$EstadoUsuario','$IdRol')";
if (mysqli_query($conn, $sql2)) {
   echo "Usuario Creado Exitosamente.";
} else {
   echo "Error: " . $sql2 . "" . mysqli_error($conn);
}
}
$conn->close();

}
?>