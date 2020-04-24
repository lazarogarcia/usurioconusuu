<!--Create a  cart.php file and paste the following script 
in the beginning of file.

https://www.allphptricks.com/simple-shopping-cart-using-php-and-mysql/
 -->
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }else{
      session_destroy();
      session_start(); 
    }
$connect = mysqli_connect("localhost", "root", "", "bordados_creativos_bd");
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
} 
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
   
}
?>


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

    <!-- Add the following script in the body section of the  cart.php file. -->
    <div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

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
            <a class="nav-link" href="../Iniciar_sesion/usuario.php">Inicio sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Carrito</a>
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

        <!-- seccion para iniciar sesion -->
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
          <button type="button" id="entrar">Entrar</button>
          <!-- boton para crear cuenta-->
          <a href="../backend/config.php" class="btn btn-success pull-right" id="crear_cuenta" >Crear cuenta</a>
      </div><!-- fin container_2-->  
    </div><!--fin container-->
        
        <script src="" async defer></script>
    </body>
</html>