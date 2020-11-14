<?php 
    include('../../db.php'); 
    include('../../includes/header.php');
?> 

    <form class="container p-3" action="../../database/db_agregar_bodega.php" method="POST">
        <?php if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset(); } ?>

        <h1>Agregar nueva bodega</h1>
        <div class="form-group">

            <?php 
                $query = "SELECT count(id_bodega) from bodega";
                $result = mysqli_query($connection, $query);

                $cantBodegas = mysqli_fetch_array($result, MYSQLI_NUM);

                if($cantBodegas == '0'){
                    $idBodega = 'BODEGA001';
                }
                if($cantBodegas > 0 && $cantBodegas <= 9){
                    $idBodega = "BODEGA00$cantBodegas";
                }
                if($cantBodegas >= 10 && $cantBodegas <= 99){
                    $idBodega = "Bodega0$cantBodegas";
                }
                if($cantBodegas >= 100 && $cantBodegas <= 999){
                    $idBodega = "Bodega$cantBodegas";
                }
            ?>

            <label for="id_bodega">ID Bodega:</label>
            <input type="text" name="id_bodega" class="form-control" placeholder="Ingrese ID de la nueva Bodega">
        </div>    
        <div class="form-group">
            <label for="nombre_bodega">Nombre Bodega:</label>
            <input type="text" name="nombre_bodega" class="form-control" placeholder="Ingrese el nombre para la nueva Bodega">
        </div>
        <div class="form-group">
            <label for="direccion_bodega">Dirección:</label>
            <input type="text" name="direccion_bodega" class="form-control" placeholder="Ingrese la dirección de la nueva Bodega">
        </div> 
        <div class="form-group">
            <label for="region_bodega">Región:</label>
            <select name="region_bodega" id="region_bodega" class="form-control">
                <option value="1">Arica</option>
                <option value="2">Tarapacá</option>
                <option value="3">Antofagasta</option>
                <option value="4">Atacama</option>
                <option value="5">Coquimbo</option>
                <option value="6">Valparaíso</option>
                <option value="7">Metropolitana</option>
                <option value="8">O'Higgins</option>
                <option value="9">Maule</option>
                <option value="10">Ñuble</option>
                <option value="11">Biobío</option>
                <option value="12">La Araucanía</option>
                <option value="13">Los Ríos</option>
                <option value="14">Los Lagos</option>
                <option value="15">Magallanes</option>
            </select>
        </div>
        <button class="btn btn-primary" name="agregar_bodega" type="submit">Agregar bodega</button>
        <a href="./listar_bodegas.php" class="btn btn-warning">Cancelar</a>
    </form>


<?php include('../../includes/footer.php') ?>