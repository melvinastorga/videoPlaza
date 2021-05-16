<?php
error_reporting(0);
$movie_code = $_POST['movie_code'];
$movie_name = $_POST['movie_name'];
$gender = $_POST['gender'];
$spanish = $_POST['spanish'];
$movie_actor = $_POST['movie_actor'];
$movie_director = $_POST['movie_director'];

$test = '';
include('connection.php');

$query ="SELECT * FROM movie where movie_code = '$movie_code'";


$sql = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($sql))
{
    $test = $row["movie_code"];
    $active = $row["active"];
}

echo "El active es $active";

if($test == null || $test == '' || $active==0){

    if($spanish == 'SÍ'){
        $spanish = 1;
    }else if($spanish == 'NO'){
        $spanish = 0;
    }else{
        $spanish = 2;
    }

    

$query = "INSERT INTO movie values (0,'$movie_code','$movie_name', '$gender','$spanish', '$movie_actor', '$movie_director', 1)" ;

$sql = mysqli_query($connection,$query);

  
    
    include("peliculas.php");

  
   echo " <script > ";
   echo " toastr.success('La película $movie_name ha sido insertada correctamente!'); ";
   echo " </script> ";


}else{
   
    include("peliculas.php"); 
    echo "FFF";
   echo " <script > ";
   echo " toastr.error('No se insertó. Ya existe una película con este código'); ";
   echo " </script> ";
}


mysqli_close($connection);

?>


