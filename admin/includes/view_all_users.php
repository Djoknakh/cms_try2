
          <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>User_id</th>
                            <th>User_name</th>
                            <th>User_password</th>
                            <th>User_firstname</th>
                            <th>User_lastname</th>
                            <th>User_email</th>
                            <th>User_image</th>
                            <th>User_role</th>
                            <th>User_randSalt</th>
                            <th>Admin</th>
                            <th>Sub</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        global $connection;

                        $query = "SELECT * FROM users";
                        $select_users = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_users)) {
                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                            $user_password = $row['user_password'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
                            $user_randSalt = $row['user_randSalt'];


                            echo "<tr>";
                            echo "<td>{$user_id}</td>";
                            echo "<td>{$user_name}</td>";
                            echo "<td>{$user_password}</td>";
                            echo "<td>{$user_firstname}</td>";
                            echo "<td>{$user_lastname}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_image}</td>";
                            echo "<td>{$user_role}</td>";
                            echo "<td>{$user_randSalt}</td>";


//                            $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
//                            $select_post_id_query = mysqli_query($connection,$query);
//                            while ($row = mysqli_fetch_assoc($select_post_id_query)) {
//                                $post_id = $row['post_id'];
//                                $post_title = $row['post_title'];
//
//                                echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//                            }


                            echo "<td name='Admin'><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                            echo "<td name='Sub'><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                            echo "<td name='edit'><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
                            echo "<td name='delete'><a href='users.php?delete_user={$user_id}'>Delete</a></td>";
                            echo "</tr>";

                        }

                        ?>

                        </tbody>
                    </table>

          <?php


              if(isset ($_GET['change_to_admin'])) {

              $the_user_id = $_GET['change_to_admin'];
              $query = "UPDATE users SET user_role='admin' WHERE user_id='{$the_user_id}'";
              $change_to_admin_query = mysqli_query($connection,$query);
              header("Location:users.php");
          }

              if(isset ($_GET['change_to_sub'])) {

              $the_user_id = $_GET['change_to_sub'];
              $query = "UPDATE users SET user_role='subscriber' WHERE user_id='{$the_user_id}'";
              $change_to_sub_query = mysqli_query($connection,$query);
              header("Location:users.php");
          }



          if(isset ($_GET['delete_user'])) {

                $delete_user_id = $_GET['delete_user'];
                $query = "DELETE FROM users WHERE user_id={$delete_user_id}";
                $delete_user_query = mysqli_query($connection,$query);
                header("Location:users.php");
            }

          ?>


