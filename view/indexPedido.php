
    <title>Infernum.sb</title>
  
    <link rel="stylesheet" type="text/css" href="css/views.css">

    <body>




<?php
require_once '../model/databases.php';

$controller = 'pedido';

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
<a href="http://localhost/Infernum.sb/view/IndexDetalles.php">Detalle Pedido</a>

</body>
</html>

</body>

