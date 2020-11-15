<?php

include('../db.php');

if (isset($_POST["agregar_producto"])){
    $idBodega = $_POST["id_bodega"];
    $nombre = $_POST["nombre_producto"];
    $stock = $_POST["stock_producto"];
    $precio = $_POST["precio_producto"];
    $bodega = $_POST["bodega_producto"];

    /* Validar largo de cada campo */
    $largoNombre = strlen($nombre);
    $largoStock = strlen($stock);
    $largoPrecio = strlen($precio);

    $precio = intval($precio);
    $stock = intval($stock);
    $idBodega = intval($idBodega);

    if($largoNombre > 20 or $largoNombre < 3){
        $_SESSION['mensaje'] = 'El nombre debe tener entre 3 y 20 carácteres.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/agregar_producto.php?id=$idBodega"); 
    }

    if($largoStock > 5 or !filter_var($stock, FILTER_VALIDATE_INT)){
        $_SESSION['mensaje'] = 'El stock debe tener entre 3 y 20 dígitos.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/agregar_producto.php?id=$idBodega"); 
    }
 
    if($largoPrecio > 7 or $largoPrecio < 3 or !filter_var($precio, FILTER_VALIDATE_INT)){
        $_SESSION['mensaje'] = 'El precio debe tener entre 3 y 7 dígitos.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/agregar_producto.php?id=$idBodega"); 
    }
    
    $query = "INSERT INTO producto(nombre, stock, precio, bodega_producto) VALUES ('$nombre', $stock, $precio, $idBodega)";
    $res = mysqli_query($connection, $query);

    /* Redirección con mensaje de feedback según resultado de la consulta */
    if (!$res){
        $_SESSION['mensaje'] = 'Error. Ningún producto agregado';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/productos/agregar_producto.php?id=$idBodega"); 
    }else{
        $_SESSION['mensaje'] = 'Producto agregado con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../views/productos/agregar_producto.php?id=$idBodega"); 
    }
    
}

?>