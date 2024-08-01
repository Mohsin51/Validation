
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
        Password: <input type="text" name="email" placeholder="Enter Valid Email"/> 
        <br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    //$pass=trim($_POST['pass']);
    $email=$_POST['email'];
    $pattern="/^([a-zA-Z\/\d\.-]+)@([-a-zA-Z\d\/]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/";
    if(empty($email)){
        echo "First enter your email";
    } elseif(!preg_match($pattern,$email)){
        echo "Email is not valid";
    } else{
        echo "Email is valid";
    }  
} else{
    echo "Please submit the form";
}
?>