<?php

require 'dbconfig.php';//connect to database

//select user
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
$query = "DELETE FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);

if($result){
   header('location:list.php');
   exit;
}
else
{
    echo mysqli_error($conn);
}
// mysqli_free_result($result);  // free mysqli
mysqli_close($conn);
?>