<?php
error_reporting(0);
$movie_id = $_GET['movie_id'];

include('connection.php');

if($movie_id != null || $movie_id != ''){

$query = "UPDATE movie set active = 0 where movie_id = $movie_id";

$sql = mysqli_query($connection,$query);


include("peliculas.php");
    echo " <script > ";
    echo " toastr.success('La película con ID $movie_id ha sido eliminada correctamente!'); ";
    echo " </script> ";

}else{
    include("clientes.php");
    echo " <script > ";
    echo " toastr.warning('Elija una película para eliminar!'); ";
    echo " </script> ";
}

mysqli_close($connection);
?>