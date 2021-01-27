<?php
$user = array();
//session_start();
if(isset($_SESSION['userID'])){
    require ('includes/mysqli_connect.php');
    include ('includes/helper.php');
//$_SESSION['userID']=0;
    $user = get_user_info($con, $_SESSION['userID']);
  
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
<link rel="stylesheet" href="css/message.css">
</head>




<script src="js/main.js"></script>
<section id="main-site-acc" onload="run_function()">
    <div class="container-acc py-5">
        <div class="row">
                        
                        <img id="account_image" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : 'assets/profile/beard.png'; ?>" alt="">
                        <h4 class="py-3_saloon">
                            <?php
                            if(isset($user['firstName'])){
                                printf('%s %s', $user['firstName'], $user['lastName'] );
                            }
                            ?>
                        </h4>

                <div class="user-info">
                   
                       <p  class="navlink"><b></b><span><?php echo isset($user['firstName']) ? $user['firstName'] : ''; ?><?php echo isset($user['lastName']) ? $user['lastName'] : ''; ?></span></p>
                        <p class="navlink"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email'] : ''; ?></span></p>
                 
                                                      
            </div>
         
        </div>
        
        <script>


             function get_booking() {
                    document.getElementById("account_booking").className='account_data active' 
                    document.getElementById("account_messages").className='account_data ' 
                    document.getElementById("account_pictures").className='account_data ' 
                    jQuery.ajax({
                              url: "includes/get_bookings.php",
                              data:'userId='+ <?php echo $_SESSION["userID"];?>,
                              type: "POST",
                              success:function(data){
                              $("#account_container").html(data);
                              },
                              error:function (){}
                              });
                         
                        }
        
                        function get_messages() {
                    document.getElementById("account_booking").className='account_data' 
                    document.getElementById("account_messages").className='account_data  active' 
                    document.getElementById("account_pictures").className='account_data ' 

                 jQuery.ajax({
                              url: "includes/get_message.php",
                              data:'userId='+ <?php echo $_SESSION["userID"];?>,
                              type: "POST",
                              success:function(data){
                              $("#account_container").html(data);
                              },
                              error:function (){}
                              });
                         
                        }




                function get_pictures() {
                            document.getElementById("account_booking").className='account_data' 
                            document.getElementById("account_messages").className='account_data' 
                            document.getElementById("account_pictures").className='account_data active' 
                            
                                jQuery.ajax({
                                        url: "includes/get_pictures.php",
                                        data:'userId='+<?php echo $_SESSION["userID"];?>,
                                        type: "POST",
                                        success:function(data){
                                        $("#account_container").html(data);
                                        },
                                        error:function (){}
                                        });
                         
                        }
        
                        setInterval(run_function, 5000);
        function run_function() {
            jQuery.ajax({
                                        url: "includes/get_message_count.php",
                                        data:'userId='+<?php echo $_SESSION["userID"];?>,
                                        type: "POST",
                                        success:function(data){
                                        $("#message_count").html(data);
                                        },
                                        error:function (){}
                                        });

            
        }
       

        </script>


    
<div class="account_heading">
        <h3 id="account_pictures" onclick="get_pictures()"  class="account_data" >pictures</h3>
        <h3 id="account_booking" onclick="get_booking()"   class="account_data">Bookings</h3>
        <h3 id="account_messages" onclick="get_messages()"  class="account_data">Messages<p id="message_count">0</p></h3></div>

      <script>

function image_hover(id){
    id='s'+id+'saloon';
    document.getElementById(id).style.opacity=1;
}
function image_out(id) {
    id='s'+id+'saloon';
    document.getElementById(id).style.opacity=0;

}
      </script> 

    </div>

    <div class="" id="account_container" onload="get_pictures()">
        


        </div>

        <div id="circularMenu" class="circular-menu">

  <a class="floating-btn" onclick="document.getElementById('circularMenu').classList.toggle('active');">
    <i class="fa fa-plus"></i>
  </a>

  <menu class="items-wrapper">
    <a href="logout.php" class="menu-item fa fa-sign-out"></a>
    <a href="#" class="menu-item fa fa-cog"></a>
    <a href="#" class="menu-item fa fa-twitter"></a>
  </menu>

</div>
</section>
