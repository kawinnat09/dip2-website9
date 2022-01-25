<?php session_start(); ?>
<?php
include "admin/config/dbcon.php";

if (isset($_POST['register_btn'])) {
    $fname = mysqli_escape_string($con, $_POST['fname']);
    $lname = mysqli_escape_string($con, $_POST['lname']);
    $email = mysqli_escape_string($con, $_POST['email']);
    $password = mysqli_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_escape_string($con, $_POST['cpassword']);

    if ($password == $confirm_password) {
        //Check_email
        $checkemail = "SELECT email FROM users WHERE email = 'email' ";
        $checkemail_run = mysqli_query($con, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
            //Allready Email exit
            $_SESSION["message"] = "Already Email Exits";
            header("Location: register.php");
            exit(0);
        } else {
            $user_query = "INSERT INTO users(fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);
            if ($user_query_run) {
                $_SESSION['message'] = "Register Successfully";
                header("Location: login.php");
                exit(0);
                echo "mail";
            } else {
                $_SESSION['message'] = "Something went Wrong";
                header("Location: register.php");
                exit(0);
                echo "Add";
            }
        }
    } else {
        $_SESSION['message'] = "Password and Confirm password doesn't match";
        header("Location: register.php");
        exit(0);
        echo "pass no matt";
    }
} else {
    header("Location: register.php");
    exit(0);
    echo "pass";
}
?>