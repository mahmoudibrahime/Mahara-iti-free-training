<?php
session_start(); //session start

if($_SERVER['REQUEST_METHOD'] == $_POST){ //method validation

    require 'dbconfig.php';
 }

if (isset($_SESSION['id'])){
   echo '<p>Welcome, '.$_SESSION['email'].'<a href="list.php">Logout</a></p>';
}

if(isset($_POST['submitbtn'])){

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = sha1($_POST['password']);
$query = "SELECT * FROM `users` WHERE `email` = '$email' and `password` = '$password'";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
$_SESSION['id'] = $row['id'];
$_SESSION['password'] = $row['password'];
$_SESSION['email'] = $row['email'];

if($_SESSION['email'] == $email && $_SESSION['password'] == $password)
    {
      header("location:list.php");
      exit;
    }
else
   {
       $error = 'Invalid User Name or Email';
   }
}

mysqli_free_result($result);
mysqli_close($conn);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | First Page</title>
    <style>
    body{
    background-color:whitesmoke; 
    height:auto;
    display:flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    }
    .center{
        width:400px;
        height:300px;
    }
    </style>
</head>
<body>
    <div class="center">
        <?php    if(isset($error)){echo $error;}  ?>

    <form action="" method="post">
        <label for="email">Email</label><br>
        <input type="email" name='email' id="email" value="<?=(isset($_POST['email']))? $_POST['email']:''?>"><br>

        <label for="password">Password</label><br>
        <input type="password" name='password' id="password"><br><br>

        <input type="submit" name="submitbtn" value="Log In">
    </form>
    </div>
</body>
</html>