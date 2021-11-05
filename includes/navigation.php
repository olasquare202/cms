
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front</a>
            </div>
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        
    <?php 
    $query = "SELECT * FROM categories LIMIT 4"; 
    $select_all_categories_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_categories_query)) {$cat_title = $row['cat_title']; 
    $cat_id = $row['cat_id']; 
    
    $category_class = '';
    $registration_class = '';
    $contact_class  = '';                                                                
    
    $pageName = basename($_SERVER['PHP_SELF']);
    $registration = 'registration.php';
    $contact =  'contact.php';                                                              
                                                                    
    if(isset($_GET['category']) && $_GET['category'] == $cat_id) {
    $category_class = 'active';
    
    } else if ($pageName == $registration) {
    
    $registration_class = 'active';
    
    } else if ($pageName == $contact) {
    $contact_class = 'active';
    
    }
                                                                    
                                                                    
                                                                    
echo "<li class='$category_class'><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";}
       
                    ?>
                   
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    
                    <a class="navbar-brand" href="../cms/admin/posts.php?source=add_post">Add Post</a>
                    
            <li class='<?php echo $registration_class; ?>'> 
        <a href="registration.php">Registration</a>
            </li>
             
             <li class='<?php echo $contact_class; ?>'> 
             <a href="contact.php">Contact</a>
<!--              <a class="navbar-brand" href="contact.php">Contact</a>-->
         
            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> About Us 

                   
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="history.php"><i class="fa fa-fw fa-user"></i> Our History</a>
                        </li>
                        <li>
                            <a href="services.php"><i class="fa fa-fw fa-envelope"></i> Our Services</a>
                        </li>
                        
                     
                        <li class="divider"></li>
                        
                    </ul>
                </li>
                            
<?php 
if(isset($_SESSION['user_role'])) {
    
if(isset($_GET['p_id'])) {
    
$the_post_id = $_GET['p_id'];
    
echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";



}

}           
            
            
            
?>                 
                       
                        
                         
                          
                            

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>