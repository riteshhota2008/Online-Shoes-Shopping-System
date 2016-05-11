<?php
//let's start the session
//session_start();
//$street = $_POST['street'];
//$landmark = $_POST['landmark'];
//$city = $_POST['city'];
//$pincode = $_POST['pincode'];

//$_SESSION['street'] = $street;
//$_SESSION['landmark'] = $landmark;
//$_SESSION['city'] = $city;
//$_SESSION['pincode'] = $pincode;

if(isset($_POST["submit"])){
    $hostname='localhost';
    $username='root';//username
    $password='password';//password

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=databasename",$username,$password);//replace dbname with actual database name

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
        $sql = "INSERT INTO users (street, landmark, city, pincode)
VALUES ('".$_POST["street"]."','".$_POST["landmark"]."','".$_POST["city"]."','".$_POST["pincode"]."')";
        if ($dbh->query($sql))
        {
            echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
        }
        else

            echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
           


$dbh = null;
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

       
    <!-- Contact Form -->

    <link rel="stylesheet" href="contact-form/css/style.css">

    <!-- Contact Form end -->

        <title>Online Shopping</title>
</head>
<body>


<main style="background-color: #ffffff">

    <form class="cd-form floating-labels" method="post" action="">
        <fieldset>
            <legend>Delivery Address:</legend>

            <!--   <div class="error-message">
                   <p>Please enter a valid email address</p>
               </div>  -->

            <div class="icon">
                <label class="cd-label" for="cd-textarea"></label>
                <textarea class="message" placeholder="Street Address" name="street" id="cd-textarea" required></textarea>
            </div>

            <div class="icon">
                <label class="cd-label" for="cd-company">Landmark</label>
                <input class="company" type="text" name="landmark" id="cd-company">
            </div>

            <div class="icon">
                <label class="cd-label" for="cd-company">City</label>
                <input class="company" type="text" name="city" id="cd-company">
            </div>

            <div>
                <h4>State</h4>

                <p class="cd-select icon">
                    <select class="budget">
                        <option value='Andhra Pradesh'>Andhra Pradesh</option>
                        <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                        <option value='Assam'>Assam</option>
                        <option value='Bihar'>Bihar</option>
                        <option value='Chandigarh'>Chandigarh</option>
                        <option value='Chhattisgarh'>Chhattisgarh</option>
                        <option value='Delhi'>Delhi</option>
                        <option value='Goa'>Goa</option>
                        <option value='Gujarat'>Gujarat</option>
                        <option value='Haryana'>Haryana</option>
                        <option value='Himachal Pradesh'>Himachal Pradesh</option>
                        <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                        <option value='Jharkhand'>Jharkhand</option>
                        <option value='Karnataka'>Karnataka</option>
                        <option value='Kerala'>Kerala</option>
                        <option value='Madhya Pradesh'>Madhya Pradesh</option>
                        <option value='Maharashtra'>Maharashtra</option>
                        <option value='Manipur'>Manipur</option>
                        <option value='Meghalaya'>Meghalaya</option>
                        <option value='Mizoram'>Mizoram</option>
                        <option value='Nagaland'>Nagaland</option>
                        <option value='Odisha'>Odisha</option>
                        <option value='Puducherry'>Puducherry</option>
                        <option value='Punjab'>Punjab</option>
                        <option value='Rajasthan'>Rajasthan</option>
                        <option value='Sikkim'>Sikkim</option>
                        <option value='Tamil Nadu'>Tamil Nadu</option>
                        <option value='Telengana'>Telengana</option>
                        <option value='Tripura'>Tripura</option>
                        <option value='Uttar Pradesh'>Uttar Pradesh</option>
                        <option value='Uttarakhand'>Uttarakhand</option>
                        <option value='West Bengal'>West Bengal</option>
                    </select>
                </p>
            </div>

            <div class="icon">
                <label class="cd-label" for="cd-company">Pincode</label>
                <input class="company" type="text" name="pincode" id="cd-company">
            </div>

        </fieldset>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

    

</main>


    <!--<p class="cd-go-to-cart"><a href="#0">Go to cart page</a></p>-->
</div> <!-- cd-cart -->

<script src="contact-form/js/main.js"></script> <!-- Contact Form -->
</body>
</html>