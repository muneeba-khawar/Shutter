<?php

include 'connection.php';
   $conn= db_connection();

   if($conn)
   {
   session_start();
   $username = $_SESSION['name'];
   $filePath=$_POST['filePath'];
   
   try{
   
   $query = "INSERT INTO `savedPictures` VALUES ('$username', '$filePath')";
   $result = $conn->query($query);
   if($result)
   {
     echo "sucessful";
   }
   else
   {
     echo "unsucessful";
   }
   header("Location:browsingPage.php");
   exit;
   } catch (mysqli_sql_exception $e) {
      if ($e->getCode() == 1062) {
         header("Location:browsingPage.php");
         exit;
      } else {
          echo "Error: " . $e->getMessage();
      }
  }
}
else{
   echo mysqli_error($conn);
}
$conn->close();
?>