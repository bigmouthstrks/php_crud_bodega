<?php 
    include('../../db.php'); 
    include('../../includes/header.php');

    /* Se definen las variables para ejecutar la consulta para agregar producto */
    if(isset($_GET['id'])){
        $idBodegaActual = $_GET['id'];
        $query = "SELECT id_bodega, nombre FROM bodega";
        $result = mysqli_query($connection, $query);
        while($row = $result->fetch_array()){
            $rows[] = $row;
        }
    }
?> 
    <!-- Formulario para agregar un nuevo Producto -->
    <form class="container p-3" action="../../database/db_agregar_producto.php" method="POST">
        <?php if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset(); } ?>
        
        <!-- Ingreso de datos del nuevo producto -->
        <h1>Agregar nuevo producto</h1>
        <input type="text" value="<?= $idBodegaActual ?>" name="id_bodega" hidden>
        <div class="form-group">
            <label for="nombre_producto">Nombre Producto:</label>
            <input type="text" name="nombre_producto" class="form-control" placeholder="Ingrese el nombre para el producto" maxlength="20">
        </div>
        <div class="form-group">
            <label for="stock_producto">Stock:</label>
            <input type="number" name="stock_producto" class="form-control" placeholder="Ingrese el stock inicial" maxlength="5">
        </div> 
        <div class="form-group">
            <label for="precio_producto">Precio:</label>
            <input type="number" name="precio_producto" class="form-control" placeholder="Ingrese el precio" maxlength="7">
        </div> 
        <button class="btn btn-primary" name="agregar_producto" type="submit">Agregar producto</button>
        <a href="../productos/productos_bodega.php?id=<?= $idBodegaActual ?>" class="btn btn-warning">Cancelar</a>
    </form>


<?php include('../../includes/footer.php') ?>