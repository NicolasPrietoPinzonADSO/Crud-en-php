<?php


// Indicamos que trabajaremos en directorio que estamos situados (__DIR__)
//Incluimos el fichero de configuración 
require_once('../config/config.php');
//Incluimos la clase conexion a la base de datos
require_once('../libs/Database.php');
// Incluimos la clase usuario
require_once('../model/User.php');
// Incluimos la clase libro
require_once('../model/Book.php');

//Creamos la instancia de la clase conexion a la base de datos
$database = new Database();
//Llamamos el metodo conexion que es quien nos retorna la conexion a la base de datos
$connection = $database->getConnection();
//Creamos la instancia del modelo usuario y pasamos la conexion a la base de datos
$userModel = new User($connection);
//Creamos la instancia del modelo libro y le pasamos la conexion a la base de datos
$bookModel = new Book($connection);

if (isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['email'])&&isset($_POST['cedula'])){
    $nombre = ($_POST['nombre']);
    $apellido = ($_POST['apellido']);
    $email = ($_POST['email']);
    $cedula = ($_POST['cedula']);

    $userModel -> setNombre($nombre);
    $userModel -> setApellido($apellido);
    $userModel -> setEmail($email);
    $userModel -> setCedula($cedula);
}



/**
 * Listamos todos los usuarios
 */
$users = $userModel->getAll();
/**
 * Listamos los libros
 */
$books = $bookModel->getAll();
/**
 * Listamos los libros relacionados con un autor
 */
$booksUser = $bookModel->getRel(1);
/**
 * Listamos un libro filtrado por su identificador primario
 */
$book = $bookModel->getById(1);


if (!$userModel->addDatos()) {
    header('Location:../vistas/mostrarError.php');                 
}else {
    header('Location:../vistas/guardar.php');                 
}


echo json_encode($users);?>