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

<h1 class="Titulo">
    <?php echo $alm->IdCliente != null ? $alm->NombreCliente : 'Nuevo Registro'; ?>
</h1>

<div  class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexCliente.php">Clientes Registrados</a></li>

</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" />

     <div class="nombre">
        <input type="number" name="IdUsuario" value="<?php echo $alm->IdUsuario; ?>" class="input" placeholder="idUsuario " required="IdUsuario" />
        <br>
        <label id="Error1" class="error" style="color:red"></label>
    </div>   
    
    <div class="nombre">
        <input type="text" name="NombreCliente" value="<?php echo $alm->NombreCliente; ?>" class="input"  placeholder="Ingrese su nombre" required="required" minlength="4" maxlength="30" />
        <br>
        <label id="Error1" class="error" style="color:red"></label>
    </div>
    
    <div class="nombre">
        <input type="text" name="ApellidoCliente" value="<?php echo $alm->ApellidoCliente; ?>"  class="input" placeholder="Ingrese Apellido" required="required" minlength="4" maxlength="30"  />
        <br>
        <label id="Error1" class="error" style="color:red"></label>
    </div>

    <div class="nombre">
        <input type="text" name="DireccionCliente" value="<?php echo $alm->DireccionCliente; ?>" class="input" placeholder="Ingrese Direccion" required="required" minlength="6" maxlength="30" />
    </div>
    
    <div class="nombre">
        <input type="number" name="TelefonoCliente" value="<?php echo $alm->TelefonoCliente; ?>"  minlength="6" class="input" placeholder="Ingrese Telefono " required="required" />
    </div>

    <div class="nombre">
        <input type="number" name="NumDocCliente" value="<?php echo $alm->NumDocCliente; ?>" class="input" placeholder="Ingrese Numero de documento" required="required" />
    </div>

    <div class="nombre">
        <input type="text" name="CorreoCliente" value="<?php echo $alm->CorreoCliente; ?>" title="valor@valor.valor" class="input" placeholder="Ingrese Correo" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"/>
    </div>



    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button id="button" onmouseover="validar()">Guardar</button>
    </div>
    </center>
    <script type="text/javascript">
            function validar(){
                var NombreCliente = document.Pru.NombreCliente.value;
                var ApellidoCliente = document.Pru.ApellidoCliente.value;
                var DireccionCliente = document.Pru.DireccionCliente.value;
                var TelefonoCliente = document.Pru.TelefonoCliente.value;
                var NumDocCliente = document.Pru.NumDocCliente.value;
                var CorreoCliente = document.Pru.CorreoCliente.value;

                if(NombreCliente === "" || ApellidoCliente === "" || ApellidoCliente === ""){
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
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>