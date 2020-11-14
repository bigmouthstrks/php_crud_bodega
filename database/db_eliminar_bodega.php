<?php 

include('../db.php');

if (isset($_GET['id'])){
    $idBodega = $_GET['id'];
    $query = "DELETE FROM bodega WHERE id_bodega = '$idBodega'";
    $result = mysqli_query($connection, $query);
    if (!$result){
        die("Error.");
    }

    $_SESSION['mensaje'] = 'Bodega eliminada con éxito';
    $_SESSION['tipo_mensaje'] = 'danger';

    header("Location: ../views/bodegas/listar_bodegas.php"); 

}

?>