<?php include ("./inc/header.inc.php");
include ("./inc/connect.inc.php");
function callname(){
    return "Join Us";
}
if(isset($_POST['submit'])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $username=$_POST["uname"];
    $pass=$_POST["pass"];
    $date=$_POST["date"];
    
    $pass=md5($pass);

    $query=mysqli_query($db, "INSERT INTO users VALUES('','$fname','$lname','$username','$pass','$email','$date')");
    die("Registration Successful!");
}
?>

<form action="" method="post">
    First Name:<input type="text" name="fname"><br>
    Last Name:<input type="text" name="lname"><br>
    Email:<input type="email" name="email" id=""><br>
    Username:<input type="text" name="uname"><br>
    Password:<input type="password" name="pass" id=""><br>
    Date Of Birth:<input type="date" name="date" id=""><br>
    <input type="submit" value="Register me" name="submit"><br>
</form>