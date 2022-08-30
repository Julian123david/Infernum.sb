<html>
<head>
    <title>Infernum.sb</title>
    <link rel="shortcut icon" href="..\img\celular.jpg">

    <link rel="stylesheet" href="../view/css/usuario.css">
  </head>  
    
    <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="hola" href="#">INFERNUM.SB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/PROYECTO/view/gerente.php">Inicio<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Productos</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal2" href="#">Sobre Nosotros</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link"  href="view/login.php"><img src="view/img/usuario.jpg" alt=""></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#"><img src="view/img/carito.png" alt=""></a>
      </li>
    </ul>
    </form>
  </div>
</nav> 
    </nav>  
</header>




<?php
require_once '../model/databases.php';

$controller = 'compania';

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