<link rel="stylesheet" type="text/css" href="../css/view.css">
<link rel="stylesheet" type="text/css" href="css/historial.css">
<link rel="stylesheet" href="../view/nav/navGerente.css">
<header >
        <nav class="navegacion">
            <ul class="menu0">
                <li><a href=""><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
            <ul class="menu3">
                <li><a class="logout" href="loginout.php">Cerrar Sesion</a></li>
            <li><a href="IndexCarro.php"><img class="logo3" src="img/carrito2.png"></a></li>
            </ul>
            <ul class="menu1">
                <li><a href="cliente.php">Home</a></li>
                <li><a href="ProductosCategoria.php">Ropa</a>
                    <ul class="submenu">
                        <li><a href="productosCompra/camisetas.php">Camisetas</a></li>
                        <li><a href="productosCompra/camisas.php">Camisas</a></li>
                        <li><a href="productosCompra/jeans.php">Jeans</a></li>
                        <li><a href="productosCompra/gorros.php">Gorros</a></li>
                    </ul>
                </li>
            </ul>
    </header> 
<script type="text/javascript" src="js/buscador.js"></script>
<?php

$link = new PDO('mysql:host=localhost;dbname=proyecto', 'root', ''); // el campo vaciío es para la password. 

?>
<style>
 datos {border:1px solid #ccc;padding:10px;font-size:1em;}
 
datos tr:nth-child(even) {background:#ccc;}
 
datos td {padding:5px;}
 
datos tr.noSearch {background:White;font-size:0.8em;}
 
datos tr.noSearch td {padding-top:10px;text-align:right;}
 
.hide {display:none;}
 
.red {color:Red;}
 
body {font-family: Arial, Helvetica, sans-serif;}
 
body {font-family: Arial, Helvetica, sans-serif;}
 
</style>


<style type="text/css">
    .btnvolver{
        background-color:#897BFF;
        float:right;
        margin-right: 50px;
        text-align: center;
        padding: 5 20px;
        border-radius: 0 0 5px 5px;
    }
    .btnvolver > a{
        text-decoration: none;
        color: white;
        font-size: 150%;

    }
    .btnvolver:hover{
        background-color: #6A59FE;
    }
</style>

<style>
    .imagen{
	width: 90px;
	height:  auto ;
	margin: auto auto;
    border-radius: 1px;
}
</style>
<h1 class="Titulodetalle">Tus Pedidos</h1>
<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/paginacion.js"></script>

<div class="NewUserdiv">
 
    <input class="buscar" type="text" placeholder="Buscar Pedido" id="searchTerm" onkeyup="doSearch()">
</div>



<br>

<table class="tabla34" id="datos">
    <thead>
        <tr class="head">

            
            <th>Fecha Pedido</th>
            <th>Fecha Envio</th>
            <th>Total Pedido</th>
            <th>Cantidad Producto</th>
            <th>Producto</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarHistorial() as $r): ?>

        <?php  
        //Cambiar Formato de fecha de 02-02-2021 a 02/02/2021 (Es mejor asi)
        $originalDate = $r->FechaPedido;
        $newDate = date("d/m/Y", strtotime($originalDate));

        $originalDate2 = $r->FechaEnvio;
        $newDate2 = date("d/m/Y", strtotime($originalDate2));
        ?>

        <tr class="tr2">
            
            <td><?php echo $newDate; ?></td>
            <td><?php echo $newDate2 ?></td>
            <td><?php echo "$".$r->TotalPedido; ?></td>
            <td><?php echo $r->CantidadProducto; ?></td>
            <td><img class="imagen" src="<?php echo $r->img; ?>"></img></td>
           
            
            
            <tr class="detalle" id="detalle"  name="detalle">
                <td class="detalle-container"> 
                    <p class="subdetalle">DireccionEntrega:&nbsp<?php echo $r->DireccionEntrega; ?></p>
                    <p class="subdetalle">TelefonoContacto:&nbsp<?php echo $r->TelefonoContacto; ?></p> 
                </td>
                <td class="detalle-container2">
                    
                    <p class="subdetalle2">MetodoPago:&nbsp<?php echo $r->MetodoPago; ?></p>
                    <p class="subdetalle2">DescuentoPedido:&nbsp<?php echo $r->DescuentoPedido; ?></p>
                </td>
                <td class="detalle-container3">
                    <p class="subdetalle3">CompaniaEnvio:&nbsp<?php echo $r->NombreCompamia; ?><br></p>
                    <p class="subdetalle3">EstadoPedido:&nbsp<?php echo $r->EstadoPedido; ?></p>
                </td>

            </tr>
               
            
        </tr>
        <tr class='noSearch hide'>

<td colspan="12"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 

<div class="paginacionDiv">
    <ul class="paginacionUl" id="myPager"></ul>
</div>
<script>
   /* function mostrar(){
        var subdetalle = document.querySelectorAll(".subdetalle");
        subdetalle.style.display ="none";
    }*/
</script>


