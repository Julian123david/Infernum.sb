<?php
require_once '../model/rol.php';

class RolController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Rol();
    }
    
    public function Index(){

        require_once '../view/rol/rol.php';

    }
    
    public function Crud(){
        $alm = new Rol();
        
        if(isset($_REQUEST['IdRol'])){
            $alm = $this->model->Obtener($_REQUEST['IdRol']);
        }
        

        require_once '../view/rol/rol-editar.php';

    }

    public function Crud1(){
        $alm = new Rol();
        
        if(isset($_REQUEST['IdRol'])){
            $alm = $this->model->Obtener($_REQUEST['IdRol']);
        }
        

        require_once '../view/rol/rol-insertar.php';

    }


    
    public function Guardar(){
        $alm = new Rol();
        
        $alm->IdRol = $_REQUEST['IdRol'];
        $alm->rol = $_REQUEST['rol'];


        $alm->IdRol > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexRol.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdRol']);
        header('Location: index.php');
    }
}