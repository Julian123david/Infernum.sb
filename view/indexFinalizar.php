<html>
<head>
    <title>Infernum.sb</title>
    <link rel="shortcut icon" href="..\img\celular.jpg">
    <link rel="stylesheet" type="text/css" href="css/views.css">
    <link rel="stylesheet" href="../view/nav/navGerente.css">
  </head>  
    
    <body>

    <header style="flex: inline;">
        <nav class="navegacion">
            
            <ul class="menu0">
                <li><a href="../prueba.php"><img class="logo" src="img/logo2.png"></a></li>
                
            </ul>
        </nav>
    </header>
<?php
require_once '../model/databases.php';

$controller = 'finalizar';

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