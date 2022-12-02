<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: login.php');
    }
}

?>
<link rel="stylesheet" type="text/css" href="css/formulario.css">
<link rel="stylesheet" href="../view/nav/navGerente.css">
<header style="flex: inline;">
        <nav class="navegacion">
            
            <ul class="menu0">
                <li><a href=""><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
                <li><a class="logout" href="loginout.php">Cerrar Sesion</a></li>
            </ul>
            <ul class="menu1">
                <li><a href="gerente.php">Home</a></li>
                <li><a href="ProductosCategoria.php">Acciones</a>
                    <ul class="submenu">
                        <li><a href="indexPedido.php">Pedidos</a></li>
                        <li><a href="indexCategoria.php">Categorias</a></li>
                        <li><a href="indexProducto.php">Productos</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
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


</style>

<h1 class="Titulo">
    <?php echo $alm->IdUsuario != null ? $alm->NombreUsuario : 'Nuevo Usuario'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexUsuario.php">Usuarios Registrados</a></li>

</ol>
<section class="form-register">
<form onsubmit="return validacion()" id="frm-usuario" action="?c=Usuario&a=Guardar" autocomplete="off"  method="post" enctype="multipart/form-data" name="Pru">
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="nombre">
        <label class="label">Nombre:</label>
        <input id="nombre" type="text" name="NombreUsuario" value="<?php echo $alm->NombreUsuario; ?>" class="input" placeholder="Nombre Usuario" maxlength="35"/> 
        <br>
        <span class="error" id="errorNombre"></span>
    </div>
    <br><br>
    <div class="nombre">
        <label class="label">Contraseña:</label>
        <input id="password" type="password" name="ClaveUsuario" value="<?php echo $alm->ClaveUsuario; ?>" class="input" placeholder="Clave Usuario"  maxlength="15" />
        <br>
        <span class="error" id="erroremail"></span>
    </div>
<br>
    <div class="nombre" hidden>
        <label>Estado:</label>
        <select name="EstadoUsuario" class="input">
            <option <?php echo $alm->EstadoUsuario == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>
            <option <?php echo $alm->EstadoUsuario== 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" class="input">Inactivo</option>
        </select>
    </div> 

    <div class="nombre">
        <label>Rol:</label>
        <select name="IdRol" class="input">
            <option <?php echo $alm->IdRol == 1 ? 'selected' : ''; ?> value="1">Gerente</option>
            <option <?php echo $alm->IdRol == 2 ? 'selected' : ''; ?> value="2">Vendedor</option>
            <option <?php echo $alm->IdRol == 3 ? 'selected' : ''; ?> value="3">Cliente</option>
        </select>
    </div>  
    <br><br><br><br><br>
    <hr />
    <br><br>
    <center>
    <div class="botondiv">
        <button id="button" onmouseover="validar()">Guardar  </button>
        <input type="hidden" value="1" name="opcion"><br><br>
        
    </div>
    
    </center>

    <td>
            </td>

<script type="text/javascript">


        
            
function validacion() {
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
        document.getElementById("errorNombre").innerHTML="Minimo 5 caracteres, tienes"+valor.length;
        document.getElementById("errorNombre").style.display='block';
    return false;
    }
        document.getElementById("errorNombre").innerHTML="";
        document.getElementById("errorNombre").style.display='none';
    
    //Verificar si el campo password es nulo
    valor = document.getElementById("password").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("erroremail").innerHTML="Por Favor digite algo";
        document.getElementById("erroremail").style.display='block';
    return false;
    }
        document.getElementById("erroremail").innerHTML="";
        document.getElementById("erroremail").style.display='none';

     //Verificar si el campo password es menor a 5
     valor = document.getElementById("password").value;
    if( valor < 5 || valor.length < 5) {
        document.getElementById("erroremail").innerHTML="Minimo 5 caracteres, tienes"+valor.length;
        document.getElementById("erroremail").style.display='block';
    return false;
    }
        document.getElementById("erroremail").innerHTML="";
        document.getElementById("erroremail").style.display='none';
  
    // Si el script ha llegado a este punto, todas las condiciones
    // se han cumplido, por lo que se devuelve el valor true

    return true;
  }

            </script>
</form>
</div>
</section>
