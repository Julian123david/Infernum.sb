<?php
require_once '../model/pedido.php';

class PedidoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Pedido();
    }
    
    public function Index(){

        require_once '../view/pedido/pedido.php';
        

    }
    
    public function Crud(){
        $alm = new Pedido();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener($_REQUEST['IdPedido']);
        }
        

        require_once '../view/pedido/pedido-editar.php';

    }



    public function Crud1(){
        $alm = new Pedido();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener($_REQUEST['IdPedido']);
        }
        

        require_once '../view/pedido/pedido-insertar.php';

    }

    public function Crud2(){
        $alm = new Pedido();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener1($_REQUEST['IdPedido']);
        }
        

        require_once '../view/pedido/pedido-autorizar.php';

    }



    public function Crud3(){
        $alm = new Pedido();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener($_REQUEST['IdPedido']);
        }
        

        require_once '../view/pedido/pedido-autorizarCantidad.php';

    }

    public function Crud4(){
        $alm = new Pedido();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener2($_REQUEST['IdPedido']);
        }
        

        require_once '../view/pedido/pedido-terminados.php';

    }

    public function Crud5(){
        $alm = new Pedido();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener1($_REQUEST['IdPedido']);
        }
        

        require_once '../view/pedido/pedido-historial.php';

    }    
    
    public function Guardar(){
        $alm = new Pedido();
        
        $alm->IdPedido = $_REQUEST['IdPedido'];  
        $alm->IdEmpleado= $_REQUEST['IdEmpleado'];
        $alm->IdCliente = $_REQUEST['IdCliente'];
        $alm->IdCompaniaEnvio= $_REQUEST['IdCompaniaEnvio'];
        $alm->FechaPedido= $_REQUEST['FechaPedido'];
        $alm->FechaEnvio= $_REQUEST['FechaEnvio'];
        $alm->DireccionEntrega= $_REQUEST['DireccionEntrega'];
        $alm->TelefonoContacto= $_REQUEST['TelefonoContacto'];
        $alm->TotalPedido= $_REQUEST['TotalPedido'];
        $alm->EstadoPedido= $_REQUEST['EstadoPedido'];
        $alm->MetodoPago= $_REQUEST['MetodoPago'];

        $alm->IdPedido > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: http://localhost/Infernum.sb/view/indexTotal.php?c=Total&a=Crud1');
    }

    public function Guardar1(){
        $alm = new Pedido();
        
        $alm->IdPedido = $_REQUEST['IdPedido'];  
        $alm->IdEmpleado= $_REQUEST['IdEmpleado'];
        $alm->IdCliente = $_REQUEST['IdCliente'];
        $alm->IdCompaniaEnvio= $_REQUEST['IdCompaniaEnvio'];
        $alm->FechaPedido= $_REQUEST['FechaPedido'];
        $alm->FechaEnvio= $_REQUEST['FechaEnvio'];
        $alm->DireccionEntrega= $_REQUEST['DireccionEntrega'];
        $alm->TelefonoContacto= $_REQUEST['TelefonoContacto'];
        $alm->TotalPedido= $_REQUEST['TotalPedido'];
        $alm->EstadoPedido= $_REQUEST['EstadoPedido'];
        $alm->MetodoPago= $_REQUEST['MetodoPago'];

        $alm->IdPedido > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexPedido.php');
    }


    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdPedido']);
        header('Location: indexPedido.php');
    }
}
?>
