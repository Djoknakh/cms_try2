<?php

include ("delete_modal.php");


if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValueId) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':

              $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postValueId}'";
              $update_to_published_status = mysqli_query($connection,$query);

              confirm($update_to_published_status);
                break;

            case 'draft':

                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = '{$postValueId}'";
                $update_to_draft_status = mysqli_query($connection,$query);

                confirm($update_to_draft_status);
                break;

            case 'delete':

                $query = "DELETE FROM posts WHERE post_id = '{$postValueId}'";
                $update_to_delete_status = mysqli_query($connection,$query);

                confirm($update_to_delete_status);
                break;

            case 'clone':

                $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}'";
                $select_post_query = mysqli_query($connection,$query);

                confirm($select_post_query);

                while ($row = mysqli_fetch_array($select_post_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, 
                  post_image, post_content, post_tags, post_status)";
                $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), 
                  '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";

                $clone_post_query = mysqli_query($connection, $query);
                confirm($clone_post_query);
                break;
        }
    }
}

?>



        <form action="" method="post">
          <table class="table table-bordered table-hover">

             <div id="bulkOptionContainer" class="col-xs-4">
                  <select class="form-control" name="bulk_options" id="">
                      <option value="">Select Options</option>
                      <option value="published">Publish</option>
                      <option value="clone">Clone</option>
                      <option value="draft">Draft</option>
                      <option value="delete">Delete</option>
                  </select>

              </div>

              <div class="col-xs-4">
                  <input type="submit" name="submit" class="btn btn-success" value="Apply">
                  <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
              </div>
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllBoxes"" ></th>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Content</th>
                            <th>Comments</th>
                            <th>Views</th>
                            <th>Date</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        global $connection;

                        $query = "SELECT * FROM posts ORDER BY post_id DESC";
                        $select_posts = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_posts)) {
                            $post_id = $row['post_id'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_category_id = $row['post_category_id'];
                            $post_status = $row['post_status'];
                            $post_image = $row['post_image'];
                            $post_tags = $row['post_tags'];
                            $post_content = $row['post_content'];
                            $post_comment_count = $row['post_comment_count'];
                            $post_date = $row['post_date'];
                            $post_views_count = $row['post_views_count'];

                            echo "<tr>";
                            ?>

                            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id?>'></td>

                            <?php
                            echo "<td>{$post_id}</td>";
                            echo "<td>{$post_author}</td>";
                            echo "<td>{$post_title}</td>";

                            $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                            $select_categories_id = mysqli_query($connection, $query);

                            confirm($select_categories_id);

                            while ($row=mysqli_fetch_assoc($select_categories_id)) {
                                $cat_title = $row['cat_title'];
                                echo "<td>{$cat_title}</td>";
                            }



                            echo "<td>{$post_status}</td>";
                            echo "<td><img src='../img/{$post_image}' width='100' class = 'img-rounded' alt='image'></td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$post_content}</td>";
                            echo "<td>{$post_comment_count}</td>";
                            echo "<td>{$post_views_count}</td>";
                            echo "<td>{$post_date}</td>";
                            echo "<td name='view'><a href='../post.php?p_id={$post_id}'>view</a></td>";
                            echo "<td name='edit'><a href='posts.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
//                            echo "<td name='delete'><a onClick=\"javasript: return confirm('Are you sure want to delete?'); \" href='posts.php?delete={$post_id}'>delete</a></td>";
                            echo "<td name='delete'><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                            echo "</tr>";

                        }
                        ?>

                        </tbody>
                    </table>
              </form>


          <?php
            if(isset ($_GET['delete'])) {

                $delete_post_id = $_GET['delete'];
                $query = "DELETE FROM posts WHERE post_id={$delete_post_id}";
                $delete_post = mysqli_query($connection,$query);
                header("Location:posts.php");
            }

          ?>


<script>
    $(document).ready(function () {
        $(".delete_link").on('click', function() {
            let id = $(this).attr('rel');
            let delete_url = "posts.php?delete="+id+" ";

            $(".modal_delete_link").attr("href",delete_url);
            $("#myModal").modal('show');

        });

    });

</script>
