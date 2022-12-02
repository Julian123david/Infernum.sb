<link rel="stylesheet" href="../view/css/styles.css">
<style>
.label{
    float: left; 
    margin-left: 10%;
    margin-bottom: -70px;
    font-family: Verdana;
}

.error{
    display:none;
	width: 300px;
	color: red;
	font-weight: bold;
    text-align: center;
    padding: 3px;
    border-top:none;
    border-radius:0 0 5px 5px;
    margin-bottom: 0px;
}


</style>


<header style="flex: inline;">
        <nav class="navegacion">
            <a href="http://localhost/Infernum.sb/view/login.php"><img class="logo" src="img/logo2.png"></a>
        </nav>
    </header>

<div class="Contenedor">
    <h1>
        <?php echo $alm->IdUsuario != null ? $alm->NombreUsuario : 'Registrar'; ?>
    </h1>
<section class="form-register">
<form onsubmit="return comprobarClave()"  action="?c=Cliente&a=Crud2" autocomplete="off" method="post"  name="Pru">
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="pagina">
        <div class="nombre">
            <div class="label">Nombre:</div>
            <input id="nombre" type="text" name="NombreUsuario" value="<?php echo $alm->NombreUsuario; ?>" class="input" placeholder="Nombre Usuario"   maxlength="35"/> 
            <br><br>
            <span class="error" id="errorNombre"></span>
        </div>
    <div class="nombre">
        <div class="label">Contraseña:</div>
        <input id="password" type="password" name="ClaveUsuario" value="<?php echo $alm->ClaveUsuario; ?>" class="input" placeholder="Clave Usuario"  maxlength="15" />
    </div>

    <div class="nombre">
        <label class="label">Confirmar Contraseña:</label>
        <input id="password1" type="password" name="ClaveUsuario1" value="" class="input" placeholder="Clave Usuario"  minlength="5" maxlength="15" /><br>
        <span class="error" id="erroremail"></span>
    </div>
    <div class="nombr">
    <input type="hidden" type="text" name="IdRol" value="3" class="input" /> 
    </div>  
    <div class="nombr" hidden>
        <label>Estado:</label>
        <select name="EstadoUsuario" class="input">
            <option <?php echo $alm->EstadoUsuario == '1' ? 'selected' : ''; ?> value="1" class="input">1</option>
        </select>
    </div> 
    <hr/>
    <div class="nombre">
        <button name="boton" id="button" onmouseover="comprobarClave()">Guardar</button>
        <input type="hidden" value="1" name="opcion"><br><br>    
    </div>
    </div>

    <td>
            </td>
            <script>
function comprobarClave(){
    
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
    valor1 = document.getElementById("password1").value;

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
</section>
</div>
