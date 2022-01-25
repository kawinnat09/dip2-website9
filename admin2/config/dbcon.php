<?php 
    // $host = "localhost";
    // $username="id17909793_chananthon";
    // $password="-u4ByR/E%&<m^KFk";
    // $database="id17909793_website";

    $host = "localhost";
    $username="root";
    $password="";
    $database="website";

    $con = mysqli_connect("$host","$username","$password","$database");
    if(!$con){
        header("Location: ../../errors/dberror.php");
        die();
    }
?>
