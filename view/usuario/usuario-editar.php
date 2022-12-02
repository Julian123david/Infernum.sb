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
    margin-left: 15%;
    margin-bottom: -70px;
    font-family: Verdana;
}
.error{
    margin-left: 17%;
    margin-top: -20px;
    float: left;
    background-color: rgba(255, 0, 0, 0.1);
    font-family: Verdana;
    width: 265px;
    text-align: center;

}
.error5{
    margin-left: 17%;
    margin-top: -56 px;
    float: left;
    background-color: rgba(255, 0, 0, 0.1);
    font-family: Verdana;
    width: 265px;
    text-align: center;

}
.warning{
    width: 300px;
    text-align: center;
    margin: auto;
    color: #215B99;
    padding-top: 20px;
    font-size: 150%;
}
input:invalid { 
    border-bottom-color: red; 
} 

input, input:valid { 
    border-bottom-color: green; 
}
</style>
<script src="js/alertas.js"></script>

<h1 class="Titulo">
    <?php echo $alm->IdUsuario != null ? $alm->NombreUsuario : 'Nuevo Usuario'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexUsuario.php">Usuarios Registrados</a></li>

</ol>

<form id="frm-usuario" action="?c=Usuario&a=Guardar" autocomplete="off" method="post" enctype="multipart/form-data" name="Pru">
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="nombre">
        <label class="label">Nombre:</label>
        <input type="text" name="NombreUsuario" value="<?php echo $alm->NombreUsuario; ?>" class="input" placeholder="Nombre Usuario" required  minlength="5" maxlength="35"/> 
        <br>
        <label id="Error1" class="error" style="color:red"></label>
        <br>
        <label id="Error3" class="error" style="color:red"></label>
    </div>
    <br><br>
    <div class="nombre">
        <label class="label">Contraseña:</label>
        <input type="password" name="ClaveUsuario" value="<?php echo $alm->ClaveUsuario; ?>" class="input" placeholder="Clave Usuario" required="required" minlength="6" maxlength="15" /><br>
        <label id="Error2" class="error" style="color:red"></label><br>
        <label id="Error4" class="error" style="color:red"></label><br>
        <label id="Error5" class="error5" style="color:red"></label><br>
    </div>



    <div class="nombre">
        <label>IdRol:</label>
        <select name="IdRol" class="input">
            <option <?php echo $alm->IdRol == 1 ? 'selected' : ''; ?> value="1">Gerente</option>
            <option <?php echo $alm->IdRol == 2 ? 'selected' : ''; ?> value="2">Vendedor</option>
            <option <?php echo $alm->IdRol == 3 ? 'selected' : ''; ?> value="3">Cliente</option>
        </select>
    </div>  
    
    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button" onmouseover="validar()" onclick="javascript:return  confirm('¿Seguro de editar este usuario?');">Guardar  </button>
        <input type="hidden" value="1" name="opcion"><br><br>
        
    </div>
    
    </center>

    <td>
            </td>
<script type="text/javascript">


            const expresiones = {
                usuario: /^[a-zA-Z0-9\_\-]{4,16} /
            }

            function validar(){
                var NombreUsuario = document.Pru.NombreUsuario.value;
                var ClaveUsuario = document.Pru.ClaveUsuario.value;



                if(NombreUsuario === ""){
                    document.getElementById("Error1").innerText="Campo vacio";
                } else {
                    document.getElementById("Error1").innerText="";
                }
                if(ClaveUsuario === ""){
                    document.getElementById("Error2").innerText="Campo vacio";
                } else {
                    document.getElementById("Error2").innerText="";
                }
                if(NombreUsuario.length < 5 ){
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
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>

