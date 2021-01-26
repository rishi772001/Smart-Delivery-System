<?php include('server1.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    $(document).ready(function() {
        $("#nav-placeholder").load("nav.html");
    });
    </script>
    <link rel="stylesheet" href="../css/login.css" />

</head>

<body>
    <!-- admin login page -->
    <div id="nav-placeholder"></div>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="login1.php">

        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>

    </form>


</body>

</html>