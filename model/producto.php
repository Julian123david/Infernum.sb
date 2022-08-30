<?php
class Producto
{
	private $pdo;
    
    public $id;	
	public $IdCategoria;
    public $img;	
	public $cod;
    public $nom;
	public $pre;
	public $EstadoProducto;
	
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

			$stm = $this->pdo->prepare("SELECT * FROM Producto");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Producto WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Producto WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Producto SET 						
						IdCategoria= ?,
						img = ?,
                        cod  = ?,
						nom = ?,
						pre =?,
						EstadoProducto =?

				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->IdCategoria,
                        $data->img, 
                        $data->cod,
						$data->nom,
						$data->pre,
						$data->EstadoProducto,


                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO Producto ( id, IdCategoria, img ,cod, nom, pre, EstadoProducto) 
		        VALUES (?, ?, ?, ?, ?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
					$data->IdCategoria,
					$data->img, 
					$data->cod,
					$data->nom,
					$data->pre,
					$data->EstadoProducto,

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}