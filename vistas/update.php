<?php


// Indicamos que trabajaremos en directorio que estamos situados (__DIR__)
//Incluimos el fichero de configuración 
require_once('../config/config.php');
//Incluimos la clase conexion a la base de datos
require_once('../libs/Database.php');
// Incluimos la clase usuario
require_once('../model/User.php');

//Creamos la instancia de la clase conexion a la base de datos
$database = new Database();
//Llamamos el metodo conexion que es quien nos retorna la conexion a la base de datos
$connection = $database->getConnection();
//Creamos la instancia del modelo usuario y pasamos la conexion a la base de datos
$userModel = new User($connection);
//Creamos la instancia del modelo libro y le pasamos la conexion a la base de datos

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1>Actualizar datos</h1>
                    </div>
                    <div class="card-body">

                        <form action="../controller/actualizar.php" method="POST">
                            <?php foreach ($actualizar as $key) { ?>
                                <label for="" class="form-label mb-2">Nombre</label>
                                <input class="form-control" type="hidden" name="identificador" value="<?= $key['id'] ?>">
                                <input class="form-control" type="text" name="nombre" value="<?= $key['firs_name'] ?>">
                                <label for="" class="form-label">Apellido</label>
                                <input class="form-control" type="text" name="apellido" value="<?= $key['last_name'] ?>">
                                <label for="" class="form-label">Email</label>
                                <input class="form-control" type="text" name="email" value="<?= $key['email'] ?>">
                                <label for="" class="form-label">Cedula</label>
                                <input class="form-control" type="text" name="cedula" value="<?= $key['cedula'] ?>">
                                <div class="mt-4 mb-4">
                                    <input type="submit" name="envio_edit" class="btn btn-warning w-100">
                                </div>
                            <?php } ?>
                        </form>
                        <div class="text-center mt-2">
                            <a href="../vistas/guardar.php" class="btn btn-dark text-white w-100">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>