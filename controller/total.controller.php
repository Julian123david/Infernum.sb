<?php
require_once '../model/total.php';

class TotalController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Total();
    }
    
    public function Index(){

        require_once '../view/total/total.php';

    }
    
    public function Crud(){
        $alm = new Total();
        
        if(isset($_REQUEST['IdDetalle'])){
            $alm = $this->model->Obtener($_REQUEST['IdDetalle']);
        }
        

        require_once '../view/total/total-editar.php';

    }

    
    public function Crud1(){
        $alm = new Total();
        
        if(isset($_REQUEST['IdDetalle'])){
            $alm = $this->model->Obtener($_REQUEST['IdDetalle']);
        }
        

        require_once '../view/total/total-insertar.php';

    }
    
    public function Guardar(){
        $alm = new Total();
        
        $alm->CantidadProducto = $_REQUEST['CantidadProducto'];  
        $alm->PrecioUnitario= $_REQUEST['PrecioUnitario'];
        $alm->DescuentoPedido = $_REQUEST['DescuentoPedido'];
        $alm->IdPedido= $_REQUEST['IdPedido'];
        $alm->cod= $_REQUEST['cod'];


        $alm->IdDetalle > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: cliente.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdDetalle']);
        header('Location: indexTotal.php');
    }
}