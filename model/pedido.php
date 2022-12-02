<?php
require_once 'detalles.php';

session_start();
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
	public $TelefonoContacto;
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

			$stm = $this->pdo->prepare("SELECT c.NombreCliente, p.IdPedido, p.IdCliente, p.IdCompaniaEnvio, p.FechaPedido, p.FechaEnvio, p.DireccionEntrega,  p.TelefonoContacto, p.TotalPedido, p.EstadoPedido, p.MetodoPago, e.NombreEmpleado  from Pedido p inner join Empleado e on p.IdEmpleado = e.IdEmpleado inner join Cliente c on  p.IdCliente=c.IdCliente where EstadoPedido = 'Activo' ; 
			");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar1()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT  p.IdPedido, p.IdCliente, p.IdCompaniaEnvio, p.FechaPedido, p.FechaEnvio, p.DireccionEntrega ,p.TelefonoContacto, p.TotalPedido, p.EstadoPedido, p.MetodoPago, e.NombreEmpleado  from Pedido p inner join Empleado e on p.IdEmpleado = e.IdEmpleado  inner join DetallePedido d on p.IdPedido = d.IdPedido WHERE EstadoPedido = '' and  CantidadProducto <=10 ; 			");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar2()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT p.IdPedido, p.IdCliente, p.FechaPedido, p.DireccionEntrega,  p.TelefonoContacto, p.TotalPedido, d.CantidadProducto , c.NombreCliente, c.TelefonoCliente from Pedido p inner join DetallePedido d on p.IdPedido = d.IdPedido inner join Cliente c on  p.IdCliente=c.IdCliente where CantidadProducto >=10 and p.EstadoPedido ='';");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar3()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT p.IdPedido, c.NombreCliente,  p.FechaPedido, p.FechaEnvio, p.DireccionEntrega, p.TelefonoContacto ,p.TotalPedido, p.EstadoPedido, p.MetodoPago, e.NombreEmpleado  from pedido p inner join cliente c on p.IdCliente = c.IdCliente inner join Empleado e on p.IdEmpleado = e.IdEmpleado WHERE p.EstadoPedido = 'Terminado' ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar4()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT p.IdPedido, c.NombreCliente,  p.FechaPedido, p.FechaEnvio, p.DireccionEntrega, p.TelefonoContacto ,p.TotalPedido, p.EstadoPedido, p.MetodoPago, e.NombreEmpleado  from pedido p inner join cliente c on p.IdCliente = c.IdCliente inner join Empleado e on p.IdEmpleado = e.IdEmpleado WHERE p.EstadoPedido = ''");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarHistorial()

	{	
		 if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	
}
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT  p.IdCliente, co.NombreCompamia, p.FechaPedido, p.FechaEnvio, p.DireccionEntrega, p.TelefonoContacto ,p.TotalPedido, p.EstadoPedido, p.MetodoPago, d.CantidadProducto, d.DescuentoPedido, pr.img, pr.nom from pedido p inner join cliente c on p.IdCliente = c.IdCliente inner join usuario u on c.IdUsuario = u.IdUsuario inner join detallePedido d on p.IdPedido = d.IdPedido inner join Producto pr on d.cod = pr.cod  inner join CompaniaEnvio co on p.IdCompaniaEnvio = co.IdCompaniaEnvio  where u.NombreUsuario = '$usuarioingresado';");
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

	public function Obtener1($IdPedido)
	{
		try 
		{

			$stm = $this->pdo
			          ->prepare("SELECT c.NombreCliente,  p.FechaPedido, p.FechaEnvio, p.DireccionEntrega, p.TelefonoContacto ,p.TotalPedido, p.EstadoPedido, p.MetodoPago from pedido p inner join cliente c on p.IdCliente = c.IdCliente WHERE p.EstadoPedido = '' ");
			          

			$stm->execute(array($IdPedido));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener2($IdPedido)
	{
		try 
		{

			$stm = $this->pdo
			          ->prepare("SELECT * FROM Pedido WHERE EstadoPedido = 'Terminado' ");
			          

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
						TelefonoContacto =?,
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
						$data->TelefonoContacto,
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
		$fechaActual = date('d-m-Y');
		try 
		{
		$sql = "INSERT INTO Pedido ( IdEmpleado ,  
        IdCliente,
        IdCompaniaEnvio,
        FechaPedido,
        FechaEnvio,
        DireccionEntrega,
		TelefonoContacto,
        TotalPedido,
        EstadoPedido ,
        MetodoPago) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?  ,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(					
                    $data->IdEmpleado,
                    $data->IdCliente, 
                    $data->IdCompaniaEnvio,					
                    $data->FechaPedido,
                    $data->FechaEnvio,
                    $data->DireccionEntrega,
					$data->TelefonoContacto,
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
?>
