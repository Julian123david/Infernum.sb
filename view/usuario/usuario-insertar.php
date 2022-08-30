<link rel="stylesheet" type="text/css" href="css/formulario.css">

<h1 class="Titulo">
    <?php echo $alm->IdUsuario != null ? $alm->NombreUsuario : 'Nuevo Usuario'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexUsuario.php">Usuarios Registrados</a></li>

</ol>

<form id="frm-usuario" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data" name="Pru">
    <input type="hidden" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" />
    
    <div class="nombre">
        <input type="text" name="NombreUsuario" value="<?php echo $alm->NombreUsuario; ?>" class="input" placeholder="Nombre Usuario"  minlength="7" maxlength="35"/> <br>
    <label id="Error1" style="color:red"></label>
    </div>
    
    <div class="nombre">
        <input type="text" name="ClaveUsuario" value="<?php echo $alm->ClaveUsuario; ?>" class="input" placeholder="Clave Usuario" required="required" minlength="7" maxlength="15" /><br>
        <label id="Error2" style="color:red"></label>
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
        <button id="button" onmouseover="validar()">Guardar  </button>
        <input type="hidden" value="1" name="opcion"><br><br>
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