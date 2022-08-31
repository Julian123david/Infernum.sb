<link rel="stylesheet" type="text/css" href="css/formulario.css">
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
<script src="js/alertas.js"></script>

<h1 class="Titulo">
    <?php echo $alm->IdUsuario != null ? $alm->NombreUsuario : 'Nuevo Usuario'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexUsuario.php">Usuarios Registrados</a></li>

</ol>

<form id="frm-usuario" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="nombre">
        <input type="text" id="name" name="NombreUsuario" value="<?php echo $alm->NombreUsuario; ?>" class="input" placeholder="Nombre Usuario" required="required" minlength="6" maxlength="35"  /><br>
    <label id="Error1" class="error" style="color:red"></label><br>
        <label id="Error3" class="error" style="color:red"></label>
    </div>
    
    <div class="nombre">
        <input type="password" id="password" name="ClaveUsuario" value="<?php echo $alm->ClaveUsuario; ?>" class="input" placeholder="Clave Usuario" required="required" minlength="6" maxlength="15" readonly /><br>
        <label id="Error2" class="error" style="color:red"></label><br>
        <label id="Error4" class="error" style="color:red"></label>
    </div>

    <div class="nombre">
        <label>Estado:</label>
        <select name="EstadoUsuario" class="input">
            <option <?php echo $alm->EstadoUsuario == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>
            <option <?php echo $alm->EstadoUsuario== 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" class="input">Inactivo</option>
        </select>
    </div> 

    <div class="nombre">
        <label>IdRol:</label>
        <select name="IdRol" class="input">
            <option <?php echo $alm->IdRol == 1 ? 'selected' : ''; ?> value="1">Gerente</option>
            <option <?php echo $alm->IdRol == 2 ? 'selected' : ''; ?> value="2">Vendedor</option>
            <option <?php echo $alm->IdRol == 3 ? 'selected' : ''; ?> value="3">Cliente</option>
        </select>
    </div>  
    
    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button" onmouseover="validar()" onclick="javascript:return  confirm('¿Seguro de editar este usuario?');">Guardar</button>
        <p class="warning" id="warnings"></p>
    </div>
    </center>

    <td>
            </td>
            <script type="text/javascript">
            function validar(){
                var NombreUsuario = document.Pru.NombreUsuario.value;
                var ClaveUsuario = document.Pru.ClaveUsuario.value;

                if(NombreUsuario === ""){
                    document.getElementById("Error1").innerText="*Error, campo vacio";
                } else {
                    document.getElementById("Error1").innerText="";
                }
                if(ClaveUsuario === ""){
                    document.getElementById("Error2").innerText="*Error, campo vacio";
                } else {
                    document.getElementById("Error2").innerText="";
                }
                if(NombreUsuario.length < 6 ){
                    document.getElementById("Error3").innerText="*Error, nombre demasiado corto";
                } else {
                    document.getElementById("Error3").innerText="";
                }
                if(ClaveUsuario.length < 6 ){
                    document.getElementById("Error4").innerText="Contarseña demasiada corta";
                } else {
                    document.getElementById("Error4").innerText="";
                }
                
            }
            </script>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>

