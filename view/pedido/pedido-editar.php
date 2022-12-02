<?php
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
<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Pedido'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexPedido.php">Pedidos Registrados</a></li><br><br>
<li  id="myBtn"><a  class="Volver"> Ver Detalle Pedido</a></li>
</ol>

<form id="frm-pedido" action="?c=Pedido&a=Guardar1" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />

     <div class="nombre">
     <label>Empleado:</label>
        <select name="IdEmpleado" class="input">
            <option <?php echo $alm->IdEmpleado == '2' ? 'selected' : ''; ?> value="2">Andrey</option>
            <option <?php echo $alm->IdEmpleado == '3' ? 'selected' : ''; ?>  value="3">Jarrison</option>
            <option <?php echo $alm->IdEmpleado == '4' ? 'selected' : ''; ?>  value="4">Angel</option>

        </select>
    </div>   
    
    <div class="nombre">
        <input type="hidden"  type="text" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" class="input" placeholder="Ingrese IdCliente" required="required" />
    </div>
    
    <div class="nombre">
        <input type="hidden"  type="text" name="IdCompaniaEnvio" value="<?php echo $alm->IdCompaniaEnvio; ?>" class="input" placeholder="Ingrese Compañia Envio" required="required" />
    </div>
<br>    
<div class="nombre">

        <input type="hidden" type="date" name="FechaPedido" value="<?php echo $alm->FechaPedido; ?>" class="input" placeholder="Ingrese " required="required" max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>" 
  min = "<?php echo date("Y-m-d");?>"/>


    <div class="nombre">
        <label class="label">Fecha Envio:</label>
        <input type="date" name="FechaEnvio" value="<?php echo $alm->FechaEnvio; ?>" class="input" placeholder="Ingrese " required="required"  max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 8 days"));?>" 
  min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>"/>
    </div>
    <br>
    </div>

    <div class="nombre">
      <label class="label">Direccion de Entraga:</label>
        <input type="text" name="DireccionEntrega" value="<?php echo $alm->DireccionEntrega; ?>" class="input" placeholder="Ingrese DireccionEntrega " required="required" minlength="10" maxlength="255" readonly/>
    </div>
<br>
    <div class="nombre">
    <label class="label">Telefono Contacto:</label>
        <input type="text" name="TelefonoContacto" value="<?php echo $alm->TelefonoContacto; ?>" class="input" placeholder="Ingrese DireccionEntrega " required="required" minlength="10" maxlength="255" readonly/>
    </div>
<br>
    <div class="nombre">
      <label class="label">Total:</label>
        <input type="text" name="TotalPedido" value="<?php echo $alm->TotalPedido; ?>" class="input" placeholder="Ingrese Total " required="required" readonly/>
    </div>

    <div class="nombre">
        <label>Estado pedido:</label>
        <select name="EstadoPedido" class="input">
            <option <?php echo $alm->EstadoPedido == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>
            <option <?php echo $alm->EstadoPedido == 'Terminado' ? 'selected' : ''; ?> value="Terminado" class="input">Terminado</option>
        </select>
    </div> 
<br>
    <div class="nombre">
      <label class="label">Metodo de Pago:</label>
        <input type="text" name="MetodoPago" value="<?php echo $alm->MetodoPago; ?>" class="input" placeholder="Ingrese Metodo Pago" required="required" minlength="4" maxlength="15" readonly/>
    </div>
<br>
    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button">Guardar</button>
    </div>
    </center>
</form>

<?php

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>
</div>

         
 <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Detalle Pedido</h2>
    </div>
    <div class="modal-body">
    <?php foreach ($link->query("SELECT d.CantidadProducto, pr.nom, d.DescuentoPedido, d.PrecioUnitario, d.IdPedido FROM detallepedido d inner join pedido p on d.IdPedido = p.IdPedido  inner join Producto pr on d.cod = pr.cod  where p.IdPedido=' $alm->IdPedido' ;") as $row){ ?> 
 
            <p>Producto:</p>
            <?php echo $row['nom'] ?><br>
            <p>Cantidad Producto:</p>
            <?php echo $row['CantidadProducto'] ?><br>
            <p>Descuento Pedido:</p>
            <?php echo $row['DescuentoPedido'] ?><br>
            <p>PrecioUnitario</p>
            <?php echo $row['PrecioUnitario'] ?><br>


    <?php
        }
    ?>
    </div>

  </div>

</div>
<style>

.modal {
  display: none; 
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5E6EB2;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

