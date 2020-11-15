<?php 
    include("../../includes/header.php");
    include("../../db.php");

    if(isset($_GET['id'])){
        $idBodegaActual = $_GET['id'];
    }
?>

    <div class="container p-3">
        <div class="row d-flex justify-content-between">
            <a href="../../">Volver</a>
            <a href="./agregar_producto.php?id=<?= $idBodegaActual ?>">Nuevo producto</a>
        </div>
        <?php  
        
        /* Consulta para obtener todos los productos según la bodega indicada */
        $query = "SELECT * FROM producto WHERE bodega_producto = '$idBodegaActual'";
        $result = mysqli_query($connection, $query);

        /* Fetch del resultado de la consulta a la variable tipo array $rows */
        while($row = $result->fetch_array()){
            $rows[] = $row;
        }
        
        if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php session_unset(); } 
        if(count($rows) > 0){
        /* Para cada producto se muestra una tarjeta con sus respectivos datos y opciones*/
        foreach($rows as $row){ ?>
            <div class='row p-3 shadow mt-4 rounded d-flex justify-content-between'>
                <div class='col-6 pt-3'>
                    <h4><?= $row['nombre'] ?></h4>
                    <p><b>ID Producto:</b> <?= $row['id_producto'] ?>  <b>Stock:</b> <?= $row['stock'] ?>  <b>Precio: </b>$<?= $row['precio'] ?> </p>
                </div>
                <div class='col-4 pt-3'>
                    <a href="modificar_producto.php?id_producto=<?= $row['id_producto'] ?>" class='col-4 btn btn-info'>Editar</a>
                    <a href="../../database/db_eliminar_producto.php?id=<?= $row['id_producto'] ?>" class='col-4 btn btn-danger'>Eliminar</a>
                </div>
                
            </div>
        <?php }
        }else{?>
            <div class="text-center">
            <h4>Aún no se han registrado productos.</h4>
            </div>
        <?php }
        $result->close();
        
        ?>
        </div>

<?php include('../includes/footer.php') ?>