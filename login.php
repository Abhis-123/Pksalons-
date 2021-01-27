<?php
    // header.php
    include "includes/helper.php";
    
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.3.1.js"></script>

        <script src="js/main2.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <main id="main-area">
       
        <!-- registration area -->
        <section id="login-form">
                 <div class="login-container">
                    <div class='icon-container';>
                        <div class="profile-image-login">   
                                <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png' ; ?>" style="width: 100px; height: 100px" class="img rounded-circle" alt="profile">           
                        </div>
                      <p id="welcome-text">Login and enjoy additional features</p>
                      </div>
                        <form action="includes/login-process.php" method="post" enctype="multipart/form-data" id="log-form">
                            <div class="main">
                                <p class="sign" align="center">Sign in</p>
                                <input class="un " type="text" align="center" name="email" placeholder="Email registered with">
                                <input class="pass" type="password" name="pass" align="center" placeholder="Password">
                                <button type="submit" class="submit" align="center" value="submit" name="submit">sign in</button>
                                <div id="forgot-link-to-register">
                                <p  id="forgot"><a   href="security/forgot_pass.php">Forgot Password?</p>
                                <p id="link-to-register" > </a>Create a new <a href="register.php">account</a></p>
                              </div>
                            </div>
                        
                        </form>
                        
                    
                
            </div>
        </section>
        