<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" style="margin:0%; height: 100vh;" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
<!-- Modal Content -->
   
   <div class="modal-content">
       
       <div class="modal-container">
       <div class="modal-header bg-dark" style="background-color: black;height: 66px;padding: 13px;">
       <h4 class="modal-title" style="color: rgb(255,255,255); font-weight:bold;">Delete</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            </div>
       <div class="modal-body" style="height: 200px;">
				<?php
					$del=mysqli_query($conn,"select * from announcement where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h1><center><strong><?php echo $drow['announcement']; ?></strong></center></h1> 
					<h5><center><strong><?php echo $drow['details']; ?></strong></center></h5> 

                </div> 
				</div>
				<div class="modal-footer" style="height: 57px;">
					<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-weight:bold; color: rgb(255,255,255);"></span> Delete</a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" style="font-weight:bold; color: rgb(255,255,255);"></span> Cancel</button>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
<!-- Modal  -->
<div id="edit<?php echo $row['id']; ?>" style="margin:0%; height: 100vh;" data-backdrop="false"class="modal fade" role="dialog" tabindex="-1" style="opacity: 1;font-family: Montserrat, sans-serif;">
<div class="modal-dialog" role="document">
<!-- Modal Content -->
   
   <div class="modal-content">
       
       <div class="modal-container">
       <div class="modal-header bg-dark" style="background-color: black;height: 66px;padding: 13px;">
       <h4 class="modal-title" style="color: rgb(255,255,255); font-weight:bold;">Edit</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            </div>
       <div class="modal-body" style="height: 200px;">
	   <?php
					$edit=mysqli_query($conn,"select * from announcement where id='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Announcement:</label>
						</div>
						<div class="col-lg-12">
							<input type="text" name="announcement" class="form-control" value="<?php echo $erow['announcement']; ?>">
						</div>
					<div style="height:10px;"></div>
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Details:</label>
						</div>
						<div class="col-lg-12">
							<input type="text" name="details" class="form-control" value="<?php echo $erow['details']; ?>">
						</div>
					
                </div>        </div>
       <div class="modal-footer" style="height: 57px;">
	   <button type="button" class="btn btn-default" data-dismiss="modal" style="font-weight:bold; color:white; background-color: #dc1a1a;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning" style="font-weight:bold; color: rgb(255,255,255);"><span class="glyphicon glyphicon-check"></span> Save</button>
	   </div>
	   </form>

    </div>
   </div>
   </div>
</div>
<!-- /.modal -->