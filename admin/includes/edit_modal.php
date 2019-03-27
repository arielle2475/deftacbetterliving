<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


<!-- Modal  -->
<div id="myModaledit" class="modal fade" role="dialog" tabindex="-1" style="opacity: 1;font-family: Montserrat, sans-serif;">
<div class="modal-dialog" role="document">
<!-- Modal Content -->
   
   <div class="modal-content">
       
       <div class="modal-container">
       <div class="modal-header bg-dark" style="background-color: black;height: 66px;padding: 13px;">
       <h4 class="modal-title" style="color: rgb(255,255,255); font-weight:bold;">Delete</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            </div>
       <div class="modal-body" style="height: 98px;">
       <form action="" method="post">
    <div class="form-group">
    <label for="title">Edit Category</label>
            <?php  //Update tutorial

            if(isset($_GET['update'])){
                $upt_id = $_GET['update'];
                $query = "SELECT * FROM tutorials WHERE id = $upt_id";
                $update_tutorial = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($update_tutorial)){
                $id= $row['id'];
                $title = $row['title'];
                $desc = $row['description'];

                
            ?>

                <input type="text" name="title" class="form-control" value="<?php if(isset($title)){ echo $title;} ?>">

                <?php } }

                if(isset($_POST['update_category'])){
                    $title = $_POST['title'];
                    $query = "UPDATE tutorial SET title ='$title',description='$desc' WHERE id= $id";
                    $update_tutorial= mysqli_query($connection,$query);
                    confirm_query($update_tutorial);
                    header("Location: tutorials.php");
                }

                ?>
    </div>
    <div class="form-group">
    <span id='title'></span>
    <span id='desc'></span>

    <input type="submit" name="update_category" class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(229,196,76);' value="Update">
    </div>
</form>       </div>
       <div class="modal-footer" style="height: 57px;">
            <a class="btn btn-danger modal_delete_link" href="" style="font-weight:bold; background-color: #dc1a1a;">Delete</a>
            <button class="btn btn-warning" type="button" data-dismiss="modal" style="font-weight:bold; color: rgb(255,255,255);">Cancel</button>
       </div>
    </div>
   </div>
   </div>
</div>