<?php

include('../db.php');

$listaRegiones = ["Arica","Tarapacá","Antofagasta","Atacama","Coquimbo","Valparaíso","Metropolitana","O'Higgins","Maule","Ñuble","Biobío","La Araucanía","Los Ríos","Los Lagos","Magallanes"];

if (isset($_POST["modificar_bodega"])){
    $idBodega = $_POST["id_bodega"];
    $nombre = $_POST["nombre_bodega"];
    $direccion = $_POST["direccion_bodega"];
    $region = $_POST["region_bodega"];

    $largoNombre = strlen($nombre);
    $largoDireccion = strlen($direccion);
    $largoRegion = strlen($region);

    /* Validar cantidad de carácteres de cada uno de los campos */
    if($largoNombre < 3 or $largoNombre > 30){
        $_SESSION['mensaje'] = 'El nombre debe tener entre 3 y 30 carácteres';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/bodegas/agregar_bodega.php");
    }

    if($largoDireccion < 8 or $largoDireccion > 30){
        $_SESSION['mensaje'] = 'La dirección debe tener entre 8 y 30 carácteres';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/bodegas/agregar_bodega.php");
    }

    if(!in_array($region, $listaRegiones) or $region == "none"){
        $_SESSION['mensaje'] = 'Debe ingresar una región válida';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/bodegas/agregar_bodega.php");
    }

    $query = "UPDATE bodega SET nombre = '$nombre', direccion = '$direccion', region = '$region' WHERE id_bodega = '$idBodega'";

    echo $query;

    $res = mysqli_query($connection, $query);
    
    if (!$res){
        $_SESSION['mensaje'] = 'Producto modificado con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../index.php");
    }else{
        $_SESSION['mensaje'] = 'Producto modificado con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../index.php");
    }
    
}

?>