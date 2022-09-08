<link rel="stylesheet" type="text/css" href="../css/view.css">
<<<<<<< HEAD
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
 

=======
<style type="text/css">
    
>>>>>>> 4350297f9ea70579e6b0aea20c8e41acd5170996
</style>

<h1 class="Titulo">Rol</h1>

<br>
<div class="NewUserdiv">
<a  href="?c=Rol&a=Crud1">
    <input class="NewUser" type="button" value="Nuevo Rol"> </a> 
    <input class="buscar" type="text" placeholder="Buscar Rol" id="searchTerm" onkeyup="doSearch()">
</div>
<br>
<table class="tabla" id="datos">
    <thead>
        <tr class="tr">
            <th>Id</th>
            <th>Rol</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr class="tr2">
            <td><?php echo $r->IdRol; ?></td>
            <td><?php echo $r->rol; ?></td>
            <td>
                <a href="?c=Rol&a=Crud&IdRol=<?php echo $r->IdRol; ?>"><img class="edit" src="img/edit.png"></a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este ROL?');" href="?c=Rol&a=Eliminar&IdRol=<?php echo $r->IdRol; ?>"><img class="delete" src="img/delete.png"></a>
            </td>
        </tr>
        <tr class='noSearch hide'>

<td colspan="5"></td>

</tr>
    <?php endforeach; ?>
    </tbody>
</table> 