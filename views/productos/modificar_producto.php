<?php 
    include('../../db.php'); 
    include('../../includes/header.php');

    /* Se definen las variables para ejecutar la consulta de actualización */
    if (isset($_GET['id_producto'])){
        $idProducto = $_GET['id_producto'];
        $query = "SELECT * FROM producto WHERE id_producto = '$idProducto'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_row();
    }
?> 

    <form class="container p-3" action="../../database/db_modificar_producto.php" method="POST">
        <!-- Se muestra mensaje de respuesta después de cada consulta realizada -->
        <?php if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset(); } ?>
        
        <!-- Formulario para modificar producto -->
        <h1>Modificar un producto</h1>
        <input type="text" value="<?= $idProducto ?>" name="id_producto" hidden>
        <div class="form-group">
            <label for="nombre_producto">Nombre Producto:</label>
            <input type="text" name="nombre_producto" class="form-control" placeholder="Ingrese el nombre para el producto" maxlength="20" value="<?= $row[1] ?>">
        </div>
        <div class="form-group">
            <label for="stock_producto">Stock:</label>
            <input type="number" name="stock_producto" class="form-control" placeholder="Ingrese el stock inicial" maxlength="5" value="<?= $row[2] ?>">
        </div> 
        <div class="form-group">
            <label for="precio_producto">Precio:</label>
            <input type="number" name="precio_producto" class="form-control" placeholder="Ingrese el precio" maxlength="7" value="<?= $row[3] ?>">
        </div> 
        <button class="btn btn-primary" name="modificar_producto" type="submit">Modificar producto</button>
        <a href="../productos/productos_bodega.php?id=<?= $row[4] ?>" class="btn btn-warning">Cancelar</a>
    </form>

<?php include('../../includes/footer.php') ?>