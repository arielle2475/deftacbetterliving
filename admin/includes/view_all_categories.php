<?php

$query = "SELECT * FROM categories";
$get_categories = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($get_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<tr><td class='border rounded-0'>{$cat_id}</td><td class='border rounded-0'>{$cat_title}</td>
<td class='text-center border rounded-0'><a class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(220,53,69);' data-toggle='modal' data-target='#myModal' data-href='categories.php?delete=$cat_id' href='javascript:void(0)'>Delete</a> 
<a class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(229,196,76);' href='categories.php?update={$cat_id}'>Update</a></td></tr>";

}

?>