<?php 
require '../includes/database.php';

$db = new Database();
$con = $db->conectar();




if (isset($_POST['cambio']))
{
    $usuario = ($_POST['ID_usuario']);
    $documento = ($_POST['cc_usu']);
    $nombres = ($_POST['nombre_usu']);
    $telefono = ($_POST['telefono_usu']);
    $correo = ($_POST['direccion_usu']);
    $direccion = ($_POST['contraseña_usu']);
    $contraseña = ($_POST['ID_tip_usu']);
    $id_tip_usu = ($_POST['ID_mascota']);

    $doc = ($_POST['doc']);
    
     $sql1 = $con->prepare("SELECT count(email) FROM tm_usuario WHERE  = 'ID_usuario' AND cc_usu = $doc LIMIT 1");
     $sql1->execute();
     if($sql1->fetchColumn() > 0)
     {
          $sqlemail = $con->prepare("SELECT * FROM tm_usuario WHERE email = '$email' AND document = $doc LIMIT 1");
          $sqlemail->execute();
          $row = $sqlemail->fetch(PDO::FETCH_ASSOC);
        //  echo $row['email'];
        //  echo $row['document'];
        
    }
    else{
        echo"<script>alert('Email y/o Documento Invalido, verifique!!')</script>";
        echo"<script>window.location='recuperar_cont.php'</script>";
    
    }

    if (isset($_POST['cambiar'])){
   $contra = $_POST['contra'];
   $docu = $_POST['doc'];
   
      
   $insert = $con->prepare( "UPDATE user SET contra=? WHERE document = $docu");
   $insert->execute([$contra]);       
   
   echo"<script>alert('Se actualizo la contraseña')</script>";
   echo"<script>window.location='login.php'</script>";

}

}

?>


<?php
  $_UPDATE_SQL="UPDATE $usuario Set 
  ID_usuario='$usuario', 
  cc_usu='$documento',
  nombre_usu='$nombres',
  telefono_usu='$telefono',
  correo_usu='$correo',
  direccion_usu='$direccion',
  contraseña_usu='$contraseña',
  ID_tip_usu='$id_tip_usu',
  ID_mascota='$id_mascota',


  

  WHERE ID_usuario='$usuario'"; 

  mysqli_query($conexion,$_UPDATE_SQL);


  ?>