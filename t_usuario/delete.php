<?php
require '../includes/database.php';
$db = new Database();
$con = $db->conectar();

if (isset($_GET['ID_usuario'])) {
    $ID_usuario = $_GET['ID_usuario'];
    $delete = $con->prepare("DELETE FROM tm_usuario WHERE ID_usuario = :idx");
    $delete->bindParam(':idx', $ID_usuario);
    if ($delete->execute()) {
        header("Location:usuarios.php"); // Redirigir a la página principal después de eliminar
        exit();
    } else {
        echo "Error al eliminar la cita.";
    }
} else {
    echo "ID de cita no proporcionado.";
}
?>