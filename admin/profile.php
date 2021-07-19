<?php
include "includes/admin_header.php";
?>

<?php

    if (isset($_SESSION['user_name'])) {
        $user_name = $_SESSION['user_name'];

        $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
        $select_user_profile_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {

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
    }

?>

<?php

if (isset($_POST['update_profile'])) {

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

    $query = "UPDATE users SET ";
    $query.= "user_password = '{$user_password}', ";
    $query.= "user_firstname = '{$user_firstname}', ";
    $query.= "user_lastname = '{$user_lastname}', ";
    $query.= "user_email = '{$user_email}', ";
    $query.= "user_image = '{$user_image}', ";
    $query.= "user_role = '{$user_role}', ";
    $query.= "user_randSalt = '{$user_randSalt}' ";
    $query.= "WHERE user_name = '{$user_name}'";

    $update_profile_user_query = mysqli_query($connection,$query);

    confirm($update_profile_user_query);

}

?>

<div id="wrapper">

    <!-- Navigation -->


    <?php include "includes/admin_navigation.php"; ?>




    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>


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
                            <option value="subscriber"> <?php echo $user_role ?> </option>

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
                            <input class = "btn btn-primary" type="submit" name="update_profile" value="Update profile">
                        </div>


                    </form>



                    </div>

<!--                    <ol class="breadcrumb">-->
<!--                        <li>-->
<!--                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>-->
<!--                        </li>-->
<!--                        <li class="active">-->
<!--                            <i class="fa fa-file"></i> Hello lalala-->
<!--                        </li>-->
<!--                    </ol>-->
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include "includes/admin_footer.php" ?>



    <!-- /#page-wrapper -->

