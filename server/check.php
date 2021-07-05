<?php 
    session_start();

    include("config.php");

    $name = $_POST["name"];
    $password = $_POST["password"];

    $check_username = "";
    $check_password = "";

    // creating connection
    $db = "weatherDB";
    $conn = mysqli_connect($server,$username,$pass,$db);
    if(!$conn) {
        $_SESSION["error"] = "Create your account !";
        header("location: ../login.php");
        exit();
    }

    // checking credentials
    $sql = "SELECT * FROM users WHERE name='".$_POST["name"]."'";

    $res = mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($res)){
        $check_username=$row['name'];
        $hashed_password=$row['password'];
    }

    if($name == $check_username &&  password_verify($password,$hashed_password)){
        $_SESSION["loggedin"] = "true";
        header("location: ../app.php");
    } else{
        $_SESSION["error"] = "Invalid Credentials !";
        header("location: ../login.php");
    }

    mysqli_close($conn);
?>