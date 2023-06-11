<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Source+Sans+Pro&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="profileStyle.css">
    <title>Profile</title>
</head>
<body>

<?php
    include "connection.php";
    session_start();
    $username=$_SESSION['name'];
    $conn=db_connection();
    if(!$conn)
{
    header('Location: index.html');
}


$query3="SELECT `profilePicture` FROM `userInfo` WHERE `username`='$username'";
$result3=$conn->query($query3);
if($result3)
{
    $row=$result3->fetch_assoc();
    if($row['profilePicture']!==NULL)
    echo "<div id='topdiv'> <img id='profilePicture' src='".$row['profilePicture']."' alt=''>";
    else
    echo "<div id='topdiv'> <img id='profilePicture' src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' alt=''>";
}

echo " <h2 id='username'>".$username."</h2> 
<form action='logout.php' method ='post' id='logoutForm'>
<button type='submit' name='Logout' id='logOutbtn' class='btn' >Logout</button>
</form>
</div> ";


$query4="SELECT `about` FROM `userInfo` WHERE `username`='$username'";
$result4=$conn->query($query4);
if($result4)
{
    $row=$result4->fetch_assoc();
    if($row['about']!==NULL)
    {
        echo "<div id='about'>".$row['about']."</div>";
    }
}
if(isset($_POST['aboutText']))
{
    $aboutText=$_POST['aboutText'];
    $queryAbout="UPDATE `userInfo` SET `about`='$aboutText' WHERE `username`='$username'";
    $resultAbout=$conn->query($queryAbout);
    if($resultAbout)
    header("Location:profile.php");

}




if(isset($_FILES['profilePicture']))
{
    $filename = $_FILES["profilePicture"]["name"];
    $tmp_name =  $_FILES["profilePicture"]["tmp_name"];
    $fileType = $_FILES["profilePicture"]["type"];
    $fpath="uploadedPictures/".$filename;
    move_uploaded_file($tmp_name,$fpath);

    $extension = pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION);

    if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='JPG' || $extension=='JPEG')
    {
        $query="UPDATE `userInfo` SET `profilePicture`='$fpath' WHERE `username`='$username'";
        $result=$conn->query($query);
        if(!$result)
        {
            echo "<script>
            alert('Profile Picture updated successfully.');
            </script>";
        }
        else{
            header("Location:profile.php");
        }
    
    }
    else
    {
        echo "<script>
        alert('File is not image. Profile Picture not updated.');
        </script>";
    }
}


if(isset($_FILES['uploadedPicture']))
{
$tag=$_POST['tag'];

    $filename = $_FILES["uploadedPicture"]["name"];
    $tmp_name =  $_FILES["uploadedPicture"]["tmp_name"];
    $fileType = $_FILES["uploadedPicture"]["type"];
    $fpath="uploadedPictures/".$filename;
    move_uploaded_file($tmp_name,$fpath);

    $extension = pathinfo($_FILES["uploadedPicture"]["name"], PATHINFO_EXTENSION);

    if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='JPG')
    {
        $query="INSERT INTO `userPictures` VALUES ('$username', '$fpath','$tag')";
        $result=$conn->query($query);
        if($result)
        {
            echo "<script>
alert('Image uploaded successfully.');
</script>";
        }
        else{
            echo "image upload unsuccessful.\n";
        }
    
    }
    else
    {

echo "<script>
alert('File is not image. Picture not uploaded.');
</script>";
    }

}

echo
"
<button id='aboutbtn' class='btn' onclick='addAbout()'>Edit About</button>
<form action='' method='post' id=aboutform autocomplete='off' >
</form>
<br>

<button id='editProfilePicturebtn' class='btn' onclick='addProfilePicture()'>Edit Profile Picture</button>
<form action='' method='post' id=profilePictureform enctype='multipart/form-data' autocomplete='off' >
</form>

<div class='menu'>
<a id='feed' href='#' onclick=\"showSection('feedSection')\">Feed</a>
<a id='saved' href='#' onclick=\"showSection('savedSection')\">Saved</a>
</div>
";

echo "<div class='topFeedLine'> </div>";
echo "<div class='section active' id='feedSection'> ";
$query2="SELECT `filePath` FROM `userpictures` WHERE `username` = '$username'";
$result2=$conn->query($query2);
if($result2->num_rows>0)
{
    echo "<div class='container'>";
    while($row=$result2->fetch_assoc())
    {
        echo "<div> <img class='feedPicture' src='".$row['filePath']."' alt=''>
        </div>";
    }
    echo "</div> ";
}

?>
<button id='postFeedPicturebtn' class='btn' onclick='addFeedPicturePicture()'>Share Photo</button>
<form action="" method="post" id="feedPictureForm" enctype="multipart/form-data" autocomplete="off">
</form>

</div>

<div class="section" id="savedSection">
<?php
$query5 = "SELECT `filePath` FROM `savedpictures` WHERE `username` = '$username'";
$result5 = $conn->query($query5);
if($result5->num_rows>0)
{
    echo "<div class='container'>";
    while($row=$result5->fetch_assoc())
    {
        echo "<div> <img class='feedPicture' src='".$row['filePath']."' alt=''>
        </div>";
    }
    echo "</div> ";
}
?>
</div>

<script src="profile.js" > </script>


</body>
</html>

