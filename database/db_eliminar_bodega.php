<?php 

include('../db.php');

if (isset($_GET['id'])){
    $idBodega = $_GET['id'];
    $query = "DELETE FROM bodega WHERE id_bodega = '$idBodega'";
    $result = mysqli_query($connection, $query);
    if (!$result){
        $_SESSION['mensaje'] = 'Error al eliminar. No se realizaron cambios';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/bodegas/listar_bodegas.php"); 
    }else{
        $_SESSION['mensaje'] = 'Bodega eliminada con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../index.php"); 
    }
}

?>