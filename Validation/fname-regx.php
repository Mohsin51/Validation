
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
        Name: <input type="text" name="name" placeholder="Enter Name"/> 
        <br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $name=trim($_POST['name']);
    //$name=$_POST['name'];
    $pattern="/^[a-zA-Z\s]{3,15}$/";
    if(empty($name)){
        echo "First enter your name";
    } elseif(!preg_match($pattern,$name)){
        echo "Invalid Name";
    } else{
        echo "Name is valid";
    }  
} else{
    echo "Please submit the form";
}
?>