<?php
    // conexión
    function conectarBD(){
        $connection = pg_connect("host=localhost port=5432 user=postgres password=madoka dbname=panaderia");
        return $connection;
    }

    // insertar
    function insertar($query, $datos){
        $connection = conectarBD();
        $prepare = pg_prepare($connection, "insert", $query);
        $result = pg_execute($connection, "insert", $datos);
        pg_close($connection);
        return $result;
    }

    // eliminar
    function eliminar($query, $datos){
        $connection = conectarBD();
        $prepare = pg_prepare($connection, "delete", $query);
        $result = pg_execute($connection, "delete", $datos);
        pg_close($connection);
        return $result;
    }

    // modificar
    function modificar($query, $datos){
        $connection = conectarBD();
        $prepare = pg_prepare($connection, "update", $query);
        $result = pg_execute($connection, "update", $datos);        
        pg_close($connection);
        return $result;
    }

    // seleccionar (corregida para que devuelva datos)
    function seleccionar($query, $datos){
        $connection = conectarBD();
        $prepare = pg_prepare($connection, "select", $query);
        $result = pg_execute($connection, "select", $datos);     
        
        $data = pg_fetch_all($result); // convierte el resultado en array
        
        pg_close($connection);
        
        return $data; // devuelve el array
    }
?>