<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Online Shoes | View Users</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
</head>
<body>

<h1 style="text-align: center;">Users</h1>
<table class="striped">
    <thead>
    <tr>
        <th data-field="id">ID</th>
        <th data-field="name">First Name</th>
        <th data-field="price">Last Name</th>
        <th data-field="price">Email</th>
        <th data-field="price">Mobile</th>
        <th data-field="price">Street</th>
        <th data-field="price">Landmark</th>
        <th data-field="price">City</th>
        <th data-field="price">State</th>
        <th data-field="price">Pincode</th>

    </tr>
    </thead>

    <tbody>
    <?php
include('config.php');
$result = $db->prepare("SELECT * FROM tablename ORDER BY id ASC");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
    echo '<tr>
        <td>'.$row['id'] . '</td><td>
        '.$row['firstname'].'
    </td><td>'.$row['lastname'].'</td><td>'.$row['email'].'</td><td>'.$row['mobile'].'</td><td>'.$row['street'].'

    </td><td>'.$row['landmark'].'</td><td>'.$row['city'].'</td><td>'.$row['state'].'</td><td>'.$row['pincode'].'</td></tr>';
    }
    ?>
    </tr>
    </tbody>
</table>

</body>
</html>