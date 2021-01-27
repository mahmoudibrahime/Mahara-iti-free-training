<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List | Users</title>
</head>
<body>

<h1>Users List</h1>
<div class="">
    <form method="get">
        <input type="text" name='keyword' id="" placeholder="Enter {name} or {Email} to search">
        <input type="submit" value="Search">
    </form>
</div>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Admin</th>
        </tr>
    </thead>
    <?php
     require ('dbconfig.php');
     //select all
      $query = "SELECT * FROM `users`";
     if(isset($_GET['keyword']))
     {
        //select Keyword
        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
        $query = "$query WHERE `name` LIKE '%$keyword%' or `email` like '%$keyword%";
     }
        $result = mysqli_query($conn, $query);
        if ($result){
     while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['password']?></td>
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
        <td colspan="2" style="text-align:center;"><a href="add.php">Add User</td>
    </tfoot>
</table>
</body>
</html>
<?php
// don`t forgive to free and close
mysqli_free_result($result);
mysqli_close($conn);
    }
    else{
         echo "Result not found.";
    }
?>
