<?php
    $errors_fields = array(); // build array to store err_fields 
    require('form.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
    //validation
    if(!(isset($_post['name'])) && !empty(isset($_post['name']))){
        $error_fields[0]='name';
    }
    if(!(isset($_post['email'])) && filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
        $error_fields[1]='email';
    }
    if(!(isset($_post['password'])) && strlen($_POST['password']) > 5){
        $error_fields[2] = 'password';
    }

if(!($errors_fields)){

    require 'dbconfig.php';

}
//request variables with special content
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$admin = (isset($_POST['admin']))? 1:0 ;
$password = sha1($_POST['password']);

$query = "INSERT INTO `users`(`name`, `email`, `admin`, `password`)
          VALUES ('$name', '$email', '$admin', '$password')";

if (mysqli_query($conn,$query)){
    echo('New Values are inserted.');
    header('location:list.php');
    exit;
}
else
{
    // echo($query);
    mysqli_error_list($conn);
}
mysqli_close($conn);

}

?>