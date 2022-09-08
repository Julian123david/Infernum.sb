<html>
<head>
    <title>Infernum.sb</title>
    <link rel="shortcut icon" href="..\img\celular.jpg">
    <link rel="stylesheet" href="../view/nav/nav.css">

  </head>  
    
    <body>

    <header>
	<nav class="menu1">
		<ul class="ul">
			<li><a href=""><img class="logo" src="img/logo.png"></a></li>
			<li><a href="gerente.php" ><p>HOME</p></a></li>
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



<?php
require_once '../model/databases.php';

$controller = 'cliente';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

?>

<body>
<br><br><br><br>

</body>
</html>

</body>