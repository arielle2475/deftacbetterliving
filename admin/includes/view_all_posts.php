
        <?php
        if(isset($_POST['checkBoxArray'])){

            bulk_post_options();
        }
        if(isset($_GET['delete'])){
            
            delete_posts(); 
        }
        ?>
          <style>
              #BulkOptionContainer{
                  padding:0;
              }
            
            </style>
           <div >
           <form action="" method="post" class="row">
            <div id="BulkOptionContainer" class="col-md-4">
                    <select class="form-control" name="bulk_options" id="">
                        <option value="">Select Option</option>
                        <option value="Draft">Draft</option>
                        <option value="Publish">Publish</option>
                        <option value="Delete">Delete</option>
                        <option value="Clone">Clone</option>
                        <option value="Reset Views">Reset Views</option>
                    </select>
<br>            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Apply">
                <a class="btn btn-primary" href="posts.php?source=add_posts">Add New Post</a>
            </div>
            
            <table id="myTable" class="table">
            <thead>
                                <tr class="text-center" style="font-size:12px;color: rgb(255,255,255);background-color: #333332;">
                                    <th class="border rounded-0"></th>
                                    <th class="border rounded-0">ID</th>
                                    <th class="border rounded-0">Author</th>
                                    <th class="border rounded-0">Title</th>
                                    <th class="border rounded-0">Category</th>
                                    <th class="border rounded-0">Status</th>
                                    <th class="border rounded-0">Image</th>
                                    <th class="border rounded-0">Comment No.</th>
                                    <th class="border rounded-0">Post Views</th>
                                    <th class="border rounded-0">Date</th>
                                    <th class="border rounded-0">Content</th>
                                    <th class="border rounded-0">Delete</th>
                                    <th class="border rounded-0">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM posts ORDER BY post_id DESC";
                                $get_posts = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_posts)){
                                    
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    
                                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                                    $get_comment_count = mysqli_query($connection,$query);
                                    $post_comment_count = mysqli_num_rows($get_comment_count);
                                    
                                    $post_category_id = $row['post_category_id'];
                                    $post_status = $row['post_status'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_date = $row['post_date'];
                                    $post_views = $row['post_views'];
                                    $post_content = substr($row['post_content'],0,150);
                                    
                                    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                    $get_categories = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($get_categories)){
                                        $cat_title = $row['cat_title'];
                                    }
                                    
                                    echo "<tr>";
                                    ?>
                                    <td class='border rounded-0'><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
                                                                       
                                    <?php
                                    echo "<td class='border rounded-0'>$post_id</td>";
                                    echo "<td class='border rounded-0'>$post_author</td>";
                                    echo "<td class='border rounded-0'><a href='../post.php?post_id=$post_id'>$post_title</a></td>";
                                    echo "<td class='border rounded-0'>$cat_title</td>";
                                    echo "<td class='border rounded-0'>$post_status</td>";
                                    echo "<td class='border rounded-0'><img width='100px' src='../images/$post_image' alt='images'></td>";
                                    echo "<td class='border rounded-0'>$post_comment_count</td>";
                                    echo "<td class='border rounded-0'>$post_views</td>";
                                    echo "<td class='border rounded-0'>$post_date</td>";
                                    echo "<td class='border rounded-0' style='font-size:10px'>$post_content</td>";
 
                                    echo "<td class='border rounded-0'>
                                    <a href='javascript:void(0)' data-href='posts.php?delete=$post_id' data-toggle='modal' data-target='#myModal' style='font-weight:bold;' class='btn btn-danger'>Delete</a></td>";
                                  //  echo "<td class='border rounded-0'><a rel='$post_id' href='javascript:void(0)' class='btn btn-danger delete_link'>Delete</a></td>";
//                                    echo "<td class='border rounded-0'><a onClick=\"javascript: return confirm('Are you sure?') \" class='btn btn-danger' href='posts.php?delete=$post_id'>Delete</a></td>";
                                    echo "<td class='border rounded-0'><a class='btn btn-warning' style='font-weight:bold; color:white;' href='posts.php?source=edit_posts&update=$post_id'>Update</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                  </tbody>
                        </table>
            </form>
                
<script>
  
  $('#myModal').on('show.bs.modal', function (e) {
	
    	$(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));

});
/*
$('document').ready(function(){
	
  $('.delete_link').on('click',function(){
        var id = $(this).attr("rel");
        var delete_url = "posts.php?delete="+id; 
        
        $('.modal_delete_link').attr('href', delete_url);
        
        $('#myModal').modal('show');
    })


});*/
    


</script>


