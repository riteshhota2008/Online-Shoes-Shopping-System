<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Online Shoes | Add Products</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
</head>
<body>

<h1 style="text-align: center;">Add Products</h1>
<div class="row">
    <form class="col s12"  method="post">
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="Product Name" name="product_name" id="product_name" type="text" class="validate">
                <label for="product_name"></label>
            </div>
            <div class="input-field col s12">
                <input placeholder="Pattern" name="product_size" id="product_size" type="text" class="validate">
                <label for="product_size"></label>
            </div>
            <div class="input-field col s12">
                <input placeholder="Occasion" name="product_price" id="product_prize" type="text" class="validate">
                <label for="product_prize"></label>
            </div>
            
        </div>
        <br>
        <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-left: 44%">Submit
            <i class="material-icons right">send</i>
        </button>

    </form>
</div>


<?php
require("config.php");
if(isset($_POST["submit"])){


    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=actualdatabasename",$username,$password);//replace dbname with actual database name

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO shoes(product_name,product_size,product_price)
VALUES ('".$_POST["product_name"]."','".$_POST["product_size"]."','".$_POST["product_price"]."')";
if ($dbh->query($sql)) {
header("Location: ../index.html");
}
else{
header("Location: ../index.html");
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>



</body>
</html>