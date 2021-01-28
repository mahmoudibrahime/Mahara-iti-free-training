<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahara | db View</title>
  <link rel="stylesheet" href="styles/bootstrap.css">
  
</head>
<body>
  <div class="container">
    
  <?php

require 'dbconfig.php';
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if(!$result) { echo mysqli_error($result); }

while($row = mysqli_fetch_assoc($result))
{
   echo "# :".$row['id']."<br>";
   echo "Name :".$row['name']."<br>";
   echo "email :".$row['email']."<br>";
   echo "password : ".$row['password']."<br>";
   echo str_repeat('*', 50)."<br>";
}

mysqli_free_result($result);
mysqli_close($conn);

?>

  </div>
</body>
</html>