<link rel="stylesheet" type="text/css" href="css/formulario.css">

<h1 class="Titulo">
    <?php echo $alm->IdPedido != null ? $alm->IdPedido : 'Nuevo Pedido'; ?>
</h1>

<div class="Contenedor">
<ol class="Usuario">
<li><a class="Volver" href="IndexPedido.php">Pedidos Registrados</a></li>

</ol>
                
 
<form id="frm-pedido" action="?c=Pedido&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPedido" value="<?php echo $alm->IdPedido; ?>" />
      
    <p class="trigger">Ver Detalle Del Pedido </p>
        <div class="modal">
            <div class="modal-content">
                <span class="close-button">×</span>
                    <h1>Detalle del Pedido</h1>
                   

            <p><?php echo $alm->CantidadProducto; ?></p>          
            <p><?php echo $alm->PrecioUnitario; ?></p>  
            <p><?php echo $alm->DescuentoPedido; ?></p>  
            <p><?php echo $alm->IdPedido; ?></p>  
            <p><?php echo $alm->id; ?></p>  


            </div>
        </div>
 

     <div class="nombre">
        <input type="text" name="IdEmpleado" value="<?php echo $alm->IdEmpleado; ?>" class="input" placeholder="Ingrese IdEmpleado" required="required" />

    </div>   
    
    <div class="nombre">
        <input type="text" name="IdCliente" value="<?php echo $alm->IdCliente; ?>" class="input" placeholder="Ingrese IdCliente" required="required" />
    </div>
    
    <div class="nombre">
        <input type="text" name="IdCompaniaEnvio" value="<?php echo $alm->IdCompaniaEnvio; ?>" class="input" placeholder="Ingrese Compañia Envio" required="required" />
    </div>

    <div class="nombre">
        <input type="date" name="FechaPedido" value="<?php echo $alm->FechaPedido; ?>" class="input" placeholder="Ingrese " required="required" />
    </div>
    
    <div class="nombre">
        <input type="date" name="FechaEnvio" value="<?php echo $alm->FechaEnvio; ?>" class="input" placeholder="Ingrese " required="required" />
    </div>

    <div class="nombre">
        <input type="text" name="DireccionEntrega" value="<?php echo $alm->DireccionEntrega; ?>" class="input" placeholder="Ingrese DireccionEntrega " required="required" minlength="10" maxlength="255"/>
    </div>

    <div class="nombre">
        <input type="text" name="TotalPedido" value="<?php echo $alm->TotalPedido; ?>" class="input" placeholder="Ingrese Total " required="required" />
    </div>

    <div class="nombre">
        <label>Estado pedido:</label>
        <select name="EstadoPedido" class="input">
            <option <?php echo $alm->EstadoPedido == 'Activo' ? 'selected' : ''; ?> value="Activo" class="input">Activo</option>
            <option <?php echo $alm->EstadoPedido == 'Inactivo' ? 'selected' : ''; ?> value="Inactivo" class="input">Inactivo</option>
        </select>
    </div> 

    <div class="nombre">
        <input type="text" name="MetodoPago" value="<?php echo $alm->MetodoPago; ?>" class="input" placeholder="Ingrese Metodo Pago" required="required" minlength="10" maxlength="15"/>
    </div>

    <hr />
    <br>
    <center>
    <div class="botondiv">
        <button class="button">Guardar</button>
    </div>
    </center>
</form>
</div>
<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>
<style>
    .modal {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 24rem;
    border-radius: 0.5rem;
}

.close-button {
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
}

.close-button:hover {
    background-color: darkgray;
}

.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
</style>

<script>
    const modal = document.querySelector(".modal");
const trigger = document.querySelector(".trigger");
const closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>
