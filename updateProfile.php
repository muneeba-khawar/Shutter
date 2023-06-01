<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shutter</title>
</head>
<body>
    <?php
    include 'connection.php';
    $conn = db_connection();

    session_start();
    $name=$_SESSION['name'];
    
    $query= "SELECT * FROM `userInfo`";
    $result = $conn->query($query);

if($result->num_rows>0)
{    
    while($row = $result->fetch_assoc())
    {
        if($row['username']=== $name)
        {
           break;
        }
    }
    echo "<table>
    <tr>
    <td> Username: </td> <td>".$row['username']."</td>
    <td> <form action='updateUsername.php' method='POST'> <input type = 'submit' value = 'update' > <input type = 'hidden' value = ".$row['username']." name='username' > </form> </td>
    </tr>
    ";
}

    ?>
    
</body>
</html>