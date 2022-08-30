<?php
require_once '../model/empleado.php';

class EmpleadoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
    }
    
    public function Index(){

        require_once '../view/empleado/empleado.php';

    }
    
    public function Crud(){
        $alm = new Empleado();
        
        if(isset($_REQUEST['IdEmpleado'])){
            $alm = $this->model->Obtener($_REQUEST['IdEmpleado']);
        }
        

        require_once '../view/empleado/empleado-editar.php';

    }

    public function Crud1(){
        $alm = new Empleado();
        
        if(isset($_REQUEST['IdEmpleado'])){
            $alm = $this->model->Obtener($_REQUEST['IdEmpleado']);
        }
        

        require_once '../view/empleado/empleado-insertar.php';

    }
    
    public function Guardar(){
        $alm = new Empleado();
        
        $alm->IdEmpleado = $_REQUEST['IdEmpleado'];  
        $alm->IdUsuario= $_REQUEST['IdUsuario'];
        $alm->NombreEmpleado = $_REQUEST['NombreEmpleado'];
        $alm->ApellidoEmpleado= $_REQUEST['ApellidoEmpleado'];
        $alm->DireccionEmpleado= $_REQUEST['DireccionEmpleado'];
        $alm->TelefonoEmpleado= $_REQUEST['TelefonoEmpleado'];
        $alm->NumDocEmpleado= $_REQUEST['NumDocEmpleado'];
        $alm->CorreoEmpleado= $_REQUEST['CorreoEmpleado'];


        $alm->IdEmpleado > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexEmpleado.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdEmpleado']);
        header('Location: indexEmpleado.php');
    }
}