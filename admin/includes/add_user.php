<?php

if (isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
  //  $post_date = date('d-m-y');
  //  $post_comment_count = 4;

  //  move_uploaded_file($post_image_temp,"../img/$post_image");

    global $connection;
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_name, user_email, user_password)";
    $query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', 
    '{$user_name}', '{$user_email}', '{$user_password}')";


    $add_user_query = mysqli_query($connection, $query);
    confirm($add_user_query);

    echo ("User created: " . "<a href='users.php'>View Users</a>");
}
?>


 <form action="" method="post" enctype="multipart/form-data">


     <div class="form-group">
         <label for="post_author">Firstname</label>
         <input type="text" class="form-control" name="user_firstname">
     </div>

     <div class="form-group">
         <label for="post_status">Lastname</label>
         <input type="text" class="form-control" name="user_lastname">
     </div>

     <select name="user_role" id="">
         <option value="subscriber">Select Options</option>
         <option value="admin">Admin</option>
         <option value="subscriber">Subscriber</option>
     </select>







<!-- <div class="form-group">-->
<!--    <label for="post_image">Post Image</label>-->
<!--    <input type="file"  name="image">-->
<!-- </div>-->


 <div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text" class="form-control" name="user_name">
 </div>

 <div class="form-group">
    <label for="post_tags">Email</label>
    <input type="text" class="form-control" name="user_email">
 </div>

 <div class="form-group">
         <label for="post_author">Password</label>
         <input type="text" class="form-control" name="user_password">
 </div>

<div class="form-group">
    <input class = "btn btn-primary" type="submit" name="create_user" value="create user">
</div>


</form>