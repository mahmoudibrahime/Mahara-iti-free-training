<?php
$errors_fields = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Validation

if ( !(isset($_POST['name'])) && !empty(isset($_POST['name']))){
    $errors_fields[0] = 'name';
}
if ( !(isset($_POST['email'])) && filter_input(INPUT_POST, $_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors_fields[1] = 'email';
}
if ( !(isset($_POST['password'])) && strlen($_POST['password'] > 5 )){
    $errors_fields[2] = 'password';
}

if(!$errors_fields){
header("location: form.php?errors_fields=".implode(', ',$errors_fields));
exit;
}
else
{
    require ('dbconfig.php');
}

if (isset($_POST['submitbtn'])){

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$admin = (isset($_POST['admin']))? 1:0 ;
$password = sha1($_POST['password']);

$query = "INSERT INTO `users`(`name`, `email`, `admin`, `password`)
          VALUES ('$name', '$email', '$admin', '$password')";
$result = mysqli_query($conn, $query);

if ($result){
    echo('New Values are inserted.');
    header('location:list.php');
    exit;
}
else
{
    echo($query);
    echo mysqli_error($conn);
}
}
}
mysqli_free_result($result);

// close the connection
mysqli_close($conn);

?>