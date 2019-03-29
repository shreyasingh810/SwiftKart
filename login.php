<?php include ("./inc/header.inc.php");
include ("./inc/connect.inc.php");
function callname(){
    return "Welcome";
}

if(isset($_POST['login'])){
    $lname=$_POST['lname'];
    $pass=md5($_POST['pass']);

    $query=mysqli_query($db, "SELECT * from users WHERE username='$lname' AND password='$pass'");
    $count_row=mysqli_num_rows($query);
    if($count_row == 1){
        $cstrong=TRUE;
        $token=bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $row=mysqli_fetch_array($query);
        $id=$row['id'];
        $token2=sha1($token);
        $query=mysqli_query($db,"INSERT INTO login_tokens VALUES('','$token2','$id')");
        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
        header("location:index.php");
    }
    else{
        echo "Invalid Details";
    }
}
?>

<form action="" method="post">
    Username:<input type="text" name="lname">
    Password:<input type="password" name="pass">
    <input type="submit" value="Login" name="login">
</form>