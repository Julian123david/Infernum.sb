<link rel="stylesheet" type="text/css" href="../css/view.css">
<h1 class="page-header">Compañian de envio</h1>

<br>
<div class="envio">
  <a class="envio" href="?c=Compania&a=Crud">Nueva Compañia de Envio</a> 
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->IdCompaniaEnvio; ?></td>
            <td><?php echo $r->$NombreCompania; ?></td>
            <td><?php echo $r->$TelefonoCompania; ?></td>
            <td>
                <a href="?c=Compania&a=Crud&IdCompaniaEnvio=<?php echo $r->IdCompaniaEnvio; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Compania&a=Eliminar&IdCompaniaEnvio=<?php echo $r->IdCompaniaEnvio; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 