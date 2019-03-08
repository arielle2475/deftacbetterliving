<form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Edit Category</label>
            <?php  //Update categories

            if(isset($_GET['update'])){
                $upt_id = $_GET['update'];
                $query = "SELECT * FROM categories WHERE cat_id = $upt_id";
                $update_categories = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($update_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
            ?>

                <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)){ echo $cat_title;} ?>">

                <?php } }

                if(isset($_POST['update_category'])){
                    $cat_title = $_POST['cat_title'];
                    $query = "UPDATE categories SET cat_title ='$cat_title' WHERE cat_id = $cat_id ";
                    $update_categories= mysqli_query($connection,$query);
                    confirm_query($update_categories);
                    header("Location: categories.php");
                }

                ?>
    </div>
    <div class="form-group">
    <input type="submit" name="update_category" class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(229,196,76);' value="Update Category">
    </div>
</form>