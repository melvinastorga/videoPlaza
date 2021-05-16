<?php
error_reporting(0);
$movie_id = $_GET['movie_id'];
$movie_code = $_GET['movie_code'];
$movie_name = $_GET['movie_name'];
$movie_gender = $_GET['movie_gender'];
$movie_spanish = $_GET['movie_spanish'];
$movie_actor = $_GET['movie_actor'];
$movie_director = $_GET['movie_director'];


    echo " <script > ";
    echo " toastr.success('Ya puede modificar los datos de $movie_name'); ";
    echo " </script> ";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas Video Plaza Paraíso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<?php
    include("menu.html");
?>
<body>

<div class="container p-4">
  <div class="row">
    <div class="col-md-3">
      <img src="img/logo_video.png">
    </div>
    <div class="col-md-9 contenedor">
    <h2 align="center" class="text-primary"><b>Editar Películas Video Plaza Paraíso<b></h2>
    </div>
  </div>
</div>

<div class="container" style="width: 800px; margin-top: 10px;">
		
		
    <form action="update_movie2.php" method="POST">

    <?php         
       echo " <div class='form-group'> ";
       echo "     <label for='movie_id'>ID:</label> ";
       echo "         <input required type='text' placeholder='Digite el ID' class='form-control' name='movie_id' autocomplete='off' readonly value='$movie_id'>  ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='movie_code'>Código:</label> ";
       echo "         <input required type='text' placeholder='Digite el código' class='form-control' name='movie_code' autocomplete='off' readonly value='$movie_code'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='movie_name'>Nombre:</label> ";
       echo "         <input required type='text' placeholder='Digite el nombre' class='form-control' name='movie_name' autocomplete='off' value='$movie_name'> ";
       echo "     </div> ";
       
    echo "  <div class='form-group'> ";
    echo "  <label for='gender'>Género</label> ";
    echo "  <select class='form-control' name='gender'> ";
    ?>
    <option <?php if($movie_gender == 'BLU RAY'){echo('selected');}?>>BLU RAY</option>
    <option <?php if($movie_gender == 'ACCIÓN'){echo('selected');}?>>ACCIÓN</option>
    <option <?php if($movie_gender == 'COMEDIA'){echo('selected');}?>>COMEDIA</option>
    <option <?php if($movie_gender == 'INFANTIL'){echo('selected');}?>>INFANTIL</option> ";
    <option <?php if($movie_gender == 'CIENCIA FICCIÓN'){echo('selected');}?>>CIENCIA FICCIÓN</option>
    <option <?php if($movie_gender == 'DRAMA'){echo('selected');}?>>DRAMA</option>
    <option <?php if($movie_gender == 'TERROR'){echo('selected');}?>>TERROR</option>
    <option <?php if($movie_gender == 'SUSPENSO'){echo('selected');}?>>SUSPENSO</option>
    <option <?php if($movie_gender == 'NAVIDAD'){echo('selected');}?>>NAVIDAD</option>
    <option <?php if($movie_gender == 'SERIE'){echo('selected');}?>>SERIE</option>
    </select> 
    </div> 
     <div class='form-group'> 
    <label for='spanish'>¿En español?</label>
    <select class='form-control' name='spanish'>
    <option  <?php if($movie_spanish == 1){echo('selected');}?>>SÍ</option>
    <option  <?php if($movie_spanish == 0){echo('selected');}?>>NO</option>
    <option  <?php if($movie_spanish == 2){echo('selected');}?>>SIN REVISAR</option>
    </select>
    </div>
    <?php
       echo "     <div class='form-group'> ";
       echo "     <label for='movie_actor'>Actor:</label> ";
       echo "         <input  type='text' placeholder='Digite el actor' class='form-control' name='movie_actor' autocomplete='off' value='$movie_actor'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='movie_director'>Director:</label> ";
       echo "         <input  type='text' placeholder='Digite el director' class='form-control' name='movie_director' autocomplete='off' value='$movie_director'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "         <input type='submit' class='btn btn-success' value='Editar Película'> ";
       echo "     </div> ";
            ?>
            </form>

</div>




</body>
    
<?php
    include("footer.html");
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="customer.js"></script>

</html>