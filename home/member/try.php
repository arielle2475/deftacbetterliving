<?php     
session_start();  
include("config.php");
    $username=$_SESSION['username'];

    $query="SELECT * FROM users where username='$username'"; 
    $sql=mysqli_query($conn, $query);
    $run=mysqli_fetch_array($sql);
    $img=$run['avatar'];    

    
    
?>       

<div style="margin-left:15%; margin-top:10%">
  <form action="" method="post" enctype="multipart/form-data"  />
     <table width="500px" align="center" bgcolor="blueskay">
        <tr>
             <td align="right">Customer Image:</td>
             <td><input type="file" name="avatar" value="<?php echo $_SESSION['avatar']; ?>"  /> <span class="user"><img src='../Signin/<?= $_SESSION['avatar']?>'width="250" height="250</span><br /></td>
        </tr>
        <tr align="center">
             <td colspan="2"><input type="submit" name="update" value="Update Account"/></td>
             <td></td>
        </tr> 
     </table>
   </form>
</div>
<?php

    if(isset($_POST['update'])){

      
        $c_image= $_FILES['avatar']['name'];
        $c_image_temp=$_FILES['avatar']['tmp_name'];
        
        
        if($c_image_temp != "")
        {
            move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__.'/../Signin/images/'. $_FILES["avatar"]['name']);
            $c_update="UPDATE users SET avatar= '$c_image'
             WHERE username = '" . $_SESSION['username'] . "'"; 
        }else
        {
        
        }
        
        mysqli_query($conn, $c_update);
        $_SESSION['avatar'] = $img;
        header("Location: welcome.php");

  }
?>