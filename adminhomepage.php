<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login1.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Capture Address</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    $(document).ready(function() {
        $("#nav-placeholder").load("nav.html");
    });
    </script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
    #results {
        padding: 20px;
        border: 1px solid;
        background: #ccc;
    }

    table,
    th,
    tr,
    td {
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        border: 1.5px solid blue;
        text-align: center;
        padding: 2px;
        margin: 20px;
    }

    #addr {
        border: none;
        border-bottom: 2px solid blue;
        background-color: skyblue
    }

    .container {
        margin-top: 30px;
    }

    #abc {
        margin: 40px;
    }

    .content a {
        color: black;
        text-decoration: none;
    }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    $(document).ready(function() {
        $("#nav-placeholder").load("nav.html");
    });
    </script>
</head>

<body style="background-color: skyblue;">
    <div id="nav-placeholder"></div>
    <div class="container">
        <div class="content">

            <!-- notification message -->
            <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif?>

            <!-- logged in user information -->
            <?php if (isset($_SESSION['username'])): ?>
            <button class='btn btn-outline-danger' style="float:right;">
                <a href="index.html?logout='1'">logout</a>
            </button>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>
            </p>

            <?php endif?>
        </div>
    </div>

    <!--  ENABLE THIS CODE AND LINE:235 FOR RUNTIME IMAGE CAPTURE USING WEBCAM  -->


    <!-- <div class="container">
        <h1 class="text-center">Capture Address</h1>

        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br />
                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="addr" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br />
                    <button class="btn btn-success" name="gallery">Submit</button>
                </div>
            </div>
        </form>
    </div> -->

    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <!-- Form for upload image from gallery -->
                <div class="row text-center">
                    <h2>Choose from gallery</h2>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="file" name="addr">
                            </div>

                            <div class="col-md-12 ">
                                <br />
                                <input type="submit" name="gallery" class="btn btn-danger" value="Upload">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Text box to display status -->
                <div class="row">
                    <form action="store.php" method="POST">
                        <textarea rows="3" cols="30" id="abc" name="abc"></textarea><br />
                        <input type="submit" class="btn btn-success">
                    </form>
                </div>

            </div>


            <div class="col-md-6">
                <!-- Form for enter address -->
                <h2>Enter Address</h2>

                <form method="POST" action="store.php">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="addr" id="addr" placeholder="Enter address">
                        </div>

                        <div class="col-md-12 ">
                            <br />
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <form method="POST">
            </br>
            <input type="submit" name="complete" value="complete" class="btn btn-primary">
        </form>
    </div>

    <?php
        require "conn.php";
        if (isset($_POST["gallery"])) {
            $img = $_FILES['addr'];
            $img_name = $img['name'];
            $img_type = $img['type'];
            $img_size = $img['size'];
            $img_path = $img['tmp_name'];
            $folder = "images/";
            move_uploaded_file($img_path, $folder.$img_name);
            echo "
                <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>
                <script>
                document.getElementById('abc').value = 'Processing...';
                Tesseract.recognize('images/".$img_name."', 'eng', {
                    logger: (m) => console.log(m),
                }).then(({
                    data: {
                        text
                    }
                }) => {
                    console.log(text);
                    document.getElementById('abc').value = text;
                    document.getElementById('abc').focus();
                });
                
                </script>
            
            
            ";
        }
        if (isset($_POST["complete"])) {
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * from postt";
            $result = $conn->query($sql);
            echo "<center><table><tr><th>Address</th><th>Assigned postman Id</th></tr>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>";
                    echo $row['SERVICE'] . " </td><td> " . $row['ID'] . " </td>";
                    echo "</tr>";
                }
            }
            echo "</table></center>";
            $conn->close();
        }
    ?>
    </div>

    <!--ENABLE THIS CODE AND AT LINE:89 FOR RUNTIME IMAGE CAPTURE USING WEBCAM -->

    <!--     
    <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90,
        //facingMode: 'environment'
        //video:{facingMode: { exact: 'environment' }}

        // constraints: {
        //     facingMode: {
        //         exact: 'environment'
        //     }

        // }
    });


    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script> -->



</body>

</html>