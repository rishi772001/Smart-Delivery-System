<?php 
    session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Capture Address</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
        table,th,tr,td{
           background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);border:1.5px solid blue;text-align: center;padding: 2px;margin:20px;
        }
        body{
            background-color: #b7fff6;
        }
    </style>
</head>
<body>
  
<div class="container">
        <div class="content">
        
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
            <button class='btn btn-outline-danger' style="float:right;"> <a href="index.php?logout='1'" style="color: black;text-decoration: none;">logout</a> </button>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            
        <?php endif ?>
    </div>
    <h1 class="text-center">Capture Address</h1>
    
    <form method="POST" action="storeImage.php">
        <div class="row">
            <div class="col-lg-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()" class="btn btn-warning" style="margin-left: 170px;">
                  
    
                <input type="hidden" name="image" class="image-tag">
                
            </div>
            <div class="col-lg-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 ">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    
    <hr>
</div>

<div class="container text-center">
    <h2>Choose from gallery</h2>
   
    <form method="POST" action="store.php">
        <div class="row">
            <div class="col-md-12">
                <input type="file" name="addrimg">
            </div>
            
            <div class="col-md-12 ">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
<br><br>
<div class="container text-center">
    <h2>Enter Address</h2>
   
    <form method="POST" action="sample.php">
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="addr" style="border:none;border-bottom: 2px solid blue;background-color: #b7fff6"placeholder="Enter address">
            </div>
            
            <div class="col-md-12 ">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
<div class="container text-center">
<form method="POST">
</br>
    <input type="submit" name="complete" value="complete" class="btn btn-primary">
</form>
</div>
<?php
if(isset($_POST["complete"]))
{
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
    $sql = "SELECT * from postt";
    $result = $conn->query($sql);
echo"<center><table><tr><th>Address</th><th>Assigned postman Id</th></tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {echo "<tr><td>";
            echo $row['SERVICE']." </td><td> ".$row['ID']." </td>";
echo"</tr>";
        }
    }
    echo"</table></center>";
    $conn->close();
}
?>

</div>
<!--add postman-->  

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        //sourceId:cameras[1],
        image_format: 'jpeg',
        jpeg_quality: 90,
        //facingMode: 'environment'
        //video:{facingMode: { exact: 'environment' }}
        constraints: {
                    facingMode: {
                                  exact: 'environment'
                                  }

                } 
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
     

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
 
</body>
</html>