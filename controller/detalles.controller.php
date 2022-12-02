<?php
require_once '../model/detalles.php';

class DetallesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Detalles();
    }
    
    public function Index(){

        require_once '../view/detalles/detalles.php';

    }
    
    public function Crud(){
        $alm = new Detalles();
        
        if(isset($_REQUEST['IdDetalle'])){
            $alm = $this->model->Obtener($_REQUEST['IdDetalle']);
        }
        

        require_once '../view/detalles/detalles-editar.php';

    }

    public function Crud1(){
        $alm = new Detalles();
        
        if(isset($_REQUEST['IdDetalle'])){
            $alm = $this->model->Obtener($_REQUEST['IdDetalle']);
        }
        

        require_once '../view/detalles/detalles-insertar.php';

    }
    
    public function Guardar(){
        $alm = new Detalles();
        
        $alm->CantidadProducto = $_REQUEST['CantidadProducto'];  
        $alm->PrecioUnitario = $_REQUEST['PrecioUnitario'];
        $alm->DescuentoPedido = $_REQUEST['DescuentoPedido'];
        $alm->IdPedido= $_REQUEST['IdPedido'];
        $alm->cod= $_REQUEST['cod'];

        $alm->IdDetalle > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexDetalles.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdDetalle']);
        header('Location: indexDetalles.php');
    }
}