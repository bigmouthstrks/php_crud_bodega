<?php

/* Se inicia la sesión y se realiza una conexión a la BD */
session_start();

$connection = mysqli_connect(
    "localhost",
    "root",
    "root",
    "sistemas_expertos",
    "8888"
);

?>