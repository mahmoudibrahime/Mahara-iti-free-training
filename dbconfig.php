<?php
$conn = mysqli_connect('localhost', 'root', '', 'alahram');
if(! $conn)
{
    die("Connection Error".mysqli_connect_error($conn));
}
    else
{
    echo "<mark>connected to database</mark><br>";
}
?>
<script src="scripts/console.js"></script>