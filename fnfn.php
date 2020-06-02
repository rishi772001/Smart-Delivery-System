

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Postal System</title>
  <meta name="keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">

  <!--<link rel="stylesheet" href="css/style.css">-->
<style>
body{
  background-image: url("assets/images/back.png");
background-repeat:no-repeat;
background-attachment:fixed;
background-size: 100% 100%;
}
.modal {/* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 200px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
#close {
  color: white;
  padding-top: 15px;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

#close:hover,
#close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: rgba(0,0,0,0.4);
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
</head>
<body>



<div class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span  class="close" id="close">&times;</span>
    <h2>Status of Posts</h2>
  </div>
  <div class="modal-body">

    <p>
    <?php
      
     
      if(isset($_POST['submit'])){

        $conn=mysqli_connect("localhost:33","root","","post");
      $addr = $_POST['addr'];
      $sql="select * from letter where addr='".$addr."'";
      $result=$conn->query($sql);
      if($result->num_rows>0){
        $c=0;
        while($row=$result->fetch_assoc()){
        //echo "<br><h2>".$row["status"]."</h2>";
        if($row["status"]=="pending")
        $c++;
        }echo "<h1>".$c." Pending posts</h1>";
      }
      else{
        echo "No Posts Available!";
      }
      $conn->close();
    }
    else{echo "Connection Error, Please try again!";}
  
    ?>

</p>
  </div>
</div>



  <!-- <script src="assets/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/owl-slider/owl.carousel.min.js"></script> -->
<script>
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  window.location='index.php';
}

window.onclick = function(event) {
    window.location='index.php';
}

</script>
  
</body>
</html>  

<!--background: rgba(255,64,134, 1) !important;-->

