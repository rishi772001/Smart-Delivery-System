

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Smart Postal System</title>
  <meta name="keywords" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">
  <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.">

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="content-wrapper">
    <header class="header header--bg">
      <div class="container">
        <nav class="navbar">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="#"></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
              <li><a href="#">HOME</a></li>
              <li><a href="login.php" >POSTMAN</a></li>
              <li><a href="login1.php" >ADMIN</a></li>

<!--data-toggle="modal" data-target=".log-sign"-->

              <li><a href="#team">TEAMS</a></li>
              <li><a href="#">ABOUT US</a></li>
              <li><a href="#Contact">STATUS</a></li>
            </ul>
          </div>
        </nav>
        <div class="row">
          <div class="col-lg-6">
            <img class="img-responsive" src="assets/images/postman.png" alt="">
          </div>
          <div class="col-lg-6 header__content">
            <h1 class="title">Smart Postal System<span class="title-style"></span></h1>
            <p>This Smart Postal System helps the postmen by finding the shortest path for delivering all the posts.
            It also helps admin to classify the posts and allot it to respective postmen by scanning the addresses of posts.</p>
            <p style="margin-top: -8%">Users may know the letters pending to their address by entering details <a href="#Contact">here</a>.</p>
          </div>
        </div>
      </div>
    </header>

    


  





   

    <section class="team team--bg">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
            <h2 class="page-section__title" id="team">Our team</h2>
            <div class="team__title-style">
              <span class="first-line"></span>
              <span class="second-line"></span>
            </div>
            <p class="page-section__subtitle">We are glad to announce that this Smart Postal System is designed by Innovators of REC</p>
          </div>
          <div class="row gutters-80">
            <div class="col-md-3">
              <div class="thumbnail team__single">
                <div class="bio text-center">
                  <img src="assets/images/rishi.png" alt="">
                  <h2>RISHI RAJ</h2>
                  <p>UX/UI Designer</p>
                </div>
                <div class="caption">
                  <p>One of our key team member well versed in UI development and database administrator.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="thumbnail team__single">
                <div class="bio text-center">
                  <img src="assets/images/sriram.png" alt="">
                  <h2>SRIRAM</h2>
                  <p>Web Developer</p>
                </div>
                <div class="caption">
                  <p>A passionate web developer with huge skills in developing various web applications.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="thumbnail team__single">
                <div class="bio text-center">
                  <img src="assets/images/sabsh.png" alt="">
                  <h2>SABARIRAJ</h2>
                  <p>Project Manager</p>
                </div>
                <div class="caption">
                  <p>A team member working for project development with very good leadership skills.</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="thumbnail team__single">
                <div class="bio text-center">
                  <img src="assets/images/susaa.png" alt="">
                  <h2>SUDHARSAN</h2>
                  <p>Requirement Analyst</p>
                </div>
                <div class="caption">
                  <p>A team member which analyses all requirements for efficient project design./p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>











    <section class="form form--bg">
      <div class="container">
        <div class="page-section">
          <div class="text-center">
            <h2 class="page-section__title page-section__title--white" id="Contact">STATUS OF POSTS</h2>
            <div class="form__title-style">
              <span class="first-line"></span>
              <span class="second-line"></span>
            </div>
            <p class="page-section__subtitle page-section__subtitle--white">Enter details below to know the status of letters</p>
          </div>
          
          <form action="fnfn.php" method="post">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Name">
            </div>
            <div class="form-group">
              <input class="form-control" name="addr" type="text" rows="2" placeholder="Address">
            </div>

            <div class="row">
              <div class="col-md-8 form-button">
                <input class="button--form" id="myBtn"  name="submit" type="submit" value="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <footer class="footer footer--bg">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer__left">
            <a class="navbar-brand" href="#"></a>
            <p>Copyright <span>&copy;</span> Innovators 2020</p>
          </div>
          <div class="col-md-5 footer__link">
            <li><a href="https://rishirajstud.blogspot.com/" id="visit">Visit our blog</a></li>
            <li><a href="#">Developed and released by Innovators of REC.<br>RISHI RAJ<br>SRIRAM<br>SABARIRAJ<br>SUDHARSAN</a></li>
          </div>

          <div class="col-md-3 footer__social-icons">
            <li><a href=""><i class="flaticon-facebook-letter-logo"></i></a></li>
            <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
            <li><a href="#"><i class="flaticon-google-plus"></i></a></li>
          </div>
        </div>
      </div>
    </footer>

  </div>
  

</div>


<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Log In</a></li>
              <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Sign Up</a></li>
              
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
       
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
              
               <div class="group">
<input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Email address</label></div>
              
              
            <!-- Password input-->
            <div class="group">
<input required="" class="input" type="password"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Password</label>
    </div>
<em>minimum 6 characters</em>

           <div class="forgot-link">
            <a href="#forgot" data-toggle="modal" data-target="#forgot-password"> I forgot my password</a>
            </div>
            

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-primary btn-block">Log In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
          
          
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">First Name</label></div>
            
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Last Name</label></div>
            
            <!-- Password input-->
            <div class="group">
<input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Email</label></div>
            
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="password"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Password</label></div>
              <em>1-8 Characters</em>
            
              <div class="group2">
<input required="" class="input" type="text"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Country</label></div>
            
            
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-primary btn-block">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <!--<div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>-->
    </div>
  </div>
</div>



  <script src="assets/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="assets/owl-slider/owl.carousel.min.js"></script> -->
  <script>
    $(window, document, undefined).ready(function() {

  $('.input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });
  
  });


$('#tab1').on('click' , function(){
    $('#tab1').addClass('login-shadow');
   $('#tab2').removeClass('signup-shadow');
});

$('#tab2').on('click' , function(){
    $('#tab2').addClass('signup-shadow');
   $('#tab1').removeClass('login-shadow');


});
  </script>

</body>
</html>  

<!--background: rgba(255,64,134, 1) !important;-->