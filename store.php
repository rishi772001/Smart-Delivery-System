<?php
    
    $img = $_POST['addrimg'];


    echo exec("tesseract $img out");
    $myfile = fopen("F:/softwares/tesser/out.txt", "r") or die("Unable to open file!");
    $o=fread($myfile,filesize("F:/softwares/tesser/out.txt"));
    fclose($myfile);

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





$p=$o;
$o=str_replace(' ','',$o);
$o=strtolower($o);
$aa=explode(",",$o);

$sql = "SELECT * from postman";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
        for ($x = 0; $x < 100; $x++) 
        {
            #$a=$aa[$x];
        $aaa=strpos($aa[$x], $row['SERVICE']);
            
       if ($aaa > -1 ) {
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
    }
    //echo "success";
else
    //echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='webcam.php';</script>"
   echo  $conn->error;
}

$s="INSERT INTO letter  (addr,status) VALUES ('$p','pending')";
$conn->query($s);


$conn->close();
?>
