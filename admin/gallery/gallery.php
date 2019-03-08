<head><!-- Fancybox CSS library -->
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

<style>
.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}
</style>
</head>

<div class="gallery">
    <?php
    // Include database configuration file
    require 'database_connection.php';
    
    // Retrieve images from the database
    $query = $db->query("SELECT * FROM tbl_image");
    
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL = '../admin/files/'.$row["image_name"];
    ?>
        <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["image_name"]; ?>" >
            <img style="width:100px; height:70px;" src="<?php echo $imageURL; ?>" alt="" />
        </a>
    <?php }
    } ?>
</div>
