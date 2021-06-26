<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="./login.css">
    </head>
    <body>
        <form method="post" action="check.php" class="box">
            <h2>Login</h2>
            <?php 
                if(isset($_SESSION["error"])) {
                    $error = $_SESSION["error"];
                    echo "<p id='error' style='transition:2s ease'>$error</p>";
                }
            ?>
            <input type="text" name="name" placeholder="Username" id="name" autocomplete="off">
            <input type="password" name="password" placeholder="Password" id="password">
            <input type="submit" value="Login" id="btn">
        </form>      
    </body>
</html>

<?php 
    if(isset($_SESSION["error"])) {
        echo "<script type='text/javascript'>
            setTimeout(() => {
                document.getElementById('error').remove();
            }, 3000);
        </script>";
    }
    unset($_SESSION["error"]);
?>
