<?php

include('../db.php');

if (isset($_POST["agregar_bodega"])){
    $nombre = $_POST["nombre_bodega"];
    $direccion = $_POST["direccion_bodega"];
    $region = $_POST["region_bodega"];

    $largoNombre = strlen($nombre);
    $largoDireccion = strlen($direccion);

    $listaRegiones = ["Arica","Tarapacá","Antofagasta","Atacama","Coquimbo","Valparaíso","Metropolitana","O'Higgins","Maule","Ñuble","Biobío","La Araucanía","Los Ríos","Los Lagos","Magallanes"];

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
    
    $query = "INSERT INTO bodega(nombre, direccion, region) VALUES ('$nombre', '$direccion', '$region')";
    $res = mysqli_query($connection, $query);

    /* Redirección con mensaje de feedback según resultado de la consulta */
    if (!res){
        $_SESSION['mensaje'] = 'Error. Ninguna bodega ha sido agregada.';
        $_SESSION['tipo'] = 'danger';
        header("Location: ../views/bodegas/agregar_bodega.php"); 
    }else{
        $_SESSION['mensaje'] = 'Bodega agregada con éxito';
        $_SESSION['tipo'] = 'success';
        header("Location: ../views/bodegas/agregar_bodega.php"); 
    }
}

?>