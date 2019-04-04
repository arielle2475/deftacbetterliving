
    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" style="margin:0%; height: 100vh;" data-backdrop="false"aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
<!-- Modal Content -->
   
   <div class="modal-content">
       
       <div class="modal-container">
       <div class="modal-header bg-dark" style="background-color: black;height: 66px;padding: 13px;">
       <h4 class="modal-title" style="color: rgb(255,255,255); font-weight:bold;">Add</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            </div>
       <div class="modal-body" style="height: 200px;">
				<div class="container-fluid">
				<form method="POST" action="addnew.php">
					
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Announcement:</label>
						</div>
						<div class="col-lg-12">
							<input type="text" class="form-control" name="announcement">
					</div>
					<div style="height:10px;"></div>
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Details:</label>
						</div>
						<div class="col-lg-12">
							<input type="text" class="form-control" name="details">
						</div>

				</div></div>
               
       <div class="modal-footer" style="height: 57px;">
	   <button type="submit" class="btn btn-success"style="font-weight:bold; color: rgb(255,255,255);"></span>Add</button>
	   <button type="button" class="btn btn-default" data-dismiss="modal" style="font-weight:bold; color:white; background-color: #dc1a1a;"> Cancel</button>
       </div>		</form>
                
				
            </div>
        </div>
    </div>
