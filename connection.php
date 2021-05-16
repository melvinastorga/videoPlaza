<?php

$host = "127.0.0.1";
$dbname = "b70785_lenguajes";
$user = "root";
$password = "VideoPlazaParaiso2021";


$connection = mysqli_connect($host,$user,$password,$dbname) or die("No se pudo conectar a la BD: ".mysqli_connect_error());

mysqli_set_charset($connection,"utf8");



?>