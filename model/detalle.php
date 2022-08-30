<?php
class Detalle
{
	private $pdo;
    
    public $CantidadProducto;	
	public $PrecioUnitario;
    public $DescuentoPedido;
    public $IdPedido;
	public $IdProducto;


	
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

	public function Obtener($IdPedido)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM DetallePedido WHERE IdPedido = ?");
			          

			$stm->execute(array($IdPedido));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdPedido)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM DetallePedido WHERE IdPedido = ?");			          

			$stm->execute(array($IdPedido));
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
						IdProducto = ?

				    WHERE IdPedido= ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->CantidadProducto,
                        $data->PrecioUnitario, 
                        $data->DescuentoPedido,
						$data->IdProducto,

                        $data->IdPedido
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Detalle $data)
	{
		try 
		{
		$sql = "INSERT INTO DetallePedido( CantidadProducto, PrecioUnitario, DescuentoPedido, IdPedido, IdProducto) 
		        VALUES (?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
					$data->CantidadProducto,
					$data->PrecioUnitario, 	

					$data->DescuentoPedido,
					$data->IdPedido,
					$data->IdProducto

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}