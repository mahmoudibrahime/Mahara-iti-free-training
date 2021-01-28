<?php
     $errors_fields = array(); 
     require 'dbconfig.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahara | Register Form</title>
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" /><body>

<div id="regfrm">
      <div class="container">

        <div>
        <div class="regclose">
          <i class="fas fa-times" onclick="regfrmclose()"></i>
        </div>

        <h4 class="pt-3">Registration Form</h4> <hr>
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
    <?php if(in_array('password', $errors_fields)){echo '<span>*Please enter at least 6 characters</span>';}?>
    <small id="passwordHelp" class="form-text text-muted">Please enter password minimum of 6 characters</small>

  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="admin" class="form-check-input" id="exampleCheck1" <?=(isset($_POST['admin']))?'checked':''?>/>
    <label class="form-check-label" for="exampleCheck1">Admin</label>
  </div>
  <button type="submit" name="btnsubmit" class="btn btn-primary">Register</button>
     </form>
   </div>
</div>
<script>
  let regfrm = document.getElementById('regfrm');
  function regfrmclose(){
    regfrm.style.display = 'none';
  }
</script>
</body>
</html>