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
<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","proyecto");
  
    // Get all the courses from courses table
    // execute the query 
    // Store the result
    $sql = "SELECT * FROM `Usuario`";
    $Sql_query = mysqli_query($con,$sql);
    $All_courses = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>
  
    <link rel="stylesheet" type="text/css" href="../css/views.css">
<link rel="stylesheet" type="text/css" href="../css/paginacion.css">
<link rel="stylesheet" href="../view/nav/navGerente.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/alertas.js"></script>


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
<style>
        .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
 
    </style> 

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
        <!-- TABLE TOP ROW HEADINGS-->
        <thead>
        <tr class="tr">
            <th>Nombre Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Cambiar Estado</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php
              foreach ($All_courses as $course) { 
              
              ?>
            <tr class="tr2">
            

                <td><?php echo $course['NombreUsuario']; ?></td>

                <td><?php
                        if($course['IdRol']=="1") 
                            echo "Gerente";

                        elseif ($course['IdRol']=="2") {
                            echo "Vendedor";
                        }
                        else
                            echo "Cliente";
                    ?>   
                </td> 

                <td><?php 

                        if($course['EstadoUsuario']=="1") 
                            echo "Activo";
                        else 
                            echo "Inactivo";
                    ?>                          
                </td>

            <td>
                    <?php 
                    if($course['EstadoUsuario']=="1") 
  
                        echo 
"<a href=usuario/deactive.php?IdUsuario=".$course['IdUsuario']." class='btn red'>Desactivarlo</a>";
                    else 
                        echo 
"<a href=usuario/activate.php?IdUsuario=".$course['IdUsuario']." class='btn green'>Activarlo</a>";
                    ?>
            </td>



           <td>
                <a href="?c=Usuario&a=Crud&IdUsuario=<?php echo $course['IdUsuario'];?>">
                <img class="edit" src="img/edit.png">
</a>
            </td>

        </tr>
</tbody>
        <tr class='noSearch hide'>

<td colspan="7"></td>

</tr>
   <?php
                }
                // End the foreach loop 
           ?>
    </table>
</div>
    <div class="paginacionDiv">
    <ul class="paginacionUl" id="myPager"></ul>
</div>


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

<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Infernum.sb</h2>
    </div>
    <div class="modal-body">
    <form action="Usuario/recibe.php" method="POST" enctype="multipart/form-data"/>
        
            <input  type="file" name="dataUsuario" />
            <label class="file-input__label" for="file-input">
          </div><br>
          <input type="submit" name="subir" value="Subir Excel"/>
      </div>
      </form>
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

        
