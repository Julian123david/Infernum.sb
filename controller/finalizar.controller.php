<?php
session_start();

require_once("../model/clase.php");

$usar_db = new DBControl();

if(!empty($_GET["accion"])) 
{
switch($_GET["accion"]) 
{
	case "agregar":
		if(!empty($_POST["txtcantidad"])) 
		{
			$codproducto = $usar_db->vaiQuery("SELECT * FROM Producto WHERE cod='" . $_GET["cod"] . "'");
			$items_array = array($codproducto[0]["cod"]=>array(
			'vai_nom'		=>$codproducto[0]["nom"], 
			'vai_cod'		=>$codproducto[0]["cod"], 
			'txtcantidad'	=>$_POST["txtcantidad"], 
			'vai_pre'		=>$codproducto[0]["pre"], 
			'vai_img'		=>$codproducto[0]["img"]
			));
			
			if(!empty($_SESSION["items_carrito"])) 
			{
				if(in_array($codproducto[0]["cod"],
				array_keys($_SESSION["items_carrito"]))) 
				{
					foreach($_SESSION["items_carrito"] as $i => $j) 
					{
							if($codproducto[0]["cod"] == $i) 
							{
								if(empty($_SESSION["items_carrito"][$i]["txtcantidad"])) 
								{
									$_SESSION["items_carrito"][$i]["txtcantidad"] = 0;
								}
								$_SESSION["items_carrito"][$i]["txtcantidad"] += $_POST["txtcantidad"];
							}
					}
				} else 
				{
					$_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"],$items_array);
				}
			} 
			else 
			{
				$_SESSION["items_carrito"] = $items_array;
			}
		}
	break;
	case "eliminar":
		if(!empty($_SESSION["items_carrito"])) 
		{
			foreach($_SESSION["items_carrito"] as $i => $j) 
			{
				if($_GET["eliminarcode"] == $i)
				{
					unset($_SESSION["items_carrito"][$i]);	
				}			
				if(empty($_SESSION["items_carrito"]))
				{
					unset($_SESSION["items_carrito"]);
				}
			}
		}
	break;
	case "vacio":
		unset($_SESSION["items_carrito"]);
	break;	
	case "pagar":
	echo "<script> alert('Gracias por su compra - Infernum.sb');window.location= 'indexCarro.php' </script>";
		unset($_SESSION["items_carrito"]);
	
	break;	
}
}
?>

<?php
if(isset($_SESSION["items_carrito"]))
{
    $totcantidad = 0;
    $totprecio = 0;
?>	

<?php		
    foreach ($_SESSION["items_carrito"] as $item){
        $item_price = $item["txtcantidad"]*$item["vai_pre"];
		?>

				<?php
				$totcantidad += $item["txtcantidad"];
				$totprecio += ($item["vai_pre"]*$item["txtcantidad"]);
		}
		?>

		
  <?php
} else {
?>


<?php 
}
?>


<?php
require_once '../model/finalizar.php';

class FinalizarController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Finalizar();
    }
    
    public function Index(){

        require_once '../view/finalizarCompra/finalizar.php';

    }
    
    public function Crud(){
        $alm = new Finalizar();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener($_REQUEST['IdPedido']);
        }
        

        require_once '../view/finalizar/pedido-editar.php';

    }

    public function Crud1(){
        $alm = new Finalizar();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener($_REQUEST['IdPedido']);
        }
        

        require_once '../view/finalizarCompra/finalizarCompra-insertar.php';

    }
    
    
    public function Guardar(){
        $alm = new Finalizar();


        $alm->IdPedido = $_REQUEST['IdPedido'];  
        $alm->IdEmpleado= $_REQUEST['IdEmpleado'];
        $alm->IdCliente = $_REQUEST['IdCliente'];
        $alm->IdCompaniaEnvio= $_REQUEST['IdCompaniaEnvio'];
        $alm->FechaPedido= ['FechaPedido'];
        $alm->FechaEnvio= $_REQUEST['FechaEnvio'];
        $alm->DireccionEntrega= $_REQUEST['DireccionEntrega'];
        $alm->TotalPedido= $_REQUEST['TotalPedido'];
        $alm->EstadoPedido= $_REQUEST['EstadoPedido'];
        $alm->MetodoPago= $_REQUEST['MetodoPago'];

        $alm->IdPedido > 0 
		? $this->model->Actualizar($alm)
		: $this->model->Registrar($alm);
        
        header('Location: http://localhost/Infernum.sb/view/indexTotal.php?c=Total&a=Crud1');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdPedido']);
        header('Location: indexFinalizar.php');
    }
}