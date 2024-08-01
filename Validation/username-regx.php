
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
        Username: <input type="text" name="uname" placeholder="Enter User Name"/> 
        <br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $u_name=trim($_POST['uname']);
    //$name=$_POST['name'];
    // $pattern="/^[a-zA-Z\d]{3,20}$/";
    $pattern="/^[a-zA-Z\d@_]*$/";

    if(empty($u_name)){
        echo "First enter your user name";
    } elseif(!preg_match($pattern,$u_name)){
        echo "Invalid User Name";
    } else{
        echo "User name is valid";
    }  
} else{
    echo "Please submit the form";
}
?>