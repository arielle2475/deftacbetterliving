<?php

//////FIRST WE SET UP THE TOTAL images PER PAGE & CALCULATIONS:
// Number of images per page, change for a different number of images per page

// number of rows per page
$per_page = 5;
if(isset($_POST['num_rows'])){
    $per_page = $_POST['num_rows'];
}
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
$admins = "SELECT count(comment_id) FROM comments ORDER by comment_id ASC";
$query = mysqli_query($connection, $admins);

$row = mysqli_fetch_array($query);
$total_admins = $row[0];

// Calculate the number of pages:
if ($total_admins > $per_page) {//If there is more than one page
$pages_total = ceil($total_admins / $per_page);
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
<table class="table table-hover">
                            <thead>
                            <tr class="text-center" style="font-size:12px;color: rgb(255,255,255);background-color: #333332;">
                                    <th>Id</th>
                                    <th>Post ID</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Post Name</th>
                                    <th>Date</th>
                                    <th>Content</th>
                                    <th>Approval Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM comments ORDER BY comment_id ASC LIMIT $offset, $per_page";
                                $get_comments = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_comments)){
                                    
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                    $comment_content = substr($row['comment_content'],0,25);
                                    
                                    
                                    echo "<tr>";
                                    echo "<td class='border rounded-0'>$comment_id</td>";
                                    echo "<td class='border rounded-0'>$comment_post_id</td>";
                                    echo "<td class='border rounded-0'>$comment_author</td>";
                                    echo "<td class='border rounded-0'>$comment_email</td>";
                                    
                                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                    $get_comment_post = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($get_comment_post)){
                                        
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        
                                        echo "<td class='border rounded-0'><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";
                                    }
                                    
                                    echo "<td class='border rounded-0'>$comment_date</td>";
                                    echo "<td class='border rounded-0'>$comment_content"."..."."</td>";
                                    $active=$row['isactive'];
                                    
                                    $row = json_encode($row);

                                          
                                    if($comment_status == "Approved"){
                                        echo "<td class='text-center border rounded-0'> <a href='comment.php?unapprove={$comment_id}'><button class='btn  p-2 mr-2 mb-2'  style='color: white;font-weight: bold;background-color: rgb(40,167,69);'>Approved</button></a></td>"
                                    ;}
                                    if($comment_status == "Unapproved"){
                                        echo "<td class='text-center border rounded-0'> <a href='comment.php?approve={$comment_id}'><button class='btn = p-2 mr-2 mb-2'  style='color: white;font-weight: bold;background-color: rgb(220,53,69);'>Unapproved</button></a></td>"
                                    ;}
                                    echo "<td class='text-center border rounded-0'><a class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(220,53,69);' data-toggle='modal' data-target='#myModal' data-href='comment.php?delete=$comment_id' href='javascript:void(0)'>Delete</a> 
                                    </td></tr>";    

                                    echo "</tr>";
              
                                }
                                ?>
                                
                                <?php
                                 if(isset($_GET['unapprove'])){
                                    
                                    comment_unapprove();
                                }
                                
                                 if(isset($_GET['approve'])){
                                    
                                    comment_approve();
                                }
                                
                                if(isset($_GET['delete'])){
                                    
                                    comment_delete();
                                }
                                
                                ?> 
                                  </tbody>
                        </table></div></div>
                        <div id="pagination"><!-- #pagination start -->
<?php 
$i = 1;//Set the $i counting variable to 1

echo '<div style="text-align: center; padding:10px;"  id="pageNav"'.$display.'>';//our $display variable will do nothing if more than one page
echo '<h6'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h6>';//Page out of total pages

// Show the page buttons:
if ($page) {
echo '  <div class="btn-group mr-2" role="group" aria-label="First group">
<a href="comment.php"><button  class="btn btn-outline-dark" style="color="black; padding:5px;"><<</button></a>';//Button for first page [<<]
echo '<a href="comment.php?page='.$page_down.'"><button  class="btn btn-outline-dark"><</button></a>';//Button for previous page [<]
} 

for ($i=1;$i<=$pages_total;$i++) {
if(($i==$page+1)) {
echo '<a href="comment.php?page='.$i.'"><button  class="btn btn-outline-dark active">'.$i.'</button></a>';//Button for active page, underlined using 'active' class
}

//In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {//This is set for two below and two above the current page
echo '<a href="comment.php?page='.$i.'"><button  class="btn btn-outline-dark">'.$i.'</button></a>'; }
} 

if (($page + 1) != $pages_total) {
echo '<a href="comment.php?page='.$page_up.'"><button  class="btn btn-outline-dark">></button></a>';//Button for next page [>]
echo '<a href="comment.php?page='.$pages_total.'"><button  class="btn btn-outline-dark">>></button></a>';//Button for last page [>>]
}
echo "</div></div>";// #pageNav end
?>

</div>
</div>
</div>
</div>
</div>
</div>
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

