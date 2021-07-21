<?php


if (isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];
}

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_by_id)) {
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_randSalt = $row['user_randSalt'];
}

if (isset($_POST['edit_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    //  move_uploaded_file($post_image_temp,"../img/$post_image");

    global $connection;

    $query = "SELECT user_randSalt FROM users";
    $select_randSalt_query = $connection->query($query);
    confirm($select_randSalt_query);

    $row = $select_randSalt_query->fetch_array();
    $salt = $row['user_randSalt'];

    $hashed_password = crypt($user_password,$salt);

    $query = "UPDATE users SET ";
    $query.= "user_name = '{$user_name}', ";
    $query.= "user_password = '{$hashed_password}', ";
    $query.= "user_firstname = '{$user_firstname}', ";
    $query.= "user_lastname = '{$user_lastname}', ";
    $query.= "user_email = '{$user_email}', ";
    $query.= "user_image = '{$user_image}', ";
    $query.= "user_role = '{$user_role}', ";
    $query.= "user_randSalt = '{$user_randSalt}' ";
    $query.= "WHERE user_id = '{$the_user_id}'";

    $edit_user_query = mysqli_query($connection,$query);
    confirm($edit_user_query);



}
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="post_author">Firstname</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
    </div>

    <select name="user_role" id="">
        <option value="<?php echo $user_role ?>"> <?php echo $user_role ?> </option>

        <?php
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>subscriber</option>";
            }
            else {
               echo "<option value='admin'>admin</option>";
            }

        ?>



    </select>







    <!-- <div class="form-group">-->
    <!--    <label for="post_image">Post Image</label>-->
    <!--    <input type="file"  name="image">-->
    <!-- </div>-->


    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" value="<?php echo $user_name ?>" name="user_name">
    </div>

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_author">Password</label>
        <input type="password" class="form-control" value="<?php echo $user_password ?>" name="user_password">
    </div>

    <div class="form-group">
        <input class = "btn btn-primary" type="submit" name="edit_user" value="edit user">
    </div>


</form>