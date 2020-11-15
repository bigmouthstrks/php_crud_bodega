<?php

include('../db.php');

if (isset($_POST["modificar_producto"])){
    $idProducto = $_POST["id_producto"];
    $nombre = $_POST["nombre_producto"];
    $stock = $_POST["stock_producto"];
    $precio = $_POST["precio_producto"];

    $query = "SELECT bodega_producto FROM producto WHERE id_producto = $idProducto";
    $result = mysqli_query($connection, $query);
    $row = $result->fetch_row();
    $idBodega = $row[0];

    /* Variables que contienen la cantidad de carácteres (o dígitos) de cada campo */
    $largoNombre = strlen($nombre);
    $largoStock = strlen($stock);
    $largoPrecio = strlen($precio);

    /* Conversión de campos de tipo texto a tipo numérico (int) */
    $precio = intval($precio);
    $stock = intval($stock);
    $idBodega = intval($idBodega);


    /* Validación de los campos según largo y tipo */
    if($largoNombre > 20 or $largoNombre < 3){
        $_SESSION['mensaje'] = 'El nombre debe tener entre 3 y 20 carácteres.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/modificar_producto.php?id_producto=$idProducto"); 
    }
    if($largoStock > 5 or !filter_var($stock, FILTER_VALIDATE_INT)){
        $_SESSION['mensaje'] = 'El stock debe tener entre 3 y 20 dígitos.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/modificar_producto.php?id_producto=$idProducto"); 
    }
    if($largoPrecio > 7 or $largoPrecio < 3 or !filter_var($precio, FILTER_VALIDATE_INT)){
        $_SESSION['mensaje'] = 'El precio debe tener entre 3 y 7 dígitos.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/modificar_producto.php?id_producto=$idProducto"); 
    }

    /* Consulta para actualizar los campos del producto */
    $query = "UPDATE producto SET nombre = '$nombre', stock = $stock, precio = $precio WHERE id_producto = $idProducto";
    $res = mysqli_query($connection, $query);

    /* Redirección con mensaje de feedback según resultado de la consulta */
    if (!$res){
        $_SESSION['mensaje'] = 'Error. Ningún producto modificado';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/modificar_producto.php?id_producto=$idProducto"); 
    }else{
        $_SESSION['mensaje'] = 'Producto modificado con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../views/productos/productos_bodega.php?id=$idBodega");
    }
}

?>