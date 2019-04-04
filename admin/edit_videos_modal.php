
<!-- Modal  -->
<div id="edit_videos<?php echo $row['id']; ?>" style="margin:0%; height: 100vh;" data-backdrop="false"class="modal fade" role="dialog" tabindex="-1" style="opacity: 1;font-family: Montserrat, sans-serif;">
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
					$edit=mysqli_query($conn,"select * from tbl_video where id='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit_videos.php?id=<?php echo $erow['id']; ?>">
					<div style="height:10px;"></div>
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Description:</label>
						</div>
						<div class="col-lg-12">
							<input type="text" name="description" class="form-control" value="<?php echo $erow['description']; ?>">
						</div>
					
                </div>        </div>
       <div class="modal-footer" style="height: 57px;">
	   <button type="submit" class="btn btn-success"style="font-weight:bold; color: rgb(255,255,255);"></span>Update</button>
	   <button type="button" class="btn btn-default" data-dismiss="modal" style="font-weight:bold; color:white; background-color: #dc1a1a;"> Cancel</button>
       </div>
	   </form>

    </div>
   </div>
   </div>
</div>