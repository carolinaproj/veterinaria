<?php 
require '../includes/database.php';

$db = new Database();
$con = $db->conectar();




$sql = ("UPDATE `tm_usuario` SET `ID_usuario`='[ID_usuario]',`cc_usu`='[cc_usu]',`nombre_usu`='[nombre_usu]',`telefono_usu`='[telefono_usu]',`correo_usu`='[correo_usu]',`direccion_usu`='[direccion_usu]',`contraseña_usu`='[contraseña_usu]',`ID_tip_usu`='[ID_tip_usu]',`ID_mascota`='[ID_mascota]' WHERE 1");


if ($link->query($sql))
?>


<a href="update.php" button-type="button" name="editar" value="editar" class="btn btn-succes">Editar</a>
