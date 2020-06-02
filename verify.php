<?php

$host="localhost:33";
$user="root";
$pass="";
$db="php";

$conn=mysqli_connect($host,$user,$pass,$db);



if(isset($_POST['uname'])){

$uname=$_POST['uname'];
$password=$_POST['pass'];





$sql="select * from postal where uname='".$uname."'AND password='".$password."'limit 1";

$result=$conn->query($sql);

if($result->num_rows==1){
    $url="postal dashboard.php?rishi=".$uname;
    
header('location:'.$url);
}

else{
    echo"<script type='text/javascript'>window.alert('Invalid Username or Password');window.location='login as postal.html';</script>";
}
}
?>






