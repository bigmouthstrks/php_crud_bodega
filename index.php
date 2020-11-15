<?php include('./db.php') ?>
<?php include('./includes/header.php') ?> 

    <div class="container p-3">
        <h1 class="text-center">Módulo de prueba - Sistemas Expertos</h1>
    <div class="p-3 text-center">

    <div class="container p-3">
        <div class="row">        
            <a href="./views/bodegas/agregar_bodega.php" class="btn btn-primary w-100 p-2 m-2">Agregar nueva bodega</a>
        </div>
        <?php 
        
        $query = "SELECT * FROM bodega";

        $result = mysqli_query($connection, $query);

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
            
        foreach($rows as $row){ ?>
            <div class='row p-3 shadow mt-4 rounded d-flex justify-content-between'>
                <div class='col-6 pt-3'>
                    <h4>ID Bodega: <?= $row['id_bodega'] ?> </h4>
                    <p>Nombre: <?= $row['nombre'] ?></p>
                    <p>Dirección: <?= $row['direccion'] ?> </p>
                    <p>Región: <?= $row['region'] ?></p>
                </div>
                <div class='col-4 pt-3'>
                    <a href="./views/productos/productos_bodega.php?id=<?= $row['id_bodega'] ?>" class="btn btn-warning">Ver productos</a>
                    <a href="./views/bodegas/modificar_bodega.php?id_bodega=<?= $row['id_bodega'] ?>" class='btn btn-info'>Editar</a>
                    <a href="./database/db_eliminar_bodega.php?id=<?= $row['id_bodega'] ?>" class='btn btn-danger'>Eliminar</a>
                </div>
                
            </div>
        <?php }
        }else{?>
            <div class="text-center">
            <h4>Aún no se han registrado bodegas.</h4>
            </div>
        <?php }
        $result->close();
        
        ?>
    </div>

<?php include('./includes/footer.php') ?>