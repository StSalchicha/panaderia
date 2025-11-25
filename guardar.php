<?php
include 'bd.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = floatval($_POST['precio']);
$stock = intval($_POST['stock']);
$id_cat = $_POST['id_cat'];

if ($id_cat == "") {
    $id_cat = null;
}

if (isset($_POST['id_pan']) && $_POST['id_pan'] != "") {
    
    $id = $_POST['id_pan'];
    
    $query = "
        update pan 
        set nombre = $1, descripcion = $2, precio = $3, stock = $4, id_cat = $5 
        where id_pan = $6
    ";
    $datos = [$nombre, $descripcion, $precio, $stock, $id_cat, $id];    
    modificar($query, $datos);
    
} else {

    $query = "
        insert into pan (nombre, descripcion, precio, stock, id_cat) 
        values ($1, $2, $3, $4, $5)
    ";
    $datos = [$nombre, $descripcion, $precio, $stock, $id_cat];    
    insertar($query, $datos);
}

header('Location: index.php');
exit;
?>