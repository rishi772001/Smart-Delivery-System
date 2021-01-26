<script src = "https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js"></script>
<!-- Store address from image to db -->

<?php

$rawaddress  =  $_POST['addr'];

require "conn.php";
$address = $rawaddress;
$rawaddress = str_replace(' ', '', $rawaddress);
$rawaddress = strtolower($rawaddress);
$splitaddress = explode(",", $rawaddress);

$sql  =  "SELECT * from postman";
$result  =  $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row  =  $result->fetch_assoc()) {
        for ($x  =  0; $x < 100; $x++) {
            $index = strpos($splitaddress[$x], $row['SERVICE']);
            if ($index === false) {
                $temp = $row['ID'];
                $sqlpost  =  'INSERT into postt (ID,SERVICE) values("'.$row['ID'].'","'.$address.'")';
            }
        }
    }
    if ($conn->query($sqlpost)  ==  true) {
        $sqlpostman = "select * from postman where ID = '$temp'";
        $result1 = $conn->query($sqlpostman);
        if ($result1) {
            $data  =  $result1->fetch_assoc();
            echo"<script type = 'text/javascript'>window.alert('Successfully Completed, Postman Name is ".$data['Name']."');window.location = 'adminhomepage.php';</script>";
        }
    }
    //echo "success";
    else {
        //echo"<script type = 'text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location = 'webcam.php';</script>"
        echo  $conn->error;
    }
}

$sqlletter = "INSERT INTO letter  (addr,status) VALUES ('$address','pending')";
$conn->query($sqlletter);

?>