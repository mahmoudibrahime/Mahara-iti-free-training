<!-- <?php
$errors_fields = array();
require 'dbconfig.php';
?> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahara | Register Form</title>
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/formstyle.css">
</head>
<body>
      <div class="container regfrm">
        <div>
          <h4 class="pt-3">Fill in To Register</h4> <hr>
        </div>
<form action="add.php" method="post">
  <div class="form-group">
  <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" value="<?=isset($_POST['name'])?$_POST['name']:''?>">
      <?php if(in_array('name', $errors_fields)){echo '<span>*Please enter your name</span>';}?>
   
  </div>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=isset($_POST['email'])?$_POST['email']:'';?>">
    <?php if(in_array('name', $errors_fields)){echo '<span>*Please enter your name</span>';}?>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?=isset($_POST['password'])?$_POST['password']:''?>">
    <?php if(in_array('password', $errors_fields)){echo '<span>*Please enter at least 6 character</span>';}?>

  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="admin" class="form-check-input" id="exampleCheck1" <?=(isset($_POST['admin']))?'checked':''?>/>
    <label class="form-check-label" for="exampleCheck1">Admin</label>
  </div>
  <button type="submit" name="btnsubmit" class="btn btn-primary">Register</button>
</form>
</div>
</body>
</html>

<!-- <?php
if(!$_SERVER['REQUEST_METHOD'] == 'POST'){echo'Requested method problem';}
if (isset($_POST["btnsubmit"])){

    $name = mysqli_escape_string($conn, $_POST["name"]);
    $email = mysqli_escape_string($conn, $_POST["email"]);
    $password = sha1($_POST["password"]);
    $admin = (isset($_POST["admin"]))? 1:0;

    $query = "INSERT INTO `users`(`name`, `email`, `admin`, `password`)
          VALUES ('$name', '$email', '$admin', '$password')";

    if(mysqli_query($conn, $query) )
{
    echo "New values are inserted";
    header('location:list.php');
    exit;
}
else
{
   echo mysqli_error($conn);
}
}
mysqli_close($conn);
?> -->