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
                header('location:indexCarro.php');
                break;


            default:
        }
    }

    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        session_start();
		$_SESSION['nombredelusuario']=$user;
        
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
                    header('location:indexCarro.php');
                    break;
     
                 default:
             }
        
        }else{
            echo '<script language="javascript">alert("Usuario y/o contraseña incorrecto");window.location.href="login.php"</script>';;

        }

    }

?>
<style type="text/css">
        .icon2 {
    bottom: 2px;
    right: 5px;
    width: 40px;
    height: 40px !important;
    cursor: pointer;
    filter: opacity(75%);
}
.icon2:hover{
    filter: opacity(100%);
}

.icon2:focus{
    filter: opacity(100%);
}
.divIcon{
    display: grid;
    height: fit-content;
    margin-top: 10px;
    margin-left: 300px;

}

</style>
<script type="text/javascript">
        function mostrarContrasena(){
                var tipo = document.getElementById("password");
                if(tipo.type == "password"){
                    tipo.type = "text";
                }else{
                    tipo.type = "password";
                }
            }
    </script>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../view/nav/navGerente.css">
    <link rel="stylesheet" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header style="flex: inline;">
        <nav class="navegacion">
            
            <ul class="menu0">
                <li><a href="../prueba.php"><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>

        </nav>
    </header>
<br><br><br><br>
      
<center>
<form action="#" method="POST" onsubmit="return validar();"></form>    
<img class="wave" src="img/wave.png">
    <div class="login">
    <div class="container">
		<div class="img">
			<img src="img/Avatar01.svg">
		</div>

        <div class="login-content">
			<form action="#" method="POST" onsubmit="return validar();">
				<img src="img/avatar.svg">
				<h2 class="title">Inicia Sesión</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>

           		   <div class="div">					
           		   		<h5>Usuario</h5>
           		   		<input type="text" class="input" name="user">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
                      <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" id="password" class="input" name="pass" maxlength="15">
                        <span id="imgContrasena" class="divIcon" data-activo=false><img src="https://cdn3.iconfinder.com/data/icons/show-and-hide-password/100/show_hide_password-09-256.png" onclick="mostrarContrasena()" class="icon2"></span><br>
            	   </div>
            	</div>   
				        	
            		<input type="submit" class="btn" name="Ingresar" value="Ingresa">
				
            </form>
            <a href="http://localhost/Infernum.sb/view/IndexUsuario.php?c=Usuario&a=Crud2">Registrate</a>

        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

       <!-- 
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
    </div>--->
</body>
</html>