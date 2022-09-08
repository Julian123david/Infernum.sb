<?php

include_once '../model/database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: gerente.php');
            break;

            case 2:
            header('location: vendedor.php');
            break;

            case 3:
                header('location: cliente.php');
                break;


            default:
        }
    }

    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM Usuario WHERE NombreUsuario = :user AND ClaveUsuario = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);
    
        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
             // validar rol
             $rol = $row[4];
             $_SESSION['rol'] = $rol;
 
             switch($_SESSION['rol']){
                 case 1:
                     header('location: gerente.php');
                 break;
     
                 case 2:
                 header('location: vendedor.php');
                 break;

                 case 3:
                    header('location: cliente.php');
                    break;
     
                 default:
             }
        
        }else{
            echo '<script language="javascript">alert("Usuario y/o contraseña incorrecto");window.location.href="login.php"</script>';;

        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../view/nav/nav.css">

    <link rel="stylesheet" href="Diseño/css/login.css">
</head>
<body>

<header>
	<nav class="menu1">
		<ul class="ul">
			<li><a href=""><img class="logo" src="img/logo.png"></a></li>
			<li><a href="http://localhost/Infernum.sb/prueba.php" ><p>HOME</p></a></li>
			<li><a href="" ><p>ROPA</p></a></li>
			<li><a href="" ><p>NOSOTROS</p></a></li>
			<!--<li><a href=""><img class="logo2" src="img/buscar.png"></a></li>-->
		</ul>
		<ul class="der">
			<li><a href=""><img class="logo2" src="img/buscar.png"></a></li>
			<li><a href=""><img class="logo3" src="img/persona.png"></a></li>
			<li><a href=""><img class="logo3" src="img/carrito.png"></a></li>
		</ul>
	</nav>
</header>

<br><br><br><br>
      
<center>
    <div class="login">
        <p>Inicio de Sesión</p>
        <br>
        <form action="#" method="POST" onsubmit="return validar();">
            <p>Usuario:<input type="text" name="user" placeholder="Usuario" required="required"></p>
            <p>Contraseña:<input type="password" name="pass" placeholder="Contraseña" required="required" ></p>
            <br><br>
            <div class="envio">
                <input type="submit" name="Ingresar" value="Ingresar">
            </div>
        </form>
        </center>
    </div>
</body>
</html>