<?php
require_once '../model/cliente.php';

class ClienteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
    
    public function Index(){

        require_once '../view/cliente/cliente.php';

    }
    
    public function Crud(){
        $alm = new Cliente();
        
        if(isset($_REQUEST['IdCliente'])){
            $alm = $this->model->Obtener($_REQUEST['IdCliente']);
        }
        

        require_once '../view/cliente/cliente-editar.php';

    }
    
    public function Guardar(){
        $alm = new Cliente();
        
        $alm->IdCliente = $_REQUEST['IdCliente'];  
        $alm->IdUsuario= $_REQUEST['IdUsuario'];
        $alm->NombreCliente = $_REQUEST['NombreCliente'];
        $alm->ApellidoCliente= $_REQUEST['ApellidoCliente'];
        $alm->DireccionCliente= $_REQUEST['DireccionCliente'];
        $alm->TelefonoCliente= $_REQUEST['TelefonoCliente'];
        $alm->NumDocCliente= $_REQUEST['NumDocCliente'];
        $alm->CorreoCliente= $_REQUEST['CorreoCliente'];


        $alm->IdCliente > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexCliente.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdCliente']);
        header('Location: indexCliente.php');
    }
}