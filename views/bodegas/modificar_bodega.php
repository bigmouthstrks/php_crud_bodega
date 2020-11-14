<?php 
    include('../../db.php'); 
    include('../../includes/header.php');


    if (isset($_GET['id'])){
        $idBodega = $_GET["id"];
    
        $query = "SELECT * FROM bodega WHERE id_bodega = '$idBodega'";
        $result = mysqli_query($connection, $query);

        $listaRegiones = ['Arica','Tarapacá','Antofagasta','Atacama','Coquimbo','Valparaíso','Metropolitana','O\'Higgins','Maule','Ñuble','Biobío','La Araucanía','Los Ríos','Los Lagos','Magallanes'];

    }
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
                <?php foreach($region as $listaRegiones){ ?>
                <option value='<?= $region ?>'>
                    <?= $region ?>
                </option>
                }
                <?php } ?>
            </select>
        </div>
        <button class="btn btn-primary" name="agregar_bodega" type="submit">Guardar cambios</button>
        <a href="./listar_bodegas.php" class="btn btn-warning">Cancelar</a>
    </form>


<?php include('../../includes/footer.php') ?>