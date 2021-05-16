<?php
error_reporting(0);
$movie_id = $_POST['movie_id'];
$movie_code = $_POST['movie_code'];
$movie_name = $_POST['movie_name'];
$gender = $_POST['gender'];
$spanish = $_POST['spanish'];
$movie_actor = $_POST['movie_actor'];
$movie_director = $_POST['movie_director'];


include('connection.php');

if($spanish == 'SÍ'){
    $spanish = 1;
}else if($spanish == 'NO'){
    $spanish = 0;
}else{
    $spanish = 2;
}

$query = "UPDATE movie set movie_name = '$movie_name', gender = '$gender',
spanish = $spanish, actor = '$movie_actor', director = '$movie_director' WHERE movie_id = $movie_id and movie_code = '$movie_code'";


$sql = mysqli_query($connection,$query);
    
    include("peliculas.php");
    echo " <script > ";
    echo " toastr.success('La película $movie_name ha sido actualizada correctamente!'); ";
    echo " </script> ";

mysqli_close($connection);

?>