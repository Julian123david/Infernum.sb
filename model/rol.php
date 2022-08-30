<?php
class Rol
{
	private $pdo;
    
    public $IdRol;
    public $rol;


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

			$stm = $this->pdo->prepare("SELECT * FROM Rol");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdRol)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Rol WHERE IdRol = ?");
			          

			$stm->execute(array($IdRol));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdRol)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Rol WHERE IdRol = ?");			          

			$stm->execute(array($IdRol));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Rol SET 
						rol       = ?
				    WHERE IdRol = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->rol, 
                        $data->IdRol
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Rol $data)
	{
		try 
		{
		$sql = "INSERT INTO Rol(rol) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->rol,

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}