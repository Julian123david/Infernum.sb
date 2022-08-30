<?php
require_once '../model/compania.php';

class CompaniaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Compania();
    }
    
    public function Index(){

        require_once '../view/compania/compania.php';

    }
    
    public function Crud(){
        $alm = new Compania();
        
        if(isset($_REQUEST['IdCompaniaEnvio'])){
            $alm = $this->model->Obtener($_REQUEST['IdCompaniaEnvio']);
        }
        

        require_once '../view/compania/compania-editar.php';

    }
    
    public function Guardar(){
        $alm = new Compania();
        
        $alm->IdCompaniaEnvio = $_REQUEST['IdCompaniaEnvio'];
        $alm->NombreCompamia = $_REQUEST['NombreCompamia'];
        $alm->TelefonoCompania = $_REQUEST['TelefonoCompania'];


        $alm->IdCompaniaEnvio > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: indexCompania.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['IdCompaniaEnvio']);
        header('Location: indexCompania.php');
    }
}