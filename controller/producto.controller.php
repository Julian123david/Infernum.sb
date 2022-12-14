<?php
require_once '../model/producto.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
    
    public function Index(){

        require_once '../view/producto/producto.php';

    }
    
    public function Crud(){
        $alm = new Producto();
        
        if(isset($_REQUEST['cod'])){
            $alm = $this->model->Obtener($_REQUEST['cod']);
        }
        

        require_once '../view/producto/producto-editar.php';

    }

    public function Crud1(){
        $alm = new Producto();
        
        if(isset($_REQUEST['cod'])){
            $alm = $this->model->Obtener($_REQUEST['cod']);
        }
        

        require_once '../view/producto/producto-insertar.php';

    }
    
    public function Guardar(){
        $alm = new Producto();

        $alm->cod= $_REQUEST['cod'];
        $alm->IdCategoria= $_REQUEST['IdCategoria'];
        $alm->img = $_REQUEST['img'];
        $alm->nom= $_REQUEST['nom'];
        $alm->pre= $_REQUEST['pre'];
        $alm->EstadoProducto= $_REQUEST['EstadoProducto'];

        $alm->cod > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexProducto.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['cod']);
        header('Location: indexProducto.php');
    }
}