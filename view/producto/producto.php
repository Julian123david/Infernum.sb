<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","proyecto");
  
    // Get all the courses from courses table
    // execute the query 
    // Store the result
    $sql = "SELECT * FROM `Producto`";
    $Sql_query = mysqli_query($con,$sql);
    $All_courses = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="../css/view.css">
<script type="text/javascript" src="js/buscador.js"></script>

 
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
<style>
    .imagen{
	width: 100%;
	height:  auto ;
	margin: auto auto;
    border-radius: 1px;
}
</style>

<style>
    .imagen{
	width: 100%;
	height:  auto ;
	margin: auto auto;
    border-radius: 1px;
    }

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
<div class="btnvolver"><a href="javascript:history.back()"> Volver</a></div>
<h1 class="Titulo">Producto</h1>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/paginacion.js"></script>

<br>
<div class="NewUserdiv">
<a  href="?c=Producto&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Producto"> </a> 
    <input class="buscar" type="text" placeholder="BuscarUsuario"  id="searchTerm" onkeyup="doSearch()">
</div>

<br>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Codigo</th>            
            <th>Categoria</th>
            <th>Imagen</th>
            <th>NombreProducto</th>
            <th>PrecioProducto</th>
            <th>EstadoProducto</th>
            <th>Cambiar Estado</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php
              foreach ($All_courses as $course) { 
              
              ?>
        <tr class="tr2">
            <td><?php echo $course['cod']; ?></td>
            <td>
            <?php
                        if($course['IdCategoria']=="1") 
                            echo "Camisetas";

                        elseif ($course['IdCategoria']=="2") {
                            echo "Camisas";
                        }
                        elseif ($course['IdCategoria']=="3") {
                            echo "Jeans";
                        }
                        else
                            echo "Gorros";
                    ?>
            </td>

            <td><img class="imagen" src="<?php echo $course['img']; ?>"></img></td>
            
            <td><?php echo $course['nom']; ?></td>

            <td><?php echo $course['pre']; ?></td>

            <td><?php if($course['EstadoProducto']=="1") 
                         echo "Activo";
                            else 
                        echo "Agotado";
                ?>   
            </td>

            <td>
            <?php 
                    if($course['EstadoProducto']=="1") 
  
                        echo 
"<a href=producto/desactive.php?cod=".$course['cod']." class='btn red'>Desactivarlo</a>";
                    else 
                        echo 
"<a href=producto/activate.php?cod=".$course['cod']." class='btn green'>Activarlo</a>";
                    ?>
            </td>
            <td>
                <a href="?c=Producto&a=Crud&cod=<?php echo $course['cod']; ?>">
                <img class="edit" src="img/edit.png"></a>
            </td>

        </tr>
        <tr class='noSearch hide'>

<td colspan="9"></td>

</tr>
<?php
                }
                // End the foreach loop 
           ?>
    </tbody>
</table> 
<div class="paginacionDiv">
    <ul class="paginacionUl" id="myPager"></ul>
</div>

