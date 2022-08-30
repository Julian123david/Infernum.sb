<?php
class Compania
{
	private $pdo;
    
    public $IdCompaniaEnvio;
    public $NombreCompamia;
    public $TelefonoCompania;


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

			$stm = $this->pdo->prepare("SELECT * FROM CompaniaEnvio");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdCompaniaEnvio)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM CompaniaEnvio WHERE IdIdCompaniaEnvio = ?");
			          

			$stm->execute(array($IdCompaniaEnvio));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdCompaniaEnvio)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM CompaniaEnvio WHERE IdCompaniaEnvio = ?");			          

			$stm->execute(array($IdCompaniaEnvio));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Compania SET 
						NombreCompamia      = ?,
                        TelefonoCompania = ?
				    WHERE IdCompaniaEncio = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->NombreCompamia, 
                        $data->TelofonoCompania,
                        $data->IdCompaniaEnvio
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Compania $data)
	{
		try 
		{
		$sql = "INSERT INTO CompaniaEnvio(NombreCompamia, TelefonoCompania) 
		        VALUES (?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->NombreCompamia,
                    $data->TelefonoCompania

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}