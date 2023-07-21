<?php

//Incluimos el fichero de configuración 
require_once('../config/config.php');
//Incluimos la clase conexion a la base de datos
require_once('../libs/Database.php');
// Incluimos la clase usuario
require_once('../model/User.php');

$database = new Database();

$connection = $database->getConnection();

$userModel = new User($connection);


if(isset($_POST['eliminar'])){
    $dato = $_POST['identificador'];
    $eliminar = $userModel->deleteUsuario($dato);
    header('Location: ../vistas/listarEliminar.php');
}
