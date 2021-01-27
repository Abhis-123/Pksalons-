<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require ('includes/register-process.php');
    }
    ?>
<!doctype html>
<html lang="en">
     <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="favicon.ico">
        <title>Registration</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="js/jquery-3.3.1.js"></script>

    </head>
    <body style="width:100%">
        <main id="main-area">
        <!-- registration area -->
        <section id="register">
            <div class="register-container">
                <div class="register-container-sub">
                    <div class="upload-profile-image d-flex justify-content-center pb-5">
                        <div class="text-center">
                            <div class="upload-photo">
                                <img class="camera-icon" src="./assets/camera-solid.svg" alt="camera">
                            </div>


                            <img id="imgInp" src="./assets/profile/beard.png" style="width: 100px; height: 100px" class="img rounded-circle" alt="profile">
                            <small class="form-text text-black-50">Choose Image</small>
                            <input type="file" form="reg-form" style="width: 100px; height: 100px"  class="form-control-file" name="profileUpload" id="upload-profile">
                        </div>
                        <script>
                            function readURL(input) {
                                        if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                    $('#upload-profile').attr('src', e.target.result);
                            }
                            
                            reader.readAsDataURL(input.files[0]); // convert to base64 string
                        }
                        }

                        $("#imgInp").change(function() {
                        readURL(this);
                        });
</script>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName'];  ?>" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col">
                                    <input type="text" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName'];  ?>" name="LastName" id="LastName" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>" required name="email" id="email" class="form-control" placeholder="Email*">
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col">
                                    <p>Mobile Number is Ncessery</p>
                                    <input type="tel" value="<?php if(isset($_POST['m-number'])) echo $_POST['m-number'];  ?>" required name="m-number" id="m-number" class="form-control" placeholder="Mobile number*">
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="text" list="barber" value="<?php if(isset($_POST['barber'])) echo $_POST['barber']; ?>" required name="barber" id="barber" class="form-control" placeholder="Are you barber only type YES OR NO" style="text-transform:uppercase;">
                                    <datalist id="profession">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="password" required name="password" id="password" class="form-control" placeholder="password*">
                                </div>
                            </div>
                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
                                    <small id="confirm_error" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="agreement" class="form-check-input" required>
                                <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term, conditions, and policy </a>(*) </label>
                            </div>
                            <div class="submit-btn text-center my-5">
                                <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- #registration area -->
        <?php
            // footer.php
             // include ('footer.php');
            ?>