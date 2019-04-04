
<?php
include('database_connection.php');
$query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
<table class="table table-hover">
<thead>

<tr class="text-center" style="height:60px; font-size:13px;color: rgb(255,255,255);background-color: #333332;">
<th style="padding-bottom:20px;" class="text-center"  border rounded-0>Sr. No</th>
   <th style="padding-bottom:20px;" class="text-center"  border rounded-0>Image</th>
   <th style="padding-bottom:20px;" class="text-center"  border rounded-0>Name</th>
   <th style="padding-bottom:20px;" class="text-center" border rounded-0>Description</th>
   <th style="padding-bottom:20px;" class="text-center"  border rounded-0>Edit</th>
   <th style="padding-bottom:20px;" class="text-center"  border rounded-0>Delete</th>
  </tr>
  </thead>
<tbody>
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <tr >
   <td class="border rounded-0">'.$row["image_id"].'</td>
   <td class="text-center border rounded-0"><img src="gallery/files/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
   <td class="border rounded-0">'.$row["image_name"].'</td>
   <td class="border rounded-0">'.$row["image_description"].'</td>
   <td class="text-center border rounded-0"><button type="button" style="color:white; background:#ffd221;font-weight:bold;font-size:18px;" class="btn  btn-l edit" id="'.$row["image_id"].'">Edit</button></td>
   <td class="text-center border rounded-0"><button type="button" style="color:white; background:#d1101a;font-weight:bold;font-size:18px;"class="btn btn-l delete" id="'.$row["image_id"].'" data-image_name="'.$row["image_name"].'">Delete</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
  <tr>
   <td class="border rounded-0" colspan="6" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</tbody></table>';
echo $output;
?>
