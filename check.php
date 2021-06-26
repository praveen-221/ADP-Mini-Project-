<?php 
    session_start();

    include("config.php");

    $_SESSION["name"] = $_POST["name"];
    $_SESSION["password"]  = $_POST["password"];

    $check_username = "";
    $check_password = "";

    // creating connection
    $db = "weatherDB";
    $conn = mysqli_connect($server,$username,$pass,$db);
    if(!$conn) {
        echo "Error while connecting : ",mysqli_error($conn);
        exit();
    }

    // checking credentials
    $sql = "SELECT * FROM users WHERE name='".$_POST["name"]."'";

    $res = mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($res)){
        $check_username=$row['name'];
        $check_password=$row['password'];
    }

    if($_POST["name"] == $check_username &&  $_POST["password"] == $check_password){
        header("location: app.html");
    } else{
        $_SESSION["error"] = "Invalid Credentials !";
        header("location: login.php");
    }

    mysqli_close($conn);
?>