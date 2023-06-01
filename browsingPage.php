<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shutter</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="browsingPageStyle.css">

</head>

<body>

<div id=header>
    <ul>
        <li class="floatLeft" id="logo">
                <img src="pictures/logo.jpg" width="150px" alt="">
            </li>
        <li class="floatLeft" >
            <form action="" id="searchBarForm" method="post">
                <input type="text" name="searchBar" id="searchBar" placeholder="Search">
                <button type="submit" id="searchbtn">
                    <img src="pictures/searchIcon.png" alt="">
                </button>
            </form>
        </li>
        <li class="floatRight">
          <form action='logout.php' method ='post' id='logoutForm'>
          <button type='submit' name='Logout' id='logOutbtn' class='btn' >Logout</button>
          </form>
        </li>
        <li class="floatRight">
           <a href="profile.php" id="profileIcon">
           <img src="pictures/profileIcon.png" alt="" >
           </a>
        </li>
    </ul>


</div>
<div class='topFeedLine'> </div>
   <?php
   include 'connection.php';
   $conn= db_connection();

   if($conn)
   {
   session_start();
   $username = $_SESSION['name'];
   
   if(isset($_POST['searchBar']) && $_POST['searchBar']!=NULL)
   {
    $query = "SELECT * FROM `userPictures`";
    $result = $conn->query($query);
    if($result->num_rows>0)
    {
     echo "<div class='container'>";
     
     while($row=$result->fetch_assoc())
     {
        $pattern="/".$_POST['searchBar']."/i";
        // echo "<script>console.log('".$pattern." ".$row['tag']."');</script>";
        if(preg_match($pattern, $row['tag']))
        {
         echo "<div> <img class='feedPicture' src='".$row['filePath']."' alt=''>
         <img class='savePicturebtn' src='pictures/saveIcon.png' alt='' data-filePath='".$row['filePath']."' onclick='savePicture(this)'>
         </div>";
        }
     }
     echo "</div>";
    }

   }
   else
   {
   $query = "SELECT `filePath` FROM `userPictures`";
   $result = $conn->query($query);
   if($result->num_rows>0)
   {
    echo "<div class='container'>";
    while($row=$result->fetch_assoc())
    {
        echo "<div> <img class='feedPicture' src='".$row['filePath']."' alt=''>
        <img class='savePicturebtn' src='pictures/saveIcon.png' alt='' data-filePath='".$row['filePath']."' onclick='savePicture(this)'>
        </div>";
    }
    echo "</div>";
   }
}
 
   }
   else{
    echo mysqli_error($conn);
   }
   $conn->close();
   ?>

<script>
    function savePicture(element)
    {
        let filePath = element.getAttribute("data-filePath");
        let form = document.createElement('form');
        form.action= "savePicture.php";
        form.method= "post";

        let input = document.createElement('input');
        input.type = "hidden";
        input.name = "filePath"
        input.value= filePath;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }
</script>


</body>

</html>