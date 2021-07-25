<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "admin/functions.php"; ?>

<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = $connection->real_escape_string($username);
    $email = $connection->real_escape_string($email);
    $password = $connection->real_escape_string($password);

    if (!empty($username) && (!empty($email)) && (!empty($password))) {


    $query_salt = "SELECT user_randSalt FROM users";
    $select_randSalt_query = mysqli_query($connection,$query_salt);
    confirm($select_randSalt_query);

    $row = mysqli_fetch_array($select_randSalt_query);

    $salt = $row['user_randSalt'];
    $password = crypt ($password, $salt);

    $query = "INSERT INTO users (user_name, user_email, user_password, user_role) VALUES ('{$username}', '{$email}', '{$password}', 'subscriber')";
    $add_user_query = $connection->query($query);
    confirm($add_user_query);

    $message = "Your registration has been submitted";

    }
    else {
        $message = 'Fields cannot be empty';
    }


}
else {
    $message="";
}


?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>

                    <form role="form" action="" method="post" id="login-form" autocomplete="off">

                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="" name="email" id="subject" class="form-control" placeholder="Enter your subject">
                        </div>
                         <div class="form-group">
                             <textarea class="form-control" name="" id="" cols="50" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>