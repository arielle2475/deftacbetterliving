
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
                <input type="submit" class="btn btn-success" style="font-weight:bold;" value="Apply">
                <a class="btn btn-success" style="font-weight:bold;" href="posts.php?source=add_posts">Add New Post</a>
            </div>
            

            <?php

//////FIRST WE SET UP THE TOTAL images PER PAGE & CALCULATIONS:
// Number of images per page, change for a different number of images per page

// number of rows per page
$per_page = 5;

// Get the page and offset value:
if (isset($_GET['page'])) {
$page = $_GET['page'] - 1;
$offset = $page * $per_page;
}
else {
$page = 0;
$offset = 0;
} 

// Count the total number of images in the table ordering by their id's ascending:
$post_id = "SELECT count(post_id) FROM posts ORDER by post_id ASC";
$query = mysqli_query($connection, $post_id);

$row = mysqli_fetch_array($query);
$total_posts = $row[0];

// Calculate the number of pages:
if ($total_posts > $per_page) {//If there is more than one page
$pages_total = ceil($total_posts / $per_page);
$page_up = $page + 2;
$page_down = $page;
$display ='';//leave the display variable empty so it doesn't hide anything
} 
else {//Else if there is only one page
$pages = 1;
$pages_total = 1;
$display = ' class="display-none"';//class to hide page count and buttons if only one page
} 

////// THEN WE DISPLAY THE PAGE COUNT AND BUTTONS:
?>
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
                                    <th class="border rounded-0">Delete</th>
                                    <th class="border rounded-0">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php

                                $query = "SELECT * FROM posts ORDER BY post_id ASC LIMIT $offset, $per_page";
                                $get_posts = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($get_posts)){
                                    $post_id=$row['post_id'];

                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    
                                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
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
 
                                    echo "<td class='border rounded-0'><a href='javascript:void(0)' data-href='posts.php?delete=$post_id' data-toggle='modal' data-target='#myModal' style='font-weight:bold;' class='btn btn-danger'>Delete</a></td>";
                                  //  echo "<td class='border rounded-0'><a rel='$post_id' href='javascript:void(0)' class='btn btn-danger delete_link'>Delete</a></td>";
//                                    echo "<td class='border rounded-0'><a onClick=\"javascript: return confirm('Are you sure?') \" class='btn btn-danger' href='posts.php?delete=$post_id'>Delete</a></td>";
                                    echo "<td class='border rounded-0'><a class='btn btn-warning' style='font-weight:bold; color:white;' href='posts.php?source=edit_posts&update=$post_id'>Update</a></td>";
                                    echo "</tr>";
                                }
                               
                            
                            echo '</div> </tbody>
                            </table></div></div>';// Gallery end
                          
                            echo '<div class="clearfix"></div></div>  ';// Gallery end


                          


                            $i = 1;//Set the $i counting variable to 1

                            echo '<div style="text-align: center; padding:10px;"  id="pageNav"'.$display.'>';//our $display variable will do nothing if more than one page
                            echo '<h6'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h6>';//Page out of total pages
        
                            // Show the page buttons:
                            if ($page) {
                            echo '  <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a href="posts.php" class="btn btn-outline-dark" style="color="black; padding:5px;"><<</a>';//Button for first page [<<]
                            echo '<a href="?page='.$page_down.'" class="btn btn-outline-dark"><</a>';//Button for previous page [<]
                            } 
        
                            for ($i=1;$i<=$pages_total;$i++) {
                            if(($i==$page+1)) {
                            echo '<a href="?page='.$i.'" class="btn btn-outline-dark active">'.$i.'</a>';//Button for active page, underlined using 'active' class
                            }
        
                            //In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
                            if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {//This is set for two below and two above the current page
                            echo '<a href="?page='.$i.'" class="btn btn-outline-dark">'.$i.'</a>'; }
                            } 
        
                            if (($page + 1) != $pages_total) {
                            echo '<a href="?page='.$page_up.'" class="btn btn-outline-dark">></a>';//Button for next page [>]
                            echo '<a href="?page='.$pages_total.'" class="btn btn-outline-dark">>></a>';//Button for last page [>>]
                            }
                            echo "</div></div";// #pageNav end
                            ?>
  
                  <div id="pagination"><!-- #pagination start -->

                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


