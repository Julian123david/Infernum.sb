<?php
class Categoria
{
	private $pdo;
    
    public $IdCategoria;
    public $DescripcionCategoria;
    public $NombreCategoria;

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

			$stm = $this->pdo->prepare("SELECT * FROM Categoria");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdCategoria)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Categoria WHERE IdCategoria = ?");
			          

			$stm->execute(array($IdCategoria));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdCategoria)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Categoria WHERE IdCategoria = ?");			          

			$stm->execute(array($IdCategoria));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{

			$sql = "UPDATE Categoria SET 
						DescripcionCategoria = ?,
                        NombreCategoria = ?
				    WHERE IdCategoria= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->DescripcionCategoria, 
                        $data->NombreCategoria,
                        $data->IdCategoria
					)


				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}

	public function Registrar(Categoria $data)
	{
		try 
		{
		$sql = "INSERT INTO Categoria (DescripcionCategoria, NombreCategoria) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->DescripcionCategoria,
                    $data->NombreCategoria
                )
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}