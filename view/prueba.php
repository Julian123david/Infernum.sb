<link rel="stylesheet" type="text/css" href="../css/views.css">
<link rel="stylesheet" type="text/css" href="../css/paginacion.css">
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/alertas.js"></script>


</script>

<script type="text/javascript" src="js/buscador.js"></script>

<style>


 
.hide {display:none;}
 
.red {color:Red;}
 
body {font-family: Arial, Helvetica, sans-serif;}
 
body {font-family: Arial, Helvetica, sans-serif;}
 
tr:nth-child(even) {
  background-color: #D8D8E6;
}
</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/paginacion.js"></script>
    <script src="js/alertas.js"></script>

<h1 class="Titulo">Usuarios Registrados</h1>
            

<br>
<div class="NewUserdiv">
<a  href="?c=Usuario&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Usuario"> </a> 
    <input style="background-image: url(img/buscar.png);" class="buscar" type="text" placeholder="Buscar Usuario" id="searchTerm" onkeyup="doSearch()">
</div>

<br>
<div>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>
            <th>Nombre</th>
            <th>ClaveUsuario</th>
            <th>Rol</th>
            <th>EstadoUsuario</th>
            <th>Esta</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdUsuario; ?></td>
            <td><?php echo $r->NombreUsuario; ?></td>
            <td><?php echo $r->ClaveUsuario; ?></td>
            <td><?php echo $r->rol; ?></td>
                      
    
<td>
                <a href="?c=Usuario&a=Crud&IdUsuario=<?php echo $r->IdUsuario; ?>">
                <img class="edit" src="img/edit.png">
</a>
            </td>
            <td>
                
                <a id="link" >                    
                <img class="delete" src="img/delete.png">
    
</a>
            </td>

        </tr>

       
        <tr class='noSearch hide'>

<td colspan="7"></td>

</tr>
   <?php endforeach; ?> 
    </tbody>
</table>
</div>
<div class="paginacionDiv">
    <ul class="paginacionUl" id="myPager"></ul>
</div>
<br>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
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
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>

<!-- jQuery library -->

<button id="myBtn">Cargas masivas</button>


<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Cargas Masivas</h2>
    </div>

    <div class="modal-body">

    </div>

    <div class="modal-footer">
      <h3>Infernum.sb</h3>
    </div>
  </div>

</div>

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