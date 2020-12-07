<?php
$insert=false;
if(isset($_POST['name']))
{
$username ="root";
$password ="";
$server="localhost";
$con=mysqli_connect($server,$username,$password);
if(!$con)
{
    die("connection error due to".mysqli_connect_error());
}
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];;
$sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES
 ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;
 if($con->query($sql)==true)
 {$insert=true;
    // echo "success";
 }
 else{
     echo "error:$sql<br>$con->error";
 }

$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to tour and travels</title>
    <link rel="stylesheet" href="travel.css">
<style>
    input,textarea {
        width:300px;
        margin-top: 10px;
        border-radius: 5px;
        outline: radius:5px;
    }
</style>
</head>
<body>
    <img class="bg"src="col.jpg" alt="IIT">
    <div class="container">
        <h1>Welcome to KNIT tour and travels</h1>
    <p>Enter your details for the trip to confirm your travel</p>

  
    <?php
    if($insert==true) 
     echo "<h1><p class='submitMsg'>Thanks for submitting your profile</p><h1>";
    
    ?>

    <form action="travel.php" method="post">
        <input type="text" name="name"id="name"placeholder="enter your name">
        <br>
        <input type="text" name="age"id="age"placeholder="enter your age">
        <br>
      
        <input type="text" name="gender"id="gender"placeholder="enter your gender">
        <br>
        <input type="email" name="email"id="email"placeholder="enter your email">
        <br>
        <input type="phone" name="phone"id="phone"placeholder="enter your phone number">
        <br>
        <textarea name="desc" id="desc"cols="30"rows="10" placeholder="Enter any other information here"></textarea>
        <br>
        <button class="btn">Submit</button>
        <button class="btn">Reset</button>
       
    </form>
    </div>

    <script src="travel.js"></script>
    
</body>
</html>