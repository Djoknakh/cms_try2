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
//$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,
//                  post_image, post_content, post_tags, post_status)";
//$query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(),
//                  '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
//
//
//$create_post_query = mysqli_query($connection, $query);
//confirm($create_post_query);

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
                <h1>Register</h1>
                    <h6 class="text-center"><strong><?= $message ?></strong></h6>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
