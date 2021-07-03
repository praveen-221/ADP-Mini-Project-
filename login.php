<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Weather app</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Lobster&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    </head>

    <body>
        <div class="center">
            <form action="server/check.php" method="POST">
                <div>
                    <img src="./images/logo.png" alt="logo" class="logo" width="100px" height="100px">
                </div>

                <div class="heading">
                    <h2>Login</h2>
                </div>
                <?php 
                    if(isset($_SESSION["error"])) {
                        $error = $_SESSION["error"];
                        echo "<p id='error' style='transition:2s ease'>$error</p>";
                    }
                ?>
                <div class="text">
                    <svg class="svg-icon" viewBox="0 0 20 20" style="width: 20px; height: 20px;">
                        <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                    </svg>
                    <input type="text" name="name" autocomplete="off" required>
                    <span></span>
                    <label>Name</label>
                </div>
                <div class="text">
                    <svg class="svg-icon" viewBox="0 0 20 20" style="width: 20px; height: 20px;">
                        <path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
                    </svg>
                    <input type="password" name="password" autocomplete="off" required>
                    <span></span>
                    <label>Password</label>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg><input type="checkbox" name="dispassword" onclick="dispass()" id="cl">
                </div>

                <div class="button">
                    <input type="submit" value="Login">
                </div>

                <div class="redirect">
                    <pre>Don't have an account? <a href="signup.html">Sign Up</a></pre>
                </div>
            </form>        
        </div>
        <script>
        function dispass()
        {
          if(document.getElementById("pass").type=="password")
          {
            document.getElementById("pass").type="text";
          }
          else{
            document.getElementById("pass").type="password";
          }
        }
      </script>
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
