<?php 
    $errors_fields = array();
    // build array to store err_fields 
?>
  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form :: Admin</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="reg">
    <form  method="POST">
    <label for="name">Name:</label><br>
    <input type="text" name='name' id='name' value="<?=(isset($_POST['name']))? $_POST['name']:'';?>"><br>
    <?php if(in_array('name', $errors_fields)){echo '<span>*Please enter your name</span>';}?>

    <label for="name">Email:</label><br>
    <input type="email" name='email' id='email' value="<?=(isset($_POST['email']))? $_POST['email']:''?>"><br>
    <?php if(in_array('email', $errors_fields)){echo '<span>*Please enter valid email</span>';}?>

    <label for="name">Password:</label><br>
    <input type="password" name='password' id='password'><br><br>
    <?php if(in_array('password', $errors_fields)){echo '<span>*Please enter password at least 6 characters</span>';}?>
    
    <input type="checkbox" name="admin" id="admin" <?=(isset($_POST['admin']))?'checked':''?>/>Admin<br>

    <input type="submit" name='submitbtn' value="Register">

    </form>
    <hr>
    </div> 
</body>
</html>

<?php

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