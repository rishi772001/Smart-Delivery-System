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

$o=$_POST['addr'];  //Get Address from form
$p=$o;              //Assign it to another variable
$o=str_replace(' ','',$o);
$o=strtolower($o);
$aa=explode(",",$o);  //Convert to array

$sql = "SELECT * from postman";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())   //traverse among postman
    {
    	for ($x = 0; $x < count($aa); $x++)   //traverse among address words
    	{
            if (strpos($aa[$x], $row['SERVICE'])>-1) {
                $temp=$row['ID'];
                $s = "INSERT into postt (ID,SERVICE) values('$row[ID]','$p')"; //If matches insert request
                break;
            }
        }
    }
    if(!isset($s))  //If does not match display error
    {
        echo"<script type='text/javascript'>window.alert('No PostMan Found');window.location='webcam.php';</script>";
    }
    if ($conn->query($s) === TRUE)
    {
        $a="select * from postman where ID='$temp'";
        $r=$conn->query($a);
        if($r) //display postman name to admin
        {
            $data = $r->fetch_assoc();
            echo"<script type='text/javascript'>window.alert('Successfully Completed, Postman Name is ".$data['Name']."');window.location='webcam.php';</script>";
        }
        
        
    }
    else
        echo $conn->error;
}

$s="INSERT INTO letter  (addr,status) VALUES ('$p','pending')";  //add status as pending
$conn->query($s);


$conn->close();
?>