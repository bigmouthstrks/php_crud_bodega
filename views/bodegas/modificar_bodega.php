<?php 
    include('../../db.php'); 
    include('../../includes/header.php');

    /* Se definen las variables para ejecutar la consulta de actualización */
    if (isset($_GET['id_bodega'])){
        $idBodega = $_GET['id_bodega'];
        $query = "SELECT * FROM bodega WHERE id_bodega = '$idBodega'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_row();
        $listaRegiones = ["Arica","Tarapacá","Antofagasta","Atacama","Coquimbo","Valparaíso","Metropolitana","O'Higgins","Maule","Ñuble","Biobío","La Araucanía","Los Ríos","Los Lagos","Magallanes"];
    }
?> 

    <form class="container p-3" action="../../database/db_modificar_bodega.php" method="POST">

        <!-- Se muestra mensaje de respuesta después de cada consulta realizada -->
        <?php if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset(); } ?>

        <!-- Formulario para modificar bodega -->
        <h1>Modificar bodega</h1>
        <input name="id_bodega" value="<?= $idBodega ?>" hidden>
        <div class="form-group">
            <label for="nombre_bodega">Nombre Bodega:</label>
            <input type="text" name="nombre_bodega" class="form-control" placeholder="Ingrese el nombre para la nueva Bodega" value="<?= $row[1] ?>" maxlength="30">
        </div>
        <div class="form-group">
            <label for="direccion_bodega">Dirección:</label>
            <input type="text" name="direccion_bodega" class="form-control" placeholder="Ingrese la dirección de la nueva Bodega" value="<?= $row[2] ?>" maxlength="30">
        </div> 
        <div class="form-group">
            <label for="region_bodega">Región:</label>
            <select name="region_bodega" id="region_bodega" class="form-control">
                <?php foreach($listaRegiones as $region){ 
                    if($region === $row[3]){    
                ?>
                <option value='<?= $region ?>' selected>
                    <?= $region ?>
                </option>
                <?php }else{ ?>
                    <option value='<?= $region ?>'>
                        <?= $region ?>
                    </option>
                <?php }} ?>
            </select>
        </div>
        <button class="btn btn-primary" name="modificar_bodega" type="submit">Guardar cambios</button>
        <a href="../../index.php" class="btn btn-warning">Cancelar</a>
    </form>


<?php include('../../includes/footer.php') ?>