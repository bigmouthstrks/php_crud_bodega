<?php

include('../db.php');

if (isset($_POST["agregar_bodega"])){
    $idBodega = $_POST["id_bodega"];
    $nombre = $_POST["nombre_bodega"];
    $direccion = $_POST["direccion_bodega"];
    $region = $_POST["region_bodega"];

    $query = "INSERT INTO bodega(id_bodega, nombre, direccion, region) VALUES ('$idBodega', '$nombre', '$direccion', '$region')";

    $res = mysqli_query($connection, $query);

    if (!$res){
        echo "ERROR: Consulta fallida";
    }

    $_SESSION['mensaje'] = 'Bodega agregada con éxito';

    header("Location: ../views/bodegas/agregar_bodega.php"); 
}

?>