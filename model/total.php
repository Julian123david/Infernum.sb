<?php
class Total
{
	private $pdo;
    
	public $IdDetalle;
    public $CantidadProducto;	
	public $PrecioUnitario;
    public $DescuentoPedido;
    public $IdPedido;
	public $cod;


	
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

			$stm = $this->pdo->prepare("SELECT * FROM DetallePedido");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdDetalle)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM DetallePedido WHERE IdDetalle= ?");
			          

			$stm->execute(array($IdDetalle));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdDetalle)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM DetallePedido WHERE IdDetalle = ?");			          

			$stm->execute(array($IdDetalle));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE DetallePedido SET 						
						CantidadProducto = ?,
						PrecioUnitario = ?,
                        DescuentoPedido  = ?,
						IdPedido = ?, 
						cod = ?

				    WHERE IdDetalle= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->CantidadProducto,
                        $data->PrecioUnitario, 
                        $data->DescuentoPedido,
						$data->cod,
                        $data->IdPedido,
						$data->IdDetalle
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Total $data)
	{
		try 
		{
		$sql = "INSERT INTO DetallePedido( CantidadProducto, PrecioUnitario, DescuentoPedido, IdPedido, cod) 
		        VALUES (?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
					$data->CantidadProducto,
					$data->PrecioUnitario, 	

					$data->DescuentoPedido,
					$data->IdPedido,
					$data->cod

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}