<?php 

include('../db.php');

if (isset($_GET['id'])){
    $idProducto = $_GET['id'];

    /* Consulta para obtener ID de bodega del producto a eliminar */
    $query2 = "SELECT bodega_producto FROM producto WHERE id_producto = $idProducto";
    $result2 = mysqli_query($connection, $query2);
    $row = $result2->fetch_row();
    $idBodega = $row[0];

    /* Consulta para eliminar el producto del id correspondiente */
    $query = "DELETE FROM Producto WHERE id_Producto = $idProducto";
    $result = mysqli_query($connection, $query);

    /* Redirección con mensaje de feedback según resultado de la consulta */
    if (!$result){
        $_SESSION['mensaje'] = 'Error al eliminar. No se realizaron cambios';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/listar_productos.php"); 
    }else{
        $_SESSION['mensaje'] = 'Producto eliminado con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../views/productos/productos_bodega.php?id=$idBodega"); 
    }
    
}

?>