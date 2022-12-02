<link rel="stylesheet" href="../view/nav/navGerente.css">
<link rel="stylesheet" type="text/css" href="css/perfil.css">
<?php 
session_start();
$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 
?>

<header style="flex: inline;">
        <nav class="navegacion">
            
            <ul class="menu0">
                <li><a href=""><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
                <li><a class="logout" href="loginout.php">Cerrar Sesion</a></li>
            </ul>
            <ul class="menu1">
                <li><a href="cliente.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <?php if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
}?>

<h1 class="Titulo">
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?>
</h1>
<div class="menu">
<?php foreach ($link->query("SELECT c.IdCliente, c.NombreCliente, c.IdUsuario, c.ApellidoCliente, c.DireccionCliente, c.TelefonoCliente, c.NumDocCliente, c.CorreoCliente from cliente c inner join usuario u on c.IdUsuario = u.IdUsuario where u.NombreUsuario = '$usuarioingresado' ") as $row){ ?> 
    <p><a href="http://localhost/Infernum.sb/view/IndexCliente.php?c=Cliente&a=CrudE&IdCliente=<?php echo $row['IdCliente']?>">Información Personal</a></p>
 
    <br>
    <p><a href="http://localhost/Infernum.sb/view/IndexUsuario.php?c=Usuario&a=CrudP&IdUsuario=<?php echo $row['IdUsuario']?>">Cambiar Contraseña</a></p>
   
    <br>
    <p>Mis pedidos</p>
    <?php
        }
    ?>
</div>

<div  class="Contenedor">
<br>
<div class="datos">
<p>SUS DATOS PERSONALES</p>
</div>
<div class="linea">
<hr>
 </div>
<br>
<div class="es">
<p>Por favor actualice su información personal si ésta ha cambiado</p>
</div>
<br>

<form id="frm-cliente" action="?c=Cliente&a=GuardarE" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />

     <div class="nombre">
        <input type="hidden" type="number" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" class="input" placeholder="Ingrese " required="IdUsuario" />
    </div>   
    
    <div class="nombre">
        Nombre:
        <input type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="input" placeholder="Ingrese su nombre" required="required" minlength="5" maxlength="255" />
        <br>
        <label id="Error1" class="error" style="color:red"></label>
        <label id="Error3" class="error" style="color:red"></label>
    </div>
    

    <div class="nombre">
        Apellido:
        <input type="text" name="ApellidoCliente" value="<?php echo $alm->ApellidoCliente; ?>" class="input" placeholder="Ingrese Apellido" required="required" minlength="5" maxlength="255"  />
    </div>

    <div class="nombre">
    Direccion:   
    <input type="text" name="DireccionCliente" value="<?php echo $alm->DireccionCliente; ?>" class="input" placeholder="Ingrese Direccion" required="required" minlength="5" maxlength="255" />
    </div>
    
    <div class="nombre">
    Telefono:   
    <input type="number" name="TelefonoCliente" value="<?php echo $alm->TelefonoCliente; ?>" class="input" placeholder="Ingrese Telefono " required="required" />
    </div>

    <div class="nombre">
        Documento:
        <input type="number" name="NumDocCliente" value="<?php echo $alm->NumDocCliente; ?>" class="input" placeholder="Ingrese Numero de documento" required="required" readonly />
    </div>

    <div class="nombre">
        Correo:
        <input type="text" name="CorreoCliente" value="<?php echo $alm->CorreoCliente; ?>" class="input" placeholder="Ingrese Correo" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe se valor@valor.valor"/>
    </div>

<br>

    <center>
    <div class="botondiv">
        <button onmouseover="validar()" onclick="javascript:return  confirm('¿Seguro de editar?');" id="button">Guardar</button>
    </div>
    </center>

<script type="text/javascript">


            const expresiones = {
                usuario: /^[a-zA-Z0-9\_\-]{4,16} /
            }

            function validar(){
                var NombreUsuario = document.Pru.NombreCliente.value;
                var ClaveUsuario = document.Pru.ClaveUsuario.value;



                if(NombreCliente === ""){
                    document.getElementById("Error1").innerText="Campo vacio";
                } else {
                    document.getElementById("Error1").innerText="";
                }
                if(ClaveUsuario === ""){
                    document.getElementById("Error2").innerText="Campo vacio";
                } else {
                    document.getElementById("Error2").innerText="";
                }
                if(NombreCliente.length < 6 ){
                    document.getElementById("Error3").innerText="Nombre demasiado corto";
                } else {
                    document.getElementById("Error3").innerText="";
                }
                if(ClaveUsuario.length < 6 ){
                    document.getElementById("Error4").innerText="Contarseña demasiada corta";
                } else {
                    document.getElementById("Error4").innerText="";
                }
                if (ClaveUsuario.length > 10) {
                    document.getElementById("Error5").innerText="Contarseña demasiada Larga";
                } else {
                    document.getElementById("Error5").innerText="";
                }   
                
            }
            </script>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>