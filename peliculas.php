
<?php

if (isset($_POST['gender_table'])){
  $gender_table = $_POST['gender_table'];
}else{
$gender_table = "ACCIÓN";
}
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
  <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<?php
    include("menu.html");
    error_reporting(0);
    include("connection.php");
    $count_movies = 0;
    
  $result = mysqli_query($connection, "SELECT COUNT(*) AS count FROM movie where active = 1");
  $row = mysqli_fetch_array($result);
  $count_movies = $row['count'];
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-3">
      <img src="img/logo_video.png">
    </div>
    <div class="col-md-9 contenedor">
    <h2 align="center" class="text-primary"><b>Películas Video Plaza Paraíso<b></h2>
    </div>

  </div>
</div>

<div class="container" style="width: 800px; margin-top: 10px;">
		
    <br>
    <h4 align="center" class="text-primary"><b>Cantidad de películas registradas: <?php echo $count_movies; ?><b></h4>
		<br>
    <a class="btn btn-success text-light" data-toggle="modal" data-target="#modal_new_movie"><b>Nueva Película</b></a><br><br>
		<br>

    <div class='container'>
     
          <div class='container'>
        
        <form action="peliculas.php" method="POST">
        
        <div class="form-group  m-auto pr-auto" style="display: inline-block">
        <div class="form-group">
    <label for="gender">Género</label>
    <select class="form-control" name="gender_table">

      <option>BLU RAY</option>
      <option>COMEDIA</option>
      <option>SERIE</option>
      <option>DRAMA</option>
      <option>CIENCIA FICCIÓN</option>
      <option>TERROR</option>
      <option>INFANTIL</option>
      <option>ACCIÓN</option>
      <option>SUSPENSO</option>
      <option>NAVIDAD</option>
      <option>RELIGIOSA</option>
    </select>
  </div>
    </div>

    <div class="form-group" style="display: inline-block">
            <input type="submit" class="btn btn-success" value="Cambiar">
        </div>

    </form>
        </div>

        <div class="row">
             <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                
                <th class="text-primary">Código</th>
                <th class="text-primary">Nombre</th>
                <th class="text-primary">Género</th>
                <th class="text-primary">Español</th>
                <th class="text-primary">Actor</th>
                <th class="text-primary">Director</th>
                <th class="text-primary">Editar</th>
                <th class="text-primary">Eliminar</th>
                
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      
                  $query ="SELECT * FROM movie where active = 1 and gender = '$gender_table'";
                  $sql = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
            <tr>
                
                <td> <a href="movie_viewers.php?movie_id=<?php echo $row['movie_id']; ?>&movie_name=<?php echo $row['movie_name']; ?>"> <?php echo $row["movie_code"];?> </a></td>
                <td><?php echo $row["movie_name"];?></td>
                <td><?php echo $row["gender"];?></td>
               <td>
               <?php
                if( $row["spanish"] == 0){
                    echo "NO";
                }else if($row["spanish"] == 1){
                    echo "SÍ";
                }else{
                  echo "SIN REVISAR";
                }
                ?>
                </td>
                <td><?php echo $row["actor"];?></td>
                <td><?php echo $row["director"];?></td>
                <td><a href="update_movie1.php?movie_id=<?php echo $row['movie_id']; ?>&movie_code=<?php echo $row['movie_code']; ?>&movie_name=<?php echo $row['movie_name']; ?>&movie_gender=<?php echo $row['gender']; ?>&movie_spanish=<?php echo $row['spanish']; ?>&movie_actor=<?php echo $row['actor']; ?>&movie_director=<?php echo $row["director"];?>" class="btn btn-info">EDITAR</a> </td>
                <td><a href="delete_movie.php?movie_id=<?php echo $row['movie_id'];?>" class="btn btn-danger" onClick="return confirm('Seguro que quiere eliminar la película?')">ELIMINAR</a></td>
            </tr>
            <?php } ?>
            
        </tbody>
        
    </table>

		</div>
	</div>
 

    <br><br><br>

<div class="modal fade" id="modal_new_movie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Nueva Película</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insert_movie.php" method="POST">
            
      <div class="form-group">
            <input required type="text" placeholder="Digite el código" class="form-control" name="movie_code" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="text" placeholder="Digite el nombre" class="form-control" name="movie_name" autocomplete="off">
        </div>
        <div class="form-group">
    <label for="gender">Género</label>
    <select class="form-control" name="gender">

      <option>BLU RAY</option>
      <option>COMEDIA</option>
      <option>SERIE</option>
      <option>DRAMA</option>
      <option>CIENCIA FICCIÓN</option>
      <option>TERROR</option>
      <option>INFANTIL</option>
      <option>ACCIÓN</option>
      <option>SUSPENSO</option>
      <option>NAVIDAD</option>
      <option>RELIGIOSA</option>
    </select>
  </div>
  <div class="form-group">
    <label for="spanish">¿En español?</label>
    <select class="form-control" name="spanish">
    
      <option>SIN REVISAR</option>
      <option>SÍ</option>
      <option>NO</option>
    </select>
  </div>
  <div class="form-group">
            <input type="text" placeholder="Digite el actor principal" class="form-control" name="movie_actor" autocomplete="off">
            <input type="text" placeholder="Digite el director" class="form-control" name="movie_director" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Registrar Película">
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
</div>

<body>
    
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
    $('#example').DataTable({
      "language": {
            "lengthMenu": "Presentando _MENU_ registros por página",
            "zeroRecords": "Sin resultados - lo siento",
            "info": "Presentando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            "paginate":{
              "next": "Siguiente",
              "previous": "Anterior"
            }
        }
      });
} );
</script>

</body>
</html>