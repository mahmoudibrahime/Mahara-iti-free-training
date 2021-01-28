<?php
$errors_fields = array();
require ('dbconfig.php');// database connection

if($_SERVER['REQUEST_METHOD']== 'POST'){

    if(!(isset($_POST['name'])) && !empty(isset($_POST['name']))){
        $errors_fields[0]="name";
    }
    if(!(isset($_POST['email'])) && filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
        $errors_fields[1]="email";
    }

    if(!$errors_fields){
  
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = (!(empty($_POST['password']))? sha1($_POST['password']):$row['password']);
        $admin = (isset($_POST['admin']))? 1:0 ;
    }
    // data update
    $query = 
    "UPDATE `users` 
    SET `name`= '$name', `email`='$email', `admin`='$admin', `password`='$password' 
    WHERE `id`= '$id'";

    $result = mysqli_query($conn, $query);  // execute query
 
    if($result){
        header("location:list.php");
        exit;
    }
    else
    {
        // echo $query;   this line for echo ! Notice
       echo mysqli_error($conn);
    }
}
    mysqli_close($conn);

    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahara | Edit User</title>

</head>
<body>
<form action="" method="post">
<!-- note difference here hidden id-->
<input type="hidden" name="id" id="id" value="<?=(isset($row['id']))?$row['id']:''?>">

<label for="name">Name:</label><br>
<input type="text" name="name" id="name" value="<?=(isset($row['name']))?$row['name']:''?>">
<?php if(in_array('name', $errors_fields)) echo'*please enter your name'; ?>
<br>

<label for="email">Email:</label><br>
<input type="email" name="email" id="email" value="<?=(isset($row['email']))?$row['email']:''?>">
<?php if(in_array('email', $errors_fields)) echo '*please enter your email';?>
<br>

<label for="password">Password:</label><br>
<input type="password" name="password" id="password" value="">
<?php if(in_array('', $errors_fields))echo '*please enter your password at least 6 characters';?>
<br>

<input type="checkbox" name="admin" id="admin" <?=(isset($row['admin']))?'checked':'' ?>/>Admin 
<br>

<input type="submit" name="submit" value="Edit User">
</form>
</body>
</html>