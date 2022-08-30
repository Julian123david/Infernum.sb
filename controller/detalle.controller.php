<?php
require_once '../model/detalle.php';

class DetalleController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Detalle();
    }
    
    public function Index(){

        require_once '../view/detalle/detalle.php';

    }
    
    public function Crud(){
        $alm = new Detalle();
        
        if(isset($_REQUEST['IdPedido'])){
            $alm = $this->model->Obtener($_REQUEST['IdPedido']);
        }
        

        require_once '../view/detalle/detalle-editar.php';

    }
    
    public function Guardar(){
        $alm = new Detalle();
        
        $alm->CantidadProducto = $_REQUEST['CantidadProducto'];  
        $alm->PrecioUnitario= $_REQUEST['PrecioUnitario'];
        $alm->DescuentoPedido = $_REQUEST['DescuentoPedido'];
        $alm->IdPedido= $_REQUEST['IdPedido'];
        $alm->IdProducto= $_REQUEST['IdProducto'];


        $alm->IdPedido > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexDetalle.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdDetalle']);
        header('Location: indexDetalle.php');
    }
}