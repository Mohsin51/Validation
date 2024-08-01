<?php
if(isset($_POST['submit'])){
    $cnic=$_POST['cnic'];
    //$pattern="/^([\d]{5})-([\d]{7})-[\d]$/";
    $pattern="/^([\d]{5})[\-]([\d]{7})[\-][\d]$/";
    if(!empty($cnic)){
        if(preg_match($pattern,$cnic)){
            echo "<span class='success'>CNIC verified</span>";
            //echo "<b>CNIC verified</b>";
        } else{
            echo "<span class='error'>Invalid CNIC</span>";
            //echo "<b>Invalid CNIC</b>";
        }
    } else{
        echo "<span class='error'>Enter CNIC</span>";
        // echo "<b>Enter CNIC</b>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .success {
            color: blue;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        Enter CNIC: <input type="text" name="cnic" placeholder="3xxxx-xxxxxxx-x"/>
        <br/><br/>
        <input type="submit" name="submit" value="Check CNIC"/>
    </form>
    <span id="error" class="error"></span>
</body>
</html>