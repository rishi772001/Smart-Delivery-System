<?php
    session_start();
    require "conn.php";
    // variable declaration
    $username = "";
    $email    = "";
    $errors = array();
    $_SESSION['success'] = "";

    
    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM postman WHERE Name='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            $row = $results->fetch_assoc();
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['idd'] = $row['ID'];
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: postmenhomepage.php');
            } else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
