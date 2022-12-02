<link rel="stylesheet" type="text/css" href="css/views.css">
<link rel="stylesheet" href="../view/nav/navGerente.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/alertas.js"></script>


</script>

<script type="text/javascript" src="js/buscador.js"></script>

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
<script type="text/javascript" src="js/buscador.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/paginacion.js"></script>
<script src="js/alertas.js"></script>
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
<h1 class="Titulo">Clientes Registrados</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Cliente&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Cliente"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Cliente" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla"  id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>            
            <th>IdUsuario</th>
            <th>NombreCliente</th>
            <th>ApellidoCliente</th>
            <th>DireccionCliente</th>
            <th>TelefonoCliente</th>
            <th>NumDocCliente</th>
            <th>CorreoCliente</th>

            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdCliente; ?></td>          
              <td><?php echo $r->IdUsuario; ?></td>
            <td><?php echo $r->NombreCliente; ?></td>
            <td><?php echo $r->ApellidoCliente; ?></td>
            <td><?php echo $r->DireccionCliente; ?></td>
            <td><?php echo $r->TelefonoCliente; ?></td>
            <td><?php echo $r->NumDocCliente; ?></td>
            <td><?php echo $r->CorreoCliente; ?></td>

            <td>
                <a href="?c=Cliente&a=Crud&IdCliente=<?php echo $r->IdCliente; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td><a id="link" ><img class="delete" src="  img/delete.png"></a>                    
            </td>
        </tr>

        <tr class='noSearch hide'>

<td colspan="10"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 

<!--Alertas -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script type="text/javascript">
        // Alert Redirect to Another Link
        $(document).on('click', '#link', function(e) {
            swal({
                title: "Esta Seguro de Eliminar?", 
                text: "Los Cambios podrian no volver", 
                type: "warning",
                confirmButtonText: "Seguro",
                showCancelButton: true
            })
                .then((result) => {
                    if (result.value) {
                       
                        window.location = '?c=Usuario&a=Eliminar&IdUsuario=<?php echo $r->IdUsuario; ?>';
                    } else if (result.dismiss === 'cancel') {
                        swal(
                          'Cancelado',
                          'Cancelaste eliminar este usuario',
                          'error'
                        )
                    }
                })
        });
</script>
