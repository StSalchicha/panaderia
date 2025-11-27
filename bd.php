<?php
    // conexión
    function conectarBD(){
    /*
        $connection = pg_connect("host=localhost port=5432 user=postgres password=madoka dbname=panaderia");
        return $connection;
    */
    $host = getenv('DB_HOST') ?: "localhost";
    $port = getenv('DB_PORT') ?: "5432";
    $user = getenv('DB_USER') ?: "postgres";
    $password = getenv('DB_PASSWORD') ?: "madoka";
    $dbname = getenv('DB_NAME') ?: "panaderia";

    $strCnx = "host=$host port=$port user=$user password=$password dbname=$dbname";
    $connection = pg_connect($strCnx);
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