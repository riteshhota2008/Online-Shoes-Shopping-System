<?php
require("config.php");
if(!empty($_POST))
{
    // Ensure that the user fills out fields
    if(empty($_POST['firstname']))
    { die("Please enter your First Name."); }
    if(empty($_POST['lastname']))
    { die("Please enter your Last Name."); }
    if(empty($_POST['mobile']))
    { die("Please enter your Mobile Number."); }
    if(empty($_POST['password']))
    { die("Please enter a password."); }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    { die("Invalid E-Mail Address"); }

    //

    $query = "
            SELECT
                1
            FROM users
            WHERE
                firstname = :firstname
        ";
    $query_params = array( ':firstname' => $_POST['firstname'] );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $row = $stmt->fetch();
//    if($row){ die("This username is already in use"); }

    //

    $query = "
            SELECT
                1
            FROM users
            WHERE
                lastname = :lastname
        ";
    $query_params = array( ':lastname' => $_POST['lastname'] );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $row = $stmt->fetch();
//    if($row){ die("This username is already in use"); }

    $query = "
            SELECT
                1
            FROM users
            WHERE
                email = :email
        ";
    $query_params = array(
        ':email' => $_POST['email']
    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());}
    $row = $stmt->fetch();
    if($row){ die("This email address is already registered"); }

    //

    $query = "
            SELECT
                1
            FROM users
            WHERE
                mobile = :mobile
        ";
    $query_params = array( ':mobile' => $_POST['mobile'] );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    $row = $stmt->fetch();
//    if($row){ die("This username is already in use"); }



//    if($row){ die("This username is already in use"); }

    // Add row to database
    $query = "
            INSERT INTO users (
                firstname,
                lastname,
                email,
                mobile,
                password,
                salt

            ) VALUES (
                :firstname,
                :lastname,
                :email,
                :mobile,
                :password,
                :salt
            )
        ";

    // Security measures
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    $password = hash('sha256', $_POST['password'] . $salt);
    for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
    $query_params = array(
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':email' => $_POST['email'],
        ':mobile' => $_POST['mobile'],
        ':password' => $password,
        ':salt' => $salt
    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
    header("Location: ../product-delivery.php");
    die("Redirecting to ../product-delivery.php");
}
?>