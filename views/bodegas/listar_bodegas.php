<?php 
    include("../../includes/header.php");
    include("../../db.php");
?>

    <div class="container p-3">
        <div class="row d-flex justify-content-between">        
            <a href="../../">Volver</a>
            <a href="./agregar_bodega.php">Nueva bodega</a>
        </div>
        <?php 
        
        $query = "SELECT * FROM bodega";

        $result = mysqli_query($connection, $query);

        while($row = $result->fetch_array()){
            $rows[] = $row;
        }
        
        if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php session_unset(); } 
        foreach($rows as $row){ ?>
            <div class='row p-3 shadow mt-4 rounded d-flex justify-content-between'>
                <div class='col-6 pt-3'>
                    <h4>ID Bodega: <?= $row['id_bodega'] ?> </h4>
                    <p>Dirección: <?= $row['direccion'] ?> </p>
                    <p>Región: <?= $row['region'] ?> región</p>
                </div>
                <div class='col-4 pt-3'>
                    <a href="modificar_bodega.php?id_bodega=<?= $row['id_bodega'] ?>" class='col-4 btn btn-info'>Editar</a>
                    <a href="../../database/db_eliminar_bodega.php?id=<?= $row['id_bodega'] ?>" class='col-4 btn btn-danger'>Eliminar</a>
                </div>
                
            </div>
        <?php }
        $result->close();
        
        ?>
    </div>

    <!-- Modal para confirmar eliminación -->
    <div class="modal fade" id="modalEliminacion" tabindex="-1" role="dialog" aria-labelledby="modalEliminacionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEliminacionLabel">¡Alerta!</h5></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Está seguro de eliminar la bodega seleccionada?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a type="submit" class="btn btn-primary">Si, eliminar</a>
        </div>
        </div>
    </div>
    </div>

<?php include('../includes/footer.php') ?>