<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahara | db View</title>
  <style>
  .bg
  {
    width:32%;
    height:auto;
    background-color:whitesmoke;
  }
  </style>
</head>
<body>
  <div class="bg">
    
  <?php
require 'dbconfig.php';
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if($result){
while($row = mysqli_fetch_assoc($result)){
   echo "# :".$row['id']."<br>";
   echo "Name :".$row['name']."<br>";
   echo "email :".$row['email']."<br>";
   echo "password : ".$row['password']."<br>";
   echo str_repeat('*', 50)."<br>";
     }
}
else { echo mysqli_error($result); }

mysqli_free_result($result);
mysqli_close($conn);
?>

  </div>
</body>
</html>