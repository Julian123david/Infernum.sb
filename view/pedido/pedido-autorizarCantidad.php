<?php
if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: login.php');
    }
}
?>
<link rel="stylesheet" type="text/css" href="../css/view.css">
<script type="text/javascript" src="js/buscador.js"></script>
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
<div class="btnvolver"><a href="javascript:history.back()"> Volver</a></div>
<h1 class="Titulo">Pedido</h1>
<br>
<div class="NewUserdiv">

    <input class="buscar" type="text" placeholder="Buscar Pedido" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla">
    <thead>
        <tr class="tr">
            <th>Id Pedido</th>            
            <th>IdCliente</th>
            <th>FechaPedido</th>
            <th>DireccionEntrega</th>
            <th>TotalPedido</th>
            <th>Cantidad</th>
            <th>NombreCliente</th>
            <th>TelefonoCliente</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar2() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdPedido; ?></td>          
            <td><?php echo $r->IdCliente; ?></td>
            <td><?php echo $r->FechaPedido; ?></td>
            <td><?php echo $r->DireccionEntrega; ?></td>
            <td><?php echo $r->TotalPedido; ?></td>
            <td><?php echo $r->CantidadProducto; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td><?php echo $r->TelefonoCliente; ?></td>


            <td>
                <a href="?c=Pedido&a=Crud&IdPedido=<?php echo $r->IdPedido; ?>">                <img class="edit" src="img/edit.png">
</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Pedido&a=Eliminar&IdPedido=<?php echo $r->IdPedido; ?>">                <img class="delete" src="img/delete.png">
</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>  