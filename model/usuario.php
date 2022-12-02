<?php
class Usuario
{
	private $pdo;
    
    public $IdUsuario;
    public $NombreUsuario;
    public $ClaveUsuario;
	public $EstadoUsuario;
	public $IdRol;

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

			$stm = $this->pdo->prepare("SELECT u.IdUsuario, u.NombreUsuario, u.ClaveUsuario, u.EstadoUsuario, r.rol from Usuario u inner join rol r on u.IdRol = r.IdRol;");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdUsuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Usuario WHERE IdUsuario = ?");
			          

			$stm->execute(array($IdUsuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdUsuario)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Usuario WHERE IdUsuario = ?");			          

			$stm->execute(array($IdUsuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{

			$sql = "UPDATE Usuario SET 
						NombreUsuario        = ?,
                        ClaveUsuario  = ?,
						EstadoUsuario = ?,
						IdRol = ?
				    WHERE IdUsuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->NombreUsuario, 
                        $data->ClaveUsuario,
						$data->EstadoUsuario,
						$data->IdRol,
                        $data->IdUsuario
					)


				);


		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}

	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO Usuario (NombreUsuario,ClaveUsuario, EstadoUsuario, IdRol) 
		        VALUES (?, ?, ?,  ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->NombreUsuario,
                    $data->ClaveUsuario,
					$data->EstadoUsuario,
					$data->IdRol,

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar1(Usuario $data)
	{
		
		try 
		{
		$sql = "INSERT INTO Usuario (NombreUsuario,ClaveUsuario, EstadoUsuario, IdRol) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->NombreUsuario,
                    $data->ClaveUsuario,
					$data->EstadoUsuario,
					$data->IdRol,

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}