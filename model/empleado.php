<?php
class Empleado
{
	private $pdo;
    
    public $IdEmpleado;	
	public $IdUsuario;
    public $NombreEmpleado;
    public $ApellidoEmpleado;
	public $DireccionEmpleado;
	public $TelefonoEmpleado;
	public $NumDocEmpleado;
	public $CorreoEmpleado;

	
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM Empleado");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdEmpleado)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Empleado WHERE IdEmpleado = ?");
			          

			$stm->execute(array($IdEmpleado));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdEmpleado)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Empleado WHERE IdEmpleado = ?");			          

			$stm->execute(array($IdEmpleado));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Empleado SET 						
						IdUsuario = ?,
						NombreEmpleado = ?,
                        ApellidoEmpleado  = ?,
						DireccionEmpleado = ?,
						TelefonoEmpleado =?,
						NumDocEmpleado =?,
						CorreoEmpleado =?

				    WHERE IdEmpleado = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->IdUsuario,
                        $data->NombreEmpleado, 
                        $data->ApellidoEmpleado,
						$data->DireccionEmpleado,
						$data->TelefonoEmpleado,
						$data->NumDocEmpleado,
						$data->CorreoEmpleado,

                        $data->IdEmpleado
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data)
	{
		try 
		{
		$sql = "INSERT INTO Empleado ( IdUsuario, NombreEmpleado,ApellidoEmpleado, DireccionEmpleado, TelefonoEmpleado, NumDocEmpleado, CorreoEmpleado) 
		        VALUES (?, ?, ?, ?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
					$data->IdUsuario,
					$data->NombreEmpleado, 	

					$data->ApellidoEmpleado,
					$data->DireccionEmpleado,
					$data->TelefonoEmpleado,
					$data->NumDocEmpleado,
					$data->CorreoEmpleado

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}