<script src="https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js"></script>


<?php
// $img = $_FILES['addr'];
// $img_name = $img['name'];
// $img_type = $img['type'];
// $img_size = $img['size'];
// $img_path = $img['tmp_name'];

// $folder = "images/";
// move_uploaded_file($img_path, $folder . $img_name);


// echo "
//         <script>
//             Tesseract.recognize('images/rishi.png', 'eng', {
//                 logger: (m) => console.log(m),
//             }).then(({ data: { text } }) => {
//                 console.log(text);
//                 createCookie('gfg', text, '10');
//             });
            


//             function createCookie(name, value, days) {
//                 var expires;

//                 if (days) {
//                     var date = new Date();
//                     date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//                     expires = '; expires=' + date.toGMTString();
//                 }
//                 else {
//                     expires = '';
//                 }

//                 document.cookie = escape(name) + '=' +
//                     escape(value) + expires + '; path=/';
//             }
//         </script>
//     ";
// $o = $_COOKIE["gfg"];
// echo $o;
// echo exec("tesseract $img out");
// $myfile = fopen("F:/softwares/tesser/out.txt", "r") or die("Unable to open file!");
// $o=fread($myfile,filesize("F:/softwares/tesser/out.txt"));
// fclose($myfile);
$o = $_POST['abc'];
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