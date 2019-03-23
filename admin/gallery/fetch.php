

 <?php include "../../includes/database.php"?>
 <?php include "database_connection.php"?>
 <?php include "../functions.php"; ?>

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
$image = "SELECT count(image_id) FROM tbl_image ORDER by image_id ASC";
$result = mysqli_query($connection, $image);

$row = mysqli_fetch_array($result);
$total_images = $row[0];

// Calculate the number of pages:
if ($total_images > $per_page) {//If there is more than one page
$pages_total = ceil($total_images / $per_page);
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
    <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
    <th class="border rounded-0">ID</th>
    <th style="padding-bottom:20px;" class="text-center border rounded-0" >Image</th>
   <th style="padding-bottom:20px;" class="text-center  border rounded-0">Name</th>
   <th style="padding-bottom:20px;" class="text-center border rounded-0">Description</th>
   <th style="padding-bottom:20px;" class="text-center  border rounded-0">Edit</th>
   <th style="padding-bottom:20px;" class="text-center  border rounded-0">Delete</th>
    </tr>
</thead>
<tbody>

<?php
// DISPLAY THE images:
//Select the images from the table limited as per our $offet and $per_page total:
$query = "SELECT * FROM tbl_image ORDER by image_id ASC LIMIT $offset, $per_page";

$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($result)) {//Open the while array loop

//Define the image variable:
$image=$row['image_id'];

        echo "<tr>
        <td class='border rounded-0'>" . $row["image_id"]. "</td> 
        <td class='text-center border rounded-0'><img class='img-thumbnail border rounded-0 shadow-sm' src='files/".$row["image_name"]."' width='100px' height='100px' style='width: 100px;'></td>
        <td class='border rounded-0'>" . $row["image_name"]. "</td> 
        <td class='border rounded-0'>" . $row["image_description"]. "</td>   
        <td class='text-center border rounded-0'><button type='button' style='color:white; background:#ffd221;font-weight:bold;font-size:18px;' class='btn  btn-l edit' id=".$row['image_id'].">Edit</button></td>
        <td class='text-center border rounded-0'><a href='javascript:void(0)' data-href='gallery.php?delete=$image' data-toggle='modal' data-target='#myModal' style='color:white; background:#d1101a;font-weight:bold;font-size:18px;' class='btn btn-l'>Delete</a></td>

        </tr>
       ";
              


}//Close the while array loop

echo '</div> </tbody>
</table>';// Gallery end

echo '<div class="clearfix"></div>';// Gallery end



?>
</div></div>                    <div id="pagination"><!-- #pagination start -->
<?php 
                            $i = 1;//Set the $i counting variable to 1

                            echo '<div style="text-align: center; padding:10px;"  id="pageNav"'.$display.'>';//our $display variable will do nothing if more than one page
                            echo '<h6'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h6>';//Page out of total pages

                            // Show the page buttons:
                            if ($page) {
                            echo '  <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a href="gallery.php"><button  class="btn btn-outline-dark" style="color="black; padding:5px;"><<</button></a>';//Button for first page [<<]
                            echo '<a href="gallery.php?page='.$page_down.'"><button  class="btn btn-outline-dark"><</button></a>';//Button for previous page [<]
                            } 

                            for ($i=1;$i<=$pages_total;$i++) {
                            if(($i==$page+1)) {
                            echo '<a href="gallery.php?page='.$i.'"><button  class="btn btn-outline-dark active">'.$i.'</button></a>';//Button for active page, underlined using 'active' class
                            }
                            
                            //In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
                            if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {//This is set for two below and two above the current page
                            echo '<a href="gallery.php?page='.$i.'"><button  class="btn btn-outline-dark">'.$i.'</button></a>'; }
                            } 

                            if (($page + 1) != $pages_total) {
                            echo '<a href="gallery.php?page='.$page_up.'"><button  class="btn btn-outline-dark">></button></a>';//Button for next page [>]
                            echo '<a href="gallery.php?page='.$pages_total.'"><button  class="btn btn-outline-dark">>></button></a>';//Button for last page [>>]
                            }
                            echo "</div></div>";// #pageNav end
                            ?>
                            <form method="post" action="" id="form">
            <div id="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">

                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

