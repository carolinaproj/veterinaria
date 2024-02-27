
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<?php 
require '../includes/database.php';

$db = new Database();
$con = $db->conectar();


//editar
if(isset($_POST['update']) &&($_POST["update"] == "editar"))
{
    $usuario = ($_POST['ID_usuario']);
    $documento = ($_POST['cc_usu']);
    $nombres = ($_POST['nombre_usu']);
    $telefono = ($_POST['telefono_usu']);
    $correo = ($_POST['correo_usu']);
    $direccion = ($_POST['direccion_usu']);
    $tipo_usuario = ($_POST['ID_tip_usu']);
    $editar = $con->prepare("UPDATE tm_usuario SET cc_usu = ?, nombre_usu =?, telefono_usu = ?, correo_usu = ?, direccion_usu = ?, ID_tip_usu = ?, WHERE ID_usuario=?");
    $editar->execute([$documento, $nombres, $telefono, $correo, $direccion, $tipo_usuario]);
    header("location: ".$_SERVER['PHP_SELF']);
    exit;

}



?>



<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include("../includes/titulo.php"); ?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require('../css.php'); ?>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <?php include('../includes/menu.php'); ?>
    </aside>
    <div id="right-panel" class="right-panel">
        <?php include('../includes/header.php'); ?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Usuarios</h4>
                            </div>


<?php
$insert = $con->prepare("SELECT * FROM tm_usuario INNER JOIN tr_tipo_usuario ON tm_usuario.ID_tip_usu = tr_tipo_usuario.ID_tip_usu");

$insert->execute();
/***la variable $resultado1 es la que me va a guardar toda la informacion de la consulta */
$resultado1= $insert->fetchAll(PDO::FETCH_ASSOC);
$i=0;
?>
<table border="1">
    <tr>
    <td>#</td>
    <td>Documento</td>
    <td>Nombres</td>
    <td>Celular</td>
    <td>Correo</td>
    <td>Dirección</td>
    <td>Tipo Usuario</td>
    <td>Mascota</td>
    <td>hola</td>
    <td>hola</td>

    </tr>
<?php foreach ($resultado1 as $row)
{
    $i++; ?>

<tr>
    <td><?php echo $i?></td>
    <td><?php echo $row['cc_usu']?></td>
    <td><?php echo $row['nombre_usu']?></td>
    <td><?php echo $row['telefono_usu']?></td>
    <td><?php echo $row['correo_usu']?></td>
    <td><?php echo $row['direccion_usu']?></td>
    <td><?php echo $row['ID_tip_usu']?></td>
    <td><?php echo $row['ID_mascota']?></td>
    <td><!-- Button trigger modal -->
<button type="submit" name="update" value="editar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Editar
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>          
        
</td>
    <td><a href="delete.php" button-type="button" class="btn btn-danger">Eliminar</a>
</td>

    </tr>

<?php }?>

</table>



                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php include('../includes/footer.php'); ?>
    </div>
    <?php include('../js.php'); ?>


    //modal del boton editar
    
</body>

</html>