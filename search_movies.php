
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
    <h2 align="center" class="text-primary"><b>Buscar Películas Video Plaza Paraíso<b></h2>
    </div>

  </div>
</div>

<div class="container" style="width: 800px; margin-top: 1px;">
		
    <br>
    <h4 align="center" class="text-primary"><b>Cantidad de películas registradas: <?php echo $count_movies; ?><b></h4>
	
  <br><br>
  <hr>
  <div class="container">
  <div class="row">
  <h3 align="center" class="text-primary"> Puede buscar por nombre, código o actor</h3>
  <br>
  <form class="form-inline my-2 my-lg-0" id="search-form">
            <input type="search" id="search" class="form-control mr-sm-2" placeholder="Busca una película">
            <button class="btn btn-success my-2 my-sm-0" id='btn-search'>Buscar General</button>
        </form>

  </div>
  <br><br>
  <div class="row">

  <table class="table table-bordered table-sm">
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
                <tbody id="movies">

                </tbody>
            </table>

  </div>
  </div>

    <br><br><br>


</div>



<body>
    
<?php
    include("footer.html");
?>


<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<script src="js/movies.js"> </script>


</body>
</html>




</script>