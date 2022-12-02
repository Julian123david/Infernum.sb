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
    margin-left: 17%;
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
<style type="text/css">
    .label{
    float: left; 
    margin-left: 15%;
    margin-bottom: -70px;
    font-family: Verdana;
}
</style>
<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Pedido'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexPedido.php">Pedidos Registrados</a></li>

</ol>


<form id="frm-pedido" action="?c=Pedido&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

     <div class="nombre">
        <label>Empleado:</label>
        <select name="IdEmpleado" class="input">
            <option <?php echo $alm->IdEmpleado == '1' ? 'selected' : ''; ?> value="1">Andrey</option>
            <option <?php echo $alm->IdEmpleado == '2' ? 'selected' : ''; ?>  value="2">Jarrison</option>
        </select>
    </div>   
    
    <div class="nombre">
        <input type="text" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" class="input" placeholder="Ingrese IdCliente" required="required" />
    </div>
    
    <div class="nombre">
        <input type="text" name="IdCompaniaEnvio" value="<?php echo $alm->IdCompaniaEnvio; ?>" class="input" placeholder="Ingrese Compañia Envio" required="required" />
    </div>
<br>
    <div class="nombre">
        <label class="label">Fecha Envio:</label>
        <input type="date" name="FechaEnvio" value="<?php echo $alm->FechaPedido; ?>" class="input" placeholder="Ingrese " required="required"  max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 15 days"));?>" 
  min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 7 days"));?>"/>
    </div>
    
    <div class="nombre">
        <label class="label">Fecha Pedido:</label>
        <input type="date" name="FechaPedido" value="<?php echo date("Y-m-d");?>"  class="input" placeholder="Ingrese " required="required" />

    </div>

    <div class="nombre">
        <input type="text" name="DireccionEntrega" value="<?php echo $alm->DireccionEntrega; ?>" class="input" placeholder="Ingrese DireccionEntrega " required="required" minlength="10" maxlength="255"/>
    </div>

    <div class="nombre">
        <input type="text" name="TotalPedido" value="<?php echo $alm->TotalPedido; ?>" class="input" placeholder="Ingrese Total " required="required" />
    </div>
    <br>
    <div class="nombre">
        <labe style="font-size: 120%; font-family: Vedana;">Estado pedido:</label>
        <select name="EstadoPedido" class="option">
            <option class="option_selelect" <?php echo $alm->EstadoPedido == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>
            <option class="option_selelect" <?php echo $alm->EstadoPedido == 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" >Inactivo</option>
        </select>
    </div> 
<br>
    <div class="nombre">
        <input type="text" name="MetodoPago" value="<?php echo $alm->MetodoPago; ?>" class="input" placeholder="Ingrese Metodo Pago" required="required" minlength="4" maxlength="15"/>
    </div>

    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button">Guardar</button>
    </div>
    </center>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>