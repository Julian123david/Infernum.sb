<?php
class Producto
{
	private $pdo;

    public $cod;
	public $IdCategoria;
    public $img;	
    public $nom;
	public $pre;
	public $EstadoProducto;
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

			$stm = $this->pdo->prepare("SELECT p.cod, c.NombreCategoria, p.img,  p.nom, p.pre, p.EstadoProducto from Producto p inner join Categoria c on p.IdCategoria = c.IdCategoria order by p.cod;
			");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($cod)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Producto WHERE cod = ?");
			          

			$stm->execute(array($cod));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($cod)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Producto WHERE cod = ?");			          

			$stm->execute(array($cod));
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
						nom = ?,
						pre =?,
						EstadoProducto =?

				    WHERE cod = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->IdCategoria,
                        $data->img, 
                        
						$data->nom,
						$data->pre,
						$data->EstadoProducto,
						$data->cod

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
		$sql = "INSERT INTO Producto ( cod, IdCategoria, img , nom, pre, EstadoProducto) 
		        VALUES (?, ?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(	
					$data->cod,				
					$data->IdCategoria,
					$data->img, 
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