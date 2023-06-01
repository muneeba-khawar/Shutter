<?php

include 'connection.php';

session_start();

$username=$_POST['username'];
$pswrd=$_POST['password'];

$_SESSION['name']=$username;

$conn = db_connection();
if(!$conn)
{
   
    header('Location: index.html');
}
else
{
    $query= "SELECT * FROM `userInfo`";
$result = $conn->query($query);

if($result->num_rows>0)
{    
   $flag=0;
    while($row = $result->fetch_assoc())
    {
        if($row['username']=== $username && $row['password']=== $pswrd)
        {
            $flag=1;
            echo "log in successful";
            break;
        }
    }
    if(!$flag)
    {
        echo "<script> 
        alert('incorrect username or password.'); 
   </script>
   <html>
   <a href='index.html'> Click to head back to home page </a>
   </html>
   ";
    }
    else
    {
    header('Location:browsingPage.php');
    }
}
}
$conn->close();
?>