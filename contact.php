<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
 
 <div class="container">
<h3 class="text-center">GET IN TOUCH</h3>

<link rel="stylesheet" type="text/css" href="css/styles.css">

<h4 class="text-center">OFFICE LINE</h4>
<h4 class="text-center">+2348066738561</h4>
<h4 class="text-center">Email:</h4>
<h4 class="text-center">haulexgem@yahoo.co.uk</h4>


<h4 class="text-center">ADDRESS</h4>
<h5 class="text-center">4TH Floor Akala<br>Shopping Complex,<br>37, Agodi Avenue, Ibadan,<br> Oyo State.</h5>

<hr>
</div>
<h4 class="text-center">For more enquiries, kindly fill out this form to get in touch.</h4>
 
 
 
 
 
 
  
<?php
//the message
$msg = "First line of text\nSecond line of text";
//use wordwrap() if linrs are longer than 70 characters
$msg = wordwrap($msg,70);

//send message to the recipient
//mail("support@edwindiaz.com", "my subject", $msg);


if(isset($_POST['submit'])){

$name       = $_POST['name'];
$to         = "support@edwindiaz.com";
$subject    =  $_POST['subject'];
//Enqueries from olasquare
$body       = $_POST['body'];

    
if(!empty($name) && !empty($to) && !empty($subject) && !empty($body)) {
    
$message = "Your message has been submitted, you will receive feedback in your email shortly";
    
} else {
$message = "Fields cannot be empty";
}


}else {

$message = ""; 


    
    

}


?>
  
  

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
   <div class="container">
      <div class="row">
         <div class="col-xs-6 col-xs-offset-3">
            <div class="form-wrap">
               <h1>Contact Us</h1>
              <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                 <h4 class="text-center"><?php echo $message; ?></h4>
                 
                 <div class="form-group">
                     <label for="name" class="sr-only">Name</label>
                     <input type="name" name="name" id="name" class="form-control text-center"  placeholder="Enter Your Name">
                      
                  </div>
                 
                  <div class="form-group">
                     <label for="email" class="sr-only">Email</label>
                     <input type="email" name="email" id="email" class="form-control text-center"  placeholder="Enter Your Email">
                      
                  </div>
                  
                  <div class="form-group">
                     <label for="subject" class="sr-only">Subject</label>
                     <input type="text" name="subject" id="subject" class="form-control text-center"  placeholder="Enter Your Subject">
                      
                  </div>
                   
                   <div class="form-group">
                      
                    <textarea class="form-control" name="body" id="body" placeholder="Your Message" cols="50" rows="10"></textarea>  
                       
                   </div>
                   
                   <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                   
               </form>
                
            </div>
             
         </div> 
          
      </div>
       
   </div>
    
</section>
</div>
<hr>
<?php include "includes/footer.php"; ?>