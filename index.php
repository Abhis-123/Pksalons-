<?php
 session_start();
 //secho $_COOKIE['userID'];


if(isset($_COOKIE['userID'])){ 
   $_SESSION['userID']=$_COOKIE['userID'];
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>pkSalons</title>
      <meta name="description" content="A saloon website" />
      <meta name="keywords" content="Hair haircut book saloon salon haircut barber" />
      
      <link rel="shortcut icon" href="grooming.png">
      <link rel="stylesheet" type="text/css" href="css/demo.css" />
	  <link rel="stylesheet" type="text/css" href="css/component.css" />
	  <link rel="stylesheet" type="text/css" href="css/account.css" />
     <link rel="stylesheet" type="text/css" href="css/style.css" />
     <link rel="stylesheet" type="text/css" href="css/contact.css" />
     <link rel="stylesheet" type="text/css" href="css/gridlayout.css" />
     <link rel="stylesheet" href="css/nav.css">
     <!--link rel="stylesheet" type="text/css" href="css/containers.css" /-->
     <link rel="stylesheet" type="text/css" href="css/Saloon_Search.css"/>


    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <script src="js/modernizr-custom.js"></script>
      <script src="js/jquery-3.3.1.js" type="text/javascript"></script>

	  
   </head>

   <body <?php if (isset($_SESSION['userID'])) {
    echo 'onload="'."run_function()";
   }  ?> ">

      <!-- navigation -->
      <nav class="pages-nav">
         <div class="pages-nav__item"><a class="link link--page" href="#page-home">Home</a></div>
         <div class="pages-nav__item"><a class="link link--page" href="#page-docu">Book Home Service</a></div>
         <div class="pages-nav__item"><a class="link link--page" href="#page-buy">Hair Styles</a></div>
         <?php 

       if (!isset($_SESSION['userID'])) {
            echo '<div class="pages-nav__item"><a class="link link--page" href="#page-manuals">Register</a></div>
             <div class="pages-nav__item"><a class="link link--page" href="#page-software">Login</a></div>';
         }else{
           echo '<div class="pages-nav__item"><a class="link link--page" href="#page-custom">Your Account</a></div>';

         }        
         ?>
         <div class="pages-nav__item"><a class="link link--page" href="#page-training">Book Salon Service </a></div>
         <div class="pages-nav__item"><a class="link link--page" href="#page-contact">Contact</a></div>
         <div class="pages-nav__item pages-nav__item--small"><a class="link link--page link--faded" href="#page-blog">About</a></div>
         <div class="pages-nav__item pages-nav__item--social">
            <a class="link link--social " href="#"><i class="fa fa-twitter" href></i><span class="text-hidden">Twitter</span></a>
            <a class="link link--social" href="#"><i class="fa fa-linkedin"></i><span class="text-hidden">LinkedIn</span></a>
            <a class="link link--social" href="#"><i class="fa fa-facebook"></i><span class="text-hidden">Facebook</span></a>
            <a class="link link--social" href="#"><i class="fa fa-youtube-play"></i><span class="text-hidden">YouTube</span></a>
            <a class="link link--social " href="#"><i class="fa fa-instagram"></i><span class="text-hidden">Twitter</span></a>
         </div>


      </nav>
      <div class="pages-stack">
         <div class="page" id="page-home">
          
            <iframe src="home.php" id="h_iframe_" frameborder="0" ></iframe>
          
         </div>
         <!-- /page -->
         <div class="page" id="page-docu">
            <header class="bp-header_search">
               <script>


     function Search_query() {
                 jQuery.ajax({
                              url: "includes/home_search.php",
                              data:'address_h='+$("#address_h2").val(),
                              type: "POST",
                              success:function(data){
                              $("#home_booking").html(data);
                              },
                              error:function (){}
                              });
                         
                        }
                        function Search_query2() {
                 jQuery.ajax({
                              url: "includes/saloon_search.php",
                              data:'address_h='+$("#address_h").val(),
                              type: "POST",
                              success:function(data){
                              $("#saloon_search").html(data);
                              },
                              error:function (){}
                              });
                         
                        }
                  
               </script>

               <div> 
                  <?php 
                  if (isset($_SESSION['userID'])) {
                   echo '<h4>Enter Your Address To Search Avilability</h4>
                   <input type="text" name="address_h" id="address_h2" class="demoInputBox" placeholder="enter an address">
                   <button type="submit" onclick="Search_query()" class="btnAction" name="submit" value="submit">Search</button>
                   '.$_SESSION['userID'];
                 
               }else{
                  print("
                  <h3 class='not_login_message'> you are not logged in! </h3>");
                 
               }
                  ?>
               </div>
             

            </header>
            <div class='search-content' id='home_booking'>
       
            </div>


         </div>

         <?php 
         if (!isset($_SESSION['userID'])) {
            echo ' <div class="page" id="page-manuals">
            <header class="bp-header cf">';
            require_once "register.php";
            echo '</header>
            </header>    
                </div>';

            echo '<div class="page" id="page-software">
            <header class="bp-header cf">
               <h1 class="bp-header__title">Wlcome Back !</h1>
            </header>
            <div class="phppot-container">';
               require_once "login.php";
             echo '</div>
            </header>
            </div>';
         }
         else{
           echo ' <div class="page" id="page-custom">
           ';
           require "Account.php";
              echo '</div>  
           ';
        
       }        
        
           ?>
        
 <div class="page" id="page-training">
            <header class="bp-header_search">
              
               <div> 
                  <?php 
                  if (isset($_SESSION['userID'])) {
                   echo ' <h1 class="bp_search">Enter Your Address To Search Avilability</h1>
                   <input type="text" name="address_h" id="address_h" class="demoInputBox" placeholder="enter an address">
                   <button type="submit" onclick="Search_query2()" class="btnAction" name="submit" value="submit">Search</button>
                   ';
                 
               }else{
                  print("
                  <h3 class='not_login_message'> you are not logged in! </h3>");                
               }
                  ?>
               </div>
            </header>

            <div class='search-content' id='saloon_search'>
       
            </div>
         </div>



         <div class="page" id="page-buy" onmouseout="hairstyle_out()" onmouseover="hairstyle_in()" o>
           <script>
                    // document.getElementById('h_iframe_').style.display="none"

       //function    hairstyle_out(){

        //  document.getElementById('h_iframe_').style.display="none"

       //    }
       //    function    hairstyle_in(){

//document.getElementById('h_iframe_').style.display=" "

 //}
           
           
           
           </script>
              <iframe src="hairstyles.php" id="h_iframe_" frameborder="0" ></iframe>
            </div>




               <div class="page" id="page-blog">
               <?php 
               include ('about.php');
               ?>
               </div>
   
         

        
         <div class="page" id="page-contact">
            <header class="bp-header cf">
               <h1 class="bp-header__title">Contact US</h1>
               <p class="bp-header__desc">
              <a class="link link--social contact-link " href="#"><i class="fa fa-twitter" href></i><span class="text-hidden">Twitter</span></a>
              <a class="link link--social  contact-link" href="#"><i class="fa fa-linkedin"></i><span class="text-hidden">LinkedIn</span></a>
              <a class="link link--social  contact-link" href="#"><i class="fa fa-facebook"></i><span class="text-hidden">Facebook</span></a>
              <a class="link link--social  contact-link" href="#"><i class="fa fa-youtube-play"></i><span class="text-hidden">YouTube</span></a>
              <a class="link link--social   contact-link" href="#"><i class="fa fa-instagram"></i><span class="text-hidden">Twitter</span></a>
               </p>


               <div>
               
               </div>
               
               <div id='contact-page'>
               
             
                  <script>
                        function sendContact() {
                           var valid;	
                           valid = validateContact();
                          
                           if(valid) {
                              jQuery.ajax({
                              url: "includes/mail/contactmail.php",
                              data:'userName-contact='+$("#userName").val()+'&userEmail-contact='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$(content).val(),
                              type: "POST",
                              success:function(data){
                              $("#mail-status").html(data);
                              },
                              error:function (){
                                 window.alert("server problem");
                              }
                              });
                           }else{
                              window.alert("there was a connection error");
                           }
                        }

                        function validateContact() {
                           var valid = true;	
                           $(".demoInputBox").css('background-color','');
                           $(".info").html('');
                           
                           if(!$("#userName").val()) {
                              $("#userName-info").html("(required)");
                              $("#userName").css('background-color','#FFFFDF');
                              valid = false;
                           }
                           if(!$("#userEmail").val()) {
                              $("#userEmail-info").html("(required)");
                              $("#userEmail").css('background-color','#FFFFDF');
                              valid = false;
                           }
                           if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                              $("#userEmail-info").html("(invalid)");
                              $("#userEmail").css('background-color','#FFFFDF');
                              valid = false;
                           }
                           if(!$("#subject").val()) {
                              $("#subject-info").html("(required)");
                              $("#subject").css('background-color','#FFFFDF');
                              valid = false;
                           }
                           if(!$("#content").val()) {
                              $("#content-info").html("(required)");
                              $("#content").css('background-color','#FFFFDF');
                              valid = false;
                           }
                           
                           return valid;
                        }
                        </script>
                           <div id="frmContact">
                                    <div id="mail-status"></div>
                                 <div>
                                        <label style="padding-top:20px;">Name</label>
                                       <span id="userName-info" class="info"></span><br/>
                                       <input type="text" name="userName-contact" id="userName" class="demoInputBox">
                                 </div>
                                 <div>
                                       <label>Email</label>
                                       <span id="userEmail-info" class="info"></span><br/>
                                       <input type="text" name="userEmail-contact" id="userEmail" class="demoInputBox">
                                 </div>
                                 <div>
                                       <label>Subject</label> 
                                       <span id="subject-info" class="info"></span><br/>
                                       <input type="text" name="subject-contact" id="subject" class="demoInputBox">
                                 </div>
                                 <div>
                                       <label>Message</label> 
                                       <span id="content-info" class="info"></span><br/>
                                       <textarea name="content-contact" id="content" class="demoInputBox" cols="60" rows="6"></textarea>
                                 </div>
                                   
                                      <button name="submit-contact" class="btnAction" onClick="sendContact();">Send</button>
                                   
                                 </div>


                                 <div id="contact_card_address">
                              <a class="link link--social contact-link " href="#"><i class="fa fa-twitter" href></i><span class="text-hidden">Twitter</span></a>
                              <a class="link link--social  contact-link" href="#"><i class="fa fa-linkedin"></i><span class="text-hidden">LinkedIn</span></a>
                              <a class="link link--social  contact-link" href="#"><i class="fa fa-facebook"></i><span class="text-hidden">Facebook</span></a>
                              <a class="link link--social  contact-link" href="#"><i class="fa fa-youtube-play"></i><span class="text-hidden">YouTube</span></a>
                              <a class="link link--social   contact-link" href="#"><i class="fa fa-instagram"></i><span class="text-hidden">Twitter</span></a>   
                              <div id="email_and_contact_info">
                                 <p >mobile No:+919138504897</p>
                                 <p >whatsApp No:+919138504897</p>
                                 <p>email:pandirabhishek2001@gmail.com</p>
                              </div>
                              <address>
                                 Radha Soami colony kaithal,kaithal,haryana,india,pin:136027
                              </address>

                                 </div>

                         </div>
                   </header>
            





         </div>
    
      </div>
      <button class="menu-button"><span>Menu</span></button>
      <script src="js/classie.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>
