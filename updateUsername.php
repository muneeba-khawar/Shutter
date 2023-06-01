<?php
include 'connection.php';
$conn=db_connection();

$username=$_POST['username'];

echo "
<form method='POST'>
<label for='uname'>Enter new username</label>
<input type='text' name='uname' id='uname' required>
<input type='submit' value='save'>
</form>";

$newusername=$_POST['uname'];
echo $newusername."lol";

$query="UPDATE user SET username=".$_POST['uname']." WHERE  `username`=".$username;
$conn->query($query);

?>