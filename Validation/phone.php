
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration Page</h1>
    <hr/>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Phone: <input type="tel" name="phone" placeholder="03xxxxxxxxx"/> 
        <br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $phone=$_POST['phone'];
    // // This pattern is only for without spaces or (-)hyphens
    // $pattern="/^((\+92)?(0092)?(0)?(92)?)(3)([0-4])([0-9])([0-9]){7}$/";
    //Pattern="/^((\+92|0092|0|92)?)(3)([0-4])([0-9])(-?| )([0-9]){7}$/";
      // This pattern is only for with spaces or (-)hyphens
      $pattern="/^((\+92)?(0092)?(0)?(92)?)(3)([0-4])([0-9])(-?| )([0-9]){7}$/";
    if(empty($phone)){
        echo "First enter your phone";
    } elseif(!preg_match($pattern,$phone)){
        echo "Phone is not valid";
    } else{
        echo "Phone is valid";
    }  
} else{
    echo "Please submit the form";
}
?>