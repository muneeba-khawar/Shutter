<?php

include 'connection.php';

$username=$_POST['username'];
$email=$_POST['email'];
$pswrd=$_POST['password'];
$bdate=$_POST['bdate'];

$conn = db_connection();
if($conn)
{
$query= "INSERT INTO `userInfo` VALUES ('$username','$email','$pswrd','$bdate', NULL, NULL)";
$result = mysqli_query($conn, $query);
if($result)
{
echo "user added.<br>";
}
else
{
echo "query unsuccessful<br>";
}
}
else
{
    echo mysqli_error($conn);
}
$conn->close();
?>
