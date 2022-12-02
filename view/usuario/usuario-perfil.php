<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 3){
        header('location: login.php');
    }
}


$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>

<script type="text/javascript">
        function mostrarContrasena(){
                var tipo = document.getElementById("password");
                if(tipo.type == "password"){
                    tipo.type = "text";
                }else{
                    tipo.type = "password";
                }
            }
    </script>

    <style>
                .icon2 {
    bottom: 65px;
    left: 460px;
    width: 40px;
    height: 40px !important;
    cursor: pointer;
    filter: opacity(75%);
    position: relative;
}
.icon2:hover{
    filter: opacity(100%);
}

.icon2:focus{
    filter: opacity(100%);
}
.divIcon{
    display: grid;
    height: fit-content;
    margin-top: 10px;
    margin-left: 300px;

}
    </style>

<?php if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
}?>
<link rel="stylesheet" href="../view/nav/navGerente.css">
<link rel="stylesheet" type="text/css" href="css/perfil.css">


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

                </li>
            </ul>
        </nav>
    </header>


<h1 class="Titulo">
    <?php echo $alm->IdUsuario != null ? $alm->NombreUsuario : 'Nuevo Usuario'; ?>
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
<p>Por favor actualice su información si lo concidera necesario</p>
</div>
<br>

<form onsubmit="return comprobarClave()" id="frm-usuario" action="?c=Usuario&a=Guardar" autocomplete="off" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="nombre">
       Nombre:
        <input type="text" name="NombreUsuario" value="<?php echo $alm->NombreUsuario; ?>" class="input" placeholder="Nombre Usuario" readonly/> 
    </div>
  

    <div class="nombre">
        Contraseña Actual:
        <input id="password" type="password" name="" value="<?php echo $alm->ClaveUsuario; ?>" class="input" placeholder="Clave Usuario" readonly />
        <span id="imgContrasena" class="divIcon" data-activo=false><img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" onclick="mostrarContrasena()" class="icon2"></span>
    </div>

    <div class="nombre">
    Nueva Contraseña:
        <input id="password1" type="password" name="ClaveUsuario" value="" class="input" placeholder="Clave Usuario"  /><br> 
    </div>


    <div class="nombre">
    Confirmar Contraseña:
        <input id="password2" type="password" name="" value="" class="input" placeholder="Clave Usuario"  /><br> 
        <span class="error" id="erroremail"></span>

    </div>

<br><br>
    <div class="nombre" hidden>
        <label>IdRol:</label>
        <select name="IdRol" class="input">
            <option <?php echo $alm->IdRol == 1 ? 'selected' : ''; ?> value="1">Gerente</option>
            <option <?php echo $alm->IdRol == 2 ? 'selected' : ''; ?> value="2">Vendedor</option>
            <option <?php echo $alm->IdRol == 3 ? 'selected' : ''; ?> value="3">Cliente</option>
        </select>
    </div>  
    <div class="nombr" hidden>
        <label>Estado:</label>
        <select name="EstadoUsuario" class="input">
            <option <?php echo $alm->EstadoUsuario == '1' ? 'selected' : ''; ?> value="1" class="input">1</option>
        </select>
    </div> 
    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button" onmouseover="comprobarClave()" onclick="javascript:return  confirm('¿Seguro de cambiar la contraseña?');" id="button">Guardar  </button>
        <input type="hidden" value="1" name="opcion"><br><br>
        
    </div>
    
    </center>

    <td>
            </td>
<script type="text/javascript">


            function comprobarClave(){
                valor = document.getElementById("password").value;
    if( valor == null || valor.length == 0 ) {
        document.getElementById("erroremail").innerHTML="Por Favor digite algo";
        document.getElementById("erroremail").style.display='block';
    return false;
    }
        document.getElementById("erroremail").innerHTML="";
        document.getElementById("erroremail").style.display='none';
    valor = document.getElementById("password").value;
    if( valor < 5 || valor.length < 5) {
        document.getElementById("erroremail").innerHTML="Minimo 5 caracteres, tienes"+valor.length;
        document.getElementById("erroremail").style.display='block';
    return false;
    }
        document.getElementById("erroremail").innerHTML="";
        document.getElementById("erroremail").style.display='none';

    valor = document.getElementById("password1").value;
    valor1 = document.getElementById("password2").value;

    if (valor == valor1) {
        document.getElementById("erroremail").innerHTML="Contraseñas iguales";
        document.getElementById("erroremail").style.display='block';
    return true;
    } 
    
    else {
        document.getElementById("erroremail").innerHTML="Contraseñas no iguales";
        document.getElementById("erroremail").style.display='block';
        return false;
    }

        document.getElementById("erroremail").innerHTML="";
        document.getElementById("erroremail").style.display='none';
               
        
    return true;
            }
            </script>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>
