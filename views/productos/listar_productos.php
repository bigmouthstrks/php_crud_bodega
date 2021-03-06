<?php 
    include("../../includes/header.php");
    include("../../db.php");
?>

    <div class="container p-3">
        <div class="row d-flex justify-content-between">        
            <a href="../../">Volver</a>
            <a href="./agregar_producto.php">Nuevo producto</a>
        </div>
        <?php 
        
        $query = "SELECT * FROM producto";
        $result = mysqli_query($connection, $query);

        /* Fetch de resultados de consulta a fariable $rows */
        while($row = $result->fetch_array()){
            $rows[] = $row;
        }
        
        /* Se muestran mensajes correspondientes de acuerdo a resultados de consultas */
        if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php session_unset(); } 
        if(count($rows) > 0){
        /* Se muestra tarjeta con datos para cada uno de los productos de la bodega indicada */
        foreach($rows as $row){ ?>
            <div class='row p-3 shadow mt-4 rounded d-flex justify-content-between'>
                <div class='col-6 pt-3'>
                    <h4>ID producto: <?= $row['id_producto'] ?> </h4>
                    <p>Nombre: <?= $row['nombre'] ?> </p>
                    <p>Precio: <?= $row['precio'] ?></p>
                    <p>Stock: <?= $row['stock'] ?></p>
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