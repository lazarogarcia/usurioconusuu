<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]--><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<!-- ajustes extra del CSS -->
<link href="../css/bootstrap_css_extra.css" rel="stylesheet" type="text/css">

<!-- CNN de bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <!-- CDN de bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script type="text/javascript" rel="stylesheet" src="js/bootstrap.min.js"></script> 

</head>

<body>
<!--[if lt IE 7]>
  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
 

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../inicio.html">
    <img src = "../recursos/iconos/logo_transparente_icono.png" width="35" height="35" alt="">
    Bordados Creativos</a>

  <!-- Despliega el boton del menu -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          Inicio <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../servicios.html">Servicios y productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contacto.html">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">(current)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../carrito/carrito.php">Carrito</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
<!-- FIN DE NAVBAR -->

<div class="container" >
  <div class="container_2">

    <div class="row justify-content-center">
        <div class="col-sm-4" >
            Usuario
        </div>
        <div class="col-sm-4">
            <input type="text" id="fname" name="fname">
        </div>
      </div> 
  
      <div class="row justify-content-center">
        <div class="col-sm-4" id="icono_div" >
          Contraseña
        </div>
        <div class="col-sm-4">
            <input type="text" id="fname" name="fname">
        </div>
      </div> 

      <div class="row justify-content-center">
        <div class="col-sm-4" id="icono_div" >
          Confirmar Contraseña
        </div>
        <div class="col-sm-4">
            <input type="text" id="fname" name="fname">
        </div>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-sm-4" id="icono_div" >
          ID
        </div>
        <div class="col-sm-4">
            <input type="text" id="fname" name="fname">
        </div>
      </div> 
      <!--TODO: cambiar estilo de boton -->
      <a href="enter.php" id="entrar">Editar</button>
      <a href="create.php" id="crear_cuenta" >Crear cuenta </a  ><!-- fin de boton para iniciar sesion-->
        <!-- boilerplate de inicio de sesion-->

        <?php
                    // Include config file
                    require_once "../backend/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM usuarios";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>ID</th>";
                                        echo "<th>Contrasena</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Nombre'] . "</td>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['Contrasena'] . "</td>";
                                        echo "<td>";
                                          /* Read, Update, Delete */
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
        <a href="crear.php" id="crear_cuenta" >Eliminar Cuenta </a  ><!-- fin de boton para iniciar sesion-->
  </div><!-- fin container_2-->  
</div><!--fin container-->
    
    <script src="" async defer></script>
</body>
</html>