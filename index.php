<?php include ("./inc/header.inc.php");
include ("./inc/connect.inc.php");
function callname(){
    return "Welcome";
}
include("check.php");
if(!$id){
    die("You dont have access");
}
?>