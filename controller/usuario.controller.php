<?php
require_once '../model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){

        require_once '../view/usuario/usuario.php';

    }
    
    public function Crud(){
        $alm = new Usuario();
        
        if(isset($_REQUEST['IdUsuario'])){
            $alm = $this->model->Obtener($_REQUEST['IdUsuario']);
        }
        

        require_once '../view/usuario/usuario-editar.php';

    }

    public function Crud1(){
        $alm = new Usuario();
        
        if(isset($_REQUEST['IdUsuario'])){
            $alm = $this->model->Obtener($_REQUEST['IdUsuario']);
        }
        

    require_once '../view/usuario/usuario-insertar.php';
    
    }
    
    public function Guardar(){
        $alm = new Usuario();
        
        $alm->IdUsuario = $_REQUEST['IdUsuario'];
        $alm->NombreUsuario = $_REQUEST['NombreUsuario'];
        $alm->ClaveUsuario= $_REQUEST['ClaveUsuario'];
        $alm->EstadoUsuario= $_REQUEST['EstadoUsuario'];
        $alm->IdRol= $_REQUEST['IdRol'];

        $alm->IdUsuario > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: IndexUsuario.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdUsuario']);
        header('Location: IndexUsuario.php');
    }
}