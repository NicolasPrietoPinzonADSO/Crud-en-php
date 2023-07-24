<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">


            <?php
            //Incluimos el fichero de configuración 
            require_once('../config/config.php');
            //Incluimos la clase conexion a la base de datos
            require_once('../libs/Database.php');
            // Incluimos la clase usuario
            require_once('../model/User.php');

            $database = new Database();

            $connection = $database->getConnection();

            //  $userModel = new User($connection);
            //  require_once '../model/User.php';
            // $pdo = new PDO('mysql:host=localhost;dbname=admin_pdo', 'root', '');

            // // Aquí se cargarán las dependencias del controlador también
            
            $usuario = new User($connection);
            $users = $usuario->getAll();
            ?>

            <table class="table table-hover table-dark mt-5">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Eliminar</th> <!-- Agregamos una columna adicional para el botón de eliminar -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key) { ?>
                        <tr>
                            <td>
                                <?= $key['firs_name']; ?>
                            </td>
                            <td>
                                <?= $key['last_name']; ?>
                            </td>
                            <td>
                                <?= $key['email']; ?>
                            </td>
                            <td>
                                <?= $key['cedula']; ?>
                            </td>
                            <td>
                                <form action="../controller/eliminar.php" method="post">
                                    <input type="hidden" name="identificador" value="<?= $key['id']; ?>">
                                    <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>

                                </form>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <div>
            <a class="btn btn-warning w-100 mt-4" href="guardar.php">Volver</a>
        </div>
        </div>
        
    </div>
    </div>
</section>