<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List | Users</title>
    <link rel="stylesheet" href="styles/bootstrap.css">
</head>
<body>
<div class="container">

<?php require ('dbconfig.php');?>

<h1>Users List</h1>
<hr>
<div class="">
    <form method="get">
        <input type="text" name='keyword' id="" placeholder="Enter {name} or {Email} to search">
        <input type="submit" name="search" value="Search">
    </form>

<table class="table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Admin</th>
            <th scope="col">Edit | Del</th>
        </tr>
    </thead>
    <?php
     //select all
      $query = "SELECT * FROM `users`";

     if( isset($_GET['search']) )
     {
        //select Keyword
        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
        $query = "$query WHERE `name` LIKE '%$keyword%' or `email` like '%$keyword%' ";
     }
        $result = mysqli_query($conn, $query);

     while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td scope="row"> <?=$row['id']?> </td>
            <td> <?=$row['name']?> </td>
            <td> <?=$row['email']?> </td>
            <td> <?=$row['password']?> </td>
            <td style="text-align:center;"> <?=($row['admin']) ?'Yes':'No' ?> </td>
            <td>
                <a href="editpage.php?id=<?=$row['id']?>">Edit</a> | <a href="deluser.php?id=<?=$row['id']?>">Delete</a>
            </td>
        </tr>
     
     <?php   
     }
    ?>
    </tbody>
    <tfoot>
        <td colspan="3" style="text-align:center;"> <?=mysqli_num_rows($result)." "?> Users</td>
        <td colspan="3" style="text-align:center;"><a href="add.php">Add User</td>
    </tfoot>
</table>
</div>
</div>
</body>
</html>

<?php
// don`t forgive to free and close
// mysqli_free_result($result);
mysqli_close($conn);

?>
