<?php

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<style>
.label{
    float: left; 
    margin-left: 10%;
    margin-bottom: -70px;
    font-family: Verdana;
}

.error{
    display:none;
	width: 260px;
	background-color: rgba(255, 0, 0,.3);
	color: red;
	font-weight: bold;
	border: 2px red solid;
    margin-left: 17.5%;
    text-align: center;
    padding: 3px;
    border-top:none;
    border-radius:0 0 5px 5px;
    margin-bottom: 0px;
}

.titulos{
    color:white;
    font-size: 50px;
}

.no a{
    color: white;
}

</style>
<header >
        <nav>
            <a href=""><img class="logo" src="img/logo2.png"></a></li>
        </nav>
</header> 
<br>
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
?>

<div class="no">
<center>
<?php
 // Validamos si hay resultados
 if(!empty($result) AND mysqli_num_rows($result) > 0)
 {
  	echo " <p class='titulos'>Ya existe el nombre de usuario que intenta registrar</p>";
?>
        
        <br>

    <a href="?c=Usuario&a=Crud2">Volver Intentar</a>

</div> 
  
    <?php
 }
 else
 {
$sql2 = "INSERT INTO Usuario(NombreUsuario, ClaveUsuario, EstadoUsuario, IdRol)VALUES ('$NombreUsuario', '$ClaveUsuario', '$EstadoUsuario','$IdRol')";
if (mysqli_query($conn, $sql2)) {
	echo "Usuario Creado Exitosamente.";
} else {
	echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

?>
</center>

<div  class="contenedor">
<h1>
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Datos Personales'; ?>
</h1>
    <section class="form-register"> 
    <form onsubmit="return validar()" id="frm-cliente" name="Pru" autocomplete="off" action="?c=Cliente&a=Guardar1" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />

    <?php foreach ($link->query('SELECT IdUsuario from Usuario order by IdUsuario DESC LIMIT 1;') as $row){ ?> 
    <div class="pagina">
        <div class="nombr">
        <input type="hidden" type="number" name="IdUsuario" value="<?php echo $row['IdUsuario'] ?>" class="input" />
        </div>   
    <?php
	    }
    ?>
    <div class="nombre">
        <label class="label">Nombre:</label>
        <input id="nombre" type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="input" placeholder="Ingrese su nombre"  maxlength="255" />
        <br>
        <span class="error" id="errorNombre"></span>

    </div>
    
    <div class="nombre">
        <label class="label">Apellido:</label>
        <input id="apellido" type="text" name="ApellidoCliente" value="<?php echo $alm->ApellidoCliente; ?>" class="input" placeholder="Ingrese Apellido"  maxlength="255"  />
        <br>
        <span class="error" id="errorApellido"></span>
    </div>

    <div class="nombre">
        <label class="label">Direccion:</label>
        <input id="direccion" type="text" name="DireccionCliente" value="<?php echo $alm->DireccionCliente; ?>" class="input" placeholder="Ingrese Direccion" maxlength="255" />
        <br>
        <span class="error" id="errorDireccion"></span>
    </div>
    
    <div class="nombre">
        <label class="label">Telefono:</label>
        <input id="telefono" type="number" name="TelefonoCliente" value="<?php echo $alm->TelefonoCliente; ?>" class="input" placeholder="Ingrese Telefono "  />
        <br>
        <span class="error" id="errorTelefono"></span>
    </div>

    <div class="nombre">
        <label class="label">Documento:</label>
        <input id="documento" type="number" name="NumDocCliente" value="<?php echo $alm->NumDocCliente; ?>" class="input" placeholder="Ingrese Numero de documento" />
        <br>
        <span class="error" id="errorDoc"></span>
    </div>

    <div class="nombre">
        <label class="label">Correo:</label>
        <input id="correo" type="text" name="CorreoCliente" value="<?php echo $alm->CorreoCliente; ?>" class="input" placeholder="Ingrese Correo" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe se valor@valor.valor"/>
        <br>
        <span class="error" id="errorCorreo"></span>
    </div>

    <hr/>
    <div class="nombre">
        <button id="button" onmouseover="validar()">Guardar</button>
    </div>
    </div>

<script type="text/javascript">

            function validar(){
  //Verificar si el campo nombre es nulo
  valor = document.getElementById("nombre").value;
    if( valor == null || valor.length == 0) {
        document.getElementById("errorNombre").innerHTML="Por Favor digite algo";
        document.getElementById("errorNombre").style.display='block';
    return false;
    }
        document.getElementById("errorNombre").innerHTML="";
        document.getElementById("errorNombre").style.display='none';


    //Verificar si el campo nombre es menor a 5
    valor = document.getElementById("nombre").value;
    if( valor < 5 || valor.length < 5) {
        document.getElementById("errorNombre").innerHTML="Minimo 5 caracteres, tienes " +valor.length;
        document.getElementById("errorNombre").style.display='block';
    return false;
    }
        document.getElementById("errorNombre").innerHTML="";
        document.getElementById("errorNombre").style.display='none';
    

    //Apellido
    valor = document.getElementById("apellido").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorApellido").innerHTML="Por Favor digite algo";
        document.getElementById("errorApellido").style.display='block';
    return false;
    }
        document.getElementById("errorApellido").innerHTML="";
        document.getElementById("errorApellido").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("apellido").value;
    if( valor < 3 || valor.length < 3) {
        document.getElementById("errorApellido").innerHTML="Minimo 3 caracteres, tienes " +valor.length;
        document.getElementById("errorApellido").style.display='block';
    return false;
    }
        document.getElementById("errorApellido").innerHTML="";
        document.getElementById("errorApellido").style.display='none';

          //Direccion
    valor = document.getElementById("direccion").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorDireccion").innerHTML="Por Favor digite algo";
        document.getElementById("errorDireccion").style.display='block';
    return false;
    }
        document.getElementById("errorDireccion").innerHTML="";
        document.getElementById("errorDireccion").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("direccion").value;
    if( valor < 5 || valor.length < 5) {
        document.getElementById("errorDireccion").innerHTML="Minimo 5 caracteres, tienes " +valor.length;
        document.getElementById("errorDireccion").style.display='block';
    return false;
    }
        document.getElementById("errorDireccion").innerHTML="";
        document.getElementById("errorDireccion").style.display='none';  
  

        //Telefono
    valor = document.getElementById("telefono").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorTelefono").innerHTML="Por Favor digite algo";
        document.getElementById("errorTelefono").style.display='block';
    return false;
    }
        document.getElementById("errorTelefono").innerHTML="";
        document.getElementById("errorTelefono").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("telefono").value;
    if( valor < 10 || valor.length < 10) {
        document.getElementById("errorTelefono").innerHTML="Debe tener 10 caracteres, tienes " +valor.length;
        document.getElementById("errorTelefono").style.display='block';
    return false;
    }
        document.getElementById("errorTelefono").innerHTML="";
        document.getElementById("errorTelefono").style.display='none';  

    //Docuemento
    valor = document.getElementById("documento").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorDoc").innerHTML="Por Favor digite algo";
        document.getElementById("errorDoc").style.display='block';
    return false;
    }
        document.getElementById("errorDoc").innerHTML="";
        document.getElementById("errorDoc").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("documento").value;
    if( valor < 5 || valor.length < 5) {
        document.getElementById("errorDoc").innerHTML="Debe tener 5 caracteres, tienes " +valor.length;
        document.getElementById("errorDoc").style.display='block';
    return false;
    }
        document.getElementById("errorDoc").innerHTML="";
        document.getElementById("errorDoc").style.display='none';  


        //Docuemento
        valor = document.getElementById("correo").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("errorCorreo").innerHTML="Por Favor digite algo";
        document.getElementById("errorCorreo").style.display='block';
    return false;
    }
        document.getElementById("errorCorreo").innerHTML="";
        document.getElementById("errorCorreo").style.display='none';

    return true;
                
            }
            </script>
</form>
<?php
}
$conn->close();

}
?>
    </section>
</div>
