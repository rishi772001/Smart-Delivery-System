<?php
$servername = "localhost:33";
$username = "root";
$password = "";
$dbname = "post";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$o=$_POST['addr'];
$p=$o;
$o=str_replace(' ','',$o);
$o=strtolower($o);
$aa=explode(",",$o);

$sql = "SELECT * from postman";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
    	for ($x = 0; $x < count($aa); $x++) 
    	{
    		#$a=$aa[$x];

    		
       if (strpos($aa[$x], $row['SERVICE'])>-1) {
       	#'INSERT INTO postt VALUES("'.$row['ID'].'", "'.$a.'")';

        $temp=$row['ID'];
       	$s = 'INSERT into postt (ID,SERVICE) values("'.$row['ID'].'","'.$p.'")';
       }
    }
    
}
if ($conn->query($s) === TRUE)
{
    $a="select * from postman where ID='$temp'";
    $r=$conn->query($a);
    if($r)
    {
        $data = $r->fetch_assoc();
        echo"<script type='text/javascript'>window.alert('Successfully Completed, Postman Name is ".$data['Name']."');window.location='webcam.php';</script>";
    }
    
      
    //echo"<script type='text/javascript'>window.alert('Successfully Completed  postmanid = ".$data['Name']."');window.location='webcam.php';</script>";
}
    //echo "success";
else
    //echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='webcam.php';</script>";
  echo $conn->error;
}

$s="INSERT INTO letter  (addr,status) VALUES ('$p','pending')";
$conn->query($s);


$conn->close();
?>