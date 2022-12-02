<?php
class Cliente
{
	private $pdo;
    
    public $IdCliente;	
	public $IdUsuario;
    public $NombreCliente;
    public $ApellidoCliente;
	public $DireccionCliente;
	public $TelefonoCliente;
	public $NumDocCliente;
	public $CorreoCliente;

	
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

			$stm = $this->pdo->prepare("SELECT * FROM Cliente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdCliente)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Cliente WHERE IdCliente = ?");
			          

			$stm->execute(array($IdCliente));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ObtenerE($IdCliente)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT  c.NombreCliente, c.IdUsuario, c.ApellidoCliente, c.DireccionCliente, c.TelefonoCliente, c.NumDocCliente, c.CorreoCliente from cliente c inner join usuario u on c.IdUsuario = u.IdUsuario where u.NombreUsuario = 'cliente';");
			          

			$stm->execute(array($IdCliente));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdCliente)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Cliente WHERE IdCliente = ?");			          

			$stm->execute(array($IdCliente));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Cliente SET 						
						IdUsuario = ?,
						NombreCliente = ?,
                        ApellidoCliente  = ?,
						DireccionCliente = ?,
						TelefonoCliente =?,
						NumDocCliente =?,
						CorreoCliente =?

				    WHERE IdCliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->IdUsuario,
                        $data->NombreCliente, 
                        $data->ApellidoCliente,
						$data->DireccionCliente,
						$data->TelefonoCliente,
						$data->NumDocCliente,
						$data->CorreoCliente,

                        $data->IdCliente
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar4()
	{}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO Cliente (IdUsuario, NombreCliente,ApellidoCliente, DireccionCliente, TelefonoCliente, NumDocCliente, CorreoCliente) 
		        VALUES (?, ?, ?, ?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
					$data->IdUsuario,
					$data->NombreCliente, 	
					$data->ApellidoCliente,
					$data->DireccionCliente,
					$data->TelefonoCliente,
					$data->NumDocCliente,
					$data->CorreoCliente, 

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
	public function Registrar1(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO Cliente (IdUsuario, NombreCliente,ApellidoCliente, DireccionCliente, TelefonoCliente, NumDocCliente, CorreoCliente) 
		        VALUES (?, ?, ?, ?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
					$data->IdUsuario,
					$data->NombreCliente, 	
					$data->ApellidoCliente,
					$data->DireccionCliente,
					$data->TelefonoCliente,
					$data->NumDocCliente,
					$data->CorreoCliente, 

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}