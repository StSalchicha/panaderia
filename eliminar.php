<?php
include 'bd.php';

$id = $_GET['id'];
$query = "delete from pan where id_pan = $1";
$datos = [$id];
eliminar($query, $datos);

header('Location: index.php');
exit;
?>