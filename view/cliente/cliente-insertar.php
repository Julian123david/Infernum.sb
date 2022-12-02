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
    margin-left: 10%;
    margin-top: -20px;
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

<h1 class="Titulo">
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?>
</h1>

<div  class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexCliente.php">Clientes Registrados</a></li>

</ol>

<form id="frm-cliente" autocomplete="off" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />

     <div class="nombre">
        <label class="label">IdUsuario:</label>
        <input type="number" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" class="input" placeholder="Ingrese " required="IdUsuario" />
    </div>   
    
    <div class="nombre">
        <label class="label">Nombre:</label>
        <input type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="input" placeholder="Ingrese su nombre" required="required" minlength="5" maxlength="255" />
    </div>
    
    <div class="nombre">
        <label class="label">Apellido:</label>
        <input type="text" name="ApellidoCliente" value="<?php echo $alm->ApellidoCliente; ?>" class="input" placeholder="Ingrese Apellido" required="required" minlength="5" maxlength="255"  />
    </div>

    <div class="nombre">
        <label class="label">Direccion:</label>
        <input type="text" name="DireccionCliente" value="<?php echo $alm->DireccionCliente; ?>" class="input" placeholder="Ingrese Direccion" required="required" minlength="5" maxlength="255" />
    </div>
    
    <div class="nombre">
        <label class="label">Telefono:</label>
        <input type="number" name="TelefonoCliente" value="<?php echo $alm->TelefonoCliente; ?>" class="input" placeholder="Ingrese Telefono " required="required" />
    </div>

    <div class="nombre">
        <label class="label">Documento:</label>
        <input type="number" name="NumDocCliente" value="<?php echo $alm->NumDocCliente; ?>" class="input" placeholder="Ingrese Numero de documento" required="required" minlength="3"/>
    </div>

    <div class="nombre">
        <label class="label">Correo:</label>
        <input type="text" name="CorreoCliente" value="<?php echo $alm->CorreoCliente; ?>" class="input" placeholder="Ingrese Correo" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="El correo debe se valor@valor.valor"/>
    </div>



    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button" onmouseover="validar()">Guardar</button>
    </div>
    </center>
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
                if(NombreUsuario.length < 6 ){
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
