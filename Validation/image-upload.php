<?php
require_once 'config.php';
if (isset($_POST['submit'])) {
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];
    $tar_dir = "uploads/";
    $folder = $tar_dir . $name;
    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $file_format = ['png', 'jpg', 'jpeg'];
    // Validate if file empty 
    if (!empty($_FILES['image']['name'] && $_FILES['image']['error'] == 0)) {
        echo "<img src='$folder' width='100' height='100'>";
        // Validate already exist
        if (!file_exists($folder)) {
            // Validate file format
            if (in_array($extension, $file_format)) {
                //Validate file size
                if ($size <= 1000000) {
                    $upload = move_uploaded_file($tmp_name, $folder);
                    $sql="INSERT INTO images (file_name, file_type, file_size, uploaded_on) VALUES
                    ('$name','$type','$size',NOW())";
                    if(mysqli_query($conn,$sql)){
                        echo "<h3>image uploaded successfully</h3>";
                        header("Location: gallery.php");
                    } else {
                        echo "<h3>image not uploaded</h3>";
                    } 
                } else {
                    echo "<b>File size exceding limit</b>";
                }
            } else {
                echo "<b>File format is not suitable</b>";
            }
        } else {
            echo "<b>File already exist</b>";
        }
    } else {
        echo "<b>First upload image</b>";
    }
} else {
    echo "<b>First Submit Form</b>";
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<hr />
    <h1>Uploads Images</h1>
    <form method="post" method="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        Image: <input type="file" name="image" />
        <br /><br />
        <input type="submit" name="submit" value="Upload Image" />
        <!-- <input type="submit" name="show_image" value="Show Image"/> -->
    </form>
    <!-- <?php
    if(isset($_POST['show_image'])){
        $sql1="SELECT * FROM images";
        $result=mysqli_query($conn,$sql1);
            while($row=mysqli_fetch_assoc($result)){
                $filesource=$row['file_name'];
                echo "<img src='uploads/$filesource' width='100' height='100' brder='1px solid black'>"."<br>";
            }
    } else{
        echo "<b>No Image Uploaded! </b>";
    }
    ?> -->
</body>
</html>