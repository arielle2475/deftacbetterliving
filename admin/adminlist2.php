<?php
 include "../includes/database.php"
$selected=mysqli_query($conn,"SELECT * FROM admins");
$i=1;
?>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  
  <?php 
  
while($personrow=mysqli_fetch_array($selected))

{
    $personid=$personrow['id'];
    $adminname=$personrow['adminname'];
 
?>
		<div class="col-sm-2">
	<a href="" data-toggle="modal" data-target="#<?php echo $personid ?>" class="thumbnail home-thumb"><img src="<?php echo $personimage;?>" alt=""></a>
	<p><h5 align="center"><?php echo $adminname; ?></h5></p>
	<hr/>
	</div>

	<div id="<?php echo $personid ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
	<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="btn btn-info close" data-dismiss="modal">Close Form &times;</button>
<h4 class="modal-title">Full Information of the Person</h4>
</div>
<div class="modal-body">
	
	<p>hiiiiiiiiiiiiiiii</p>
  <p><?php echo $FirstName; ?></p>
  <!--  <h5><b> Person's Name: </b></h5><?php echo $adminname; ?></p>
    <hr/>
    <p><h5><b>Person's Middle Name: </b></h5><?php echo $adminemail; ?></p>
    <p><h5><b>Person's Last Name: </b></h5><?php echo $isactive; ?></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close Form</button>
</div>
</div>
</div>
</div>

<?php
include('../includes/database.php');
$selected=mysql_query("SELECT * FROM admins order by id");
$i=1;
while($personrow=mysql_fetch_array($selected))

{
    $personid=$personrow['id'];
    $personimage=$personrow['adminavatar'];
    $adminname=$personrow['adminname'];
    $adminemail=$personrow['adminemail'];
    $isactive=$personrow['isactive'];

?>