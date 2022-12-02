<?php
require_once '../model/categoria.php';

class CategoriaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Categoria();
    }
    
    public function Index(){

        require_once '../view/categoria/categoria.php';

    }
    
    public function Crud(){
        $alm = new Categoria();
        
        if(isset($_REQUEST['IdCategoria'])){
            $alm = $this->model->Obtener($_REQUEST['IdCategoria']);
        }
        

        require_once '../view/categoria/categoria-editar.php';

    }

    public function Crud1(){
        $alm = new Categoria();
        
        if(isset($_REQUEST['IdCategoria'])){
            $alm = $this->model->Obtener($_REQUEST['IdCategoria']);
        }
        

        require_once '../view/categoria/categorio-insertar.php';

    }
    
    public function Guardar(){
        $alm = new Categoria();
        
        $alm->IdCategoria = $_REQUEST['IdCategoria'];
        $alm->DescripcionCategoria = $_REQUEST['DescripcionCategoria'];
        $alm->NombreCategoria= $_REQUEST['NombreCategoria'];

        $alm->IdCategoria > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: IndexCategoria.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdCategoria']);
        header('Location: IndexCategoria.php');
    }
}