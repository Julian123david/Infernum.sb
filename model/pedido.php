<?php
class Pedido
{
	private $pdo;
    
    public $IdPedido;	
	public $IdEmpleado;
    public $IdCliente;	
	public $IdCompaniaEnvio;
    public $FechaPedido;
	public $FechaEnvio;
	public $DireccionEntrega;
    public $TotalPedido;
    public $EstadoPedido;
    public $MetodoPago;
	
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

			$stm = $this->pdo->prepare("SELECT * FROM Pedido");
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
			          ->prepare("SELECT * FROM Pedido WHERE IdPedido = ?");
			          

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
			            ->prepare("DELETE FROM Pedido WHERE IdPedido = ?");			          

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
			$sql = "UPDATE Pedido SET 						
						IdEmpleado= ?,
						IdCliente = ?,
                        IdCompaniaEnvio = ?,
						FechaPedido = ?,
						FechaEnvio =?,
						DireccionEntrega =?,
                        TotalPedido =?,
                        EstadoPedido =?,
                        MetodoPago =?

				    WHERE IdPedido = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(						
						$data->IdEmpleado,
                        $data->IdCliente, 
                        $data->IdCompaniaEnvio,
						$data->FechaPedido,
						$data->FechaEnvio,
						$data->DireccionEntrega,
                        $data->TotalPedido,
                        $data->EstadoPedido,
                        $data->MetodoPago,


                        $data->IdPedido
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Pedido $data)
	{
		try 
		{
		$sql = "INSERT INTO Pedido ( IdEmpleado ,  
        IdCliente,
        IdCompaniaEnvio,
        FechaPedido,
        FechaEnvio,
        DireccionEntrega,
        TotalPedido,
        EstadoPedido ,
        MetodoPago) 
		        VALUES (?, ?, ?, ?,?,?, ? ,? ,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
                    $data->IdEmpleado,
                    $data->IdCliente, 
                    $data->IdCompaniaEnvio,
                    $data->FechaPedido,
                    $data->FechaEnvio,
                    $data->DireccionEntrega,
                    $data->TotalPedido,
                    $data->EstadoPedido,
                    $data->MetodoPago,

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
