<?php 
    include('../../db.php'); 
    include('../../includes/header.php');

    $listaRegiones = ["Arica","Tarapacá","Antofagasta","Atacama","Coquimbo","Valparaíso","Metropolitana","O'Higgins","Maule","Ñuble","Biobío","La Araucanía","Los Ríos","Los Lagos","Magallanes"];
?> 
    <!-- Formulario para agregar una nueva bodega a la base de datos -->
    <form class="container p-3" action="../../database/db_agregar_bodega.php" method="POST">
        <!-- Se muestran mensajes de error o éxito segun corresponda -->
        <?php if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset(); } ?>
        
        <!-- Ingreso de datos de la nueva bodega -->
        <h1>Agregar nueva bodega</h1>
        <div class="form-group">
            <label for="nombre_bodega">Nombre Bodega:</label>
            <input type="text" name="nombre_bodega" class="form-control" placeholder="Ingrese el nombre para la nueva Bodega" maxlength="30" minlength="3">
        </div>
        <div class="form-group">
            <label for="direccion_bodega">Dirección:</label>
            <input type="text" name="direccion_bodega" class="form-control" placeholder="Ingrese la dirección de la nueva Bodega" maxlength="30" minlength="10">
        </div> 
        <div class="form-group">
            <label for="region_bodega">Región:</label>
            <select name="region_bodega" id="region_bodega" class="form-control">
                <option value="none" selected disabled>Seleccione una región</option>
                <?php foreach($listaRegiones as $region){ ?>
                <option value='<?= $region ?>'>
                    <?= $region ?>
                </option>
                }
                <?php } ?>
            </select>
        </div>
        <button class="btn btn-primary" name="agregar_bodega" type="submit">Agregar bodega</button>
        <a href="../../index.php" class="btn btn-warning">Cancelar</a>
    </form>

<?php include('../../includes/footer.php') ?>