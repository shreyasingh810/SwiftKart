<?php
if(isset($_COOKIE['SNID'])){
    $cookie=sha1($_COOKIE['SNID']);
    
    $check = mysqli_query($db, "SELECT * FROM login_tokens WHERE tokens='$cookie'");
    $count=mysqli_num_rows($check);
    if($count == 1){
        $id_row=mysqli_fetch_array($check);
        $id=$id_row['user_id'];
    }
}
else{
    $id=false;
}
?>