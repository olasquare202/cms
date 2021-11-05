<?php include "admin/functions.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
  
<?php 
if(isset($_POST['submit'])){

$username = $_POST['username'];
$email    =  $_POST['email'];
$password = $_POST['password'];
$message = '';
$confirm_password = $_POST['confirm_password'];
$user_exist = false;
 if(username_exists($username)) {
  $user_exist = true;  
    $message = "user exists";
    
 }
 
    $email_exist = false;
 if(email_exists($email)) {
  $email_exist = true;  
    $message = "email exists";
    
 }
    
//$password_exist = false;
// if(password_exists($password)) {
//  $password_exist = true;  
//    $message = "Password Exists";
//    
// }  
    
    
    
 if(!$message){   
if(!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password) && !($user_exist)) {
    
$username = mysqli_real_escape_string($connection, $username);
$email    =  mysqli_real_escape_string($connection, $email);
$password = mysqli_real_escape_string($connection, $password);
$confirm_password =  mysqli_real_escape_string($connection, $confirm_password);
    
$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    
$confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT, array('cost' => 12));

//$query = "SELECT randSalt FROM users";
//$select_randsalt_query = mysqli_query($connection, $query);   
//if(!$select_randsalt_query) {
//die("Query Failed" . mysqli_error($connection));
//}
    
//$row = mysqli_fetch_array($select_randsalt_query);
//$salt = $row['randSalt'];
//$password = crypt($password, $salt);
    
$query = "SELECT user_password FROM users";
$select_user_password_query = mysqli_query($connection, $query);   
if(!$select_user_password_query) {
die("Query Failed" . mysqli_error($connection));
}
    
$row = mysqli_fetch_array($select_user_password_query);
$salt = $row['user_password'];
//$password = crypt($password, $salt);
    
$query = "INSERT INTO users (username, user_email, user_password, user_confirm_password, user_role) ";
$query .= "VALUES('{$username}', '{$email}', '{$password}', '{$confirm_password}', 'subscriber')";
$register_user_query = mysqli_query($connection, $query);
if(!$register_user_query) {
die("QUERY FAILED". mysqli_error(connection) . '' . mysqli_error(connection));
}
   
    
    
$query = "SELECT user_confirm_password FROM users";
$select_user_confirm_password_query = mysqli_query($connection, $query);   
if(!$select_user_confirm_password_query) {
die("Query Failed" . mysqli_error($connection));
}
    
//$row = mysqli_fetch_array($select_user_confirm_password_query);
//$salt = $row['user_confirm_password'];
//$confirm_password = crypt($confirm_password, $salt);
    
//$query = "INSERT INTO users (username, user_email, user_password, user_confirm_password, user_role) ";
//$query .= "VALUES('{$username}', '{$email}', '{$password}', '{$confirm_password}', 'subscriber')";
//$register_user_query = mysqli_query($connection, $query);
//if(!$register_user_query) {
//die("QUERY FAILED". mysqli_error(connection) . '' . mysqli_error(connection));
//}
    
    
$message = "Your Registration has been submitted";
    
} else {
$message = "Fields cannot be empty";
}
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
               <h1>Register</h1>
               <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                 <h4 class="text-center"><?php echo $message; ?></h4>
                  <div class="form-group">
                     <label for="username" class="sr-only">username</label>
                     <input type="text" name="username" id="username" class="form-control text-center" placeholder="Enter Desired   Username">
                    
                  </div>
                  <div class="form-group">
                     <label for="email" class="sr-only">Email</label>
                     <input type="email" name="email" id="email" class="form-control text-center"  placeholder="somebody@example.com">
                      
                  </div>
                   
                   <div class="form-group">
                      <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password" id="key" class="form-control text-center" placeholder="password">
                       
                   </div>
                   
                   <div class="form-group">
                      <label for="confirm password" class="sr-only">Confirm Password</label>
                      <input type="confirm password" name="confirm password" id="key" class="form-control text-center" placeholder="confirm password">
                       
                   </div>
                   
                   <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                   
               </form>
                
            </div>
             
         </div> 
          
      </div>
       
   </div>
    
</section>
</div>
<hr>
<?php include "includes/footer.php"; ?>