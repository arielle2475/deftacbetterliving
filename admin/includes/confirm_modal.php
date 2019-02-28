<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


<!-- Modal  -->
<div id="myModal" class="modal" role="dialog">
<div class="modal-dialog">
<!-- Modal Content -->
   
   <div class="modal-content">
       
       <div class="modal-container">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title" style="float:right;">Delete Confirm Box</h4>
            </div>
            <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "thesis";

                                    // Create connection
                                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                                    // Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = "SELECT * FROM admins";
                                    $result = mysqli_query($conn, $sql);

                                    echo "<tr>";
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                            <td class='text-center border rounded-0'><img class='img-thumbnail border rounded-0 shadow-sm' src='".$row['adminavatar']."' width='100px' height='100px' style='width: 100px;'></td>
                                            <td class='border rounded-0'>" . $row["adminname"]. "</td> 
                                            <td class='border rounded-0'>" . $row["adminemail"]. "</td>"	;
                                    $active=$row['isactive'];
                                            if($active==1){
                                            echo "<div class='modal-body' <p> Are you sure you want to deactivate?</p>
                                            </div>
                                        <div class='modal-footer'>
                                            <td class='text-center border rounded-0'>
                                            <button class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(40,167,69);' href='javascript:void(0)'>
                                            <a href='includes/deactivateadmin.php/?update=$row[id]'>Deactivate</button></a></td></tr>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                            </div></div></div></div>";

                                            }  
                                            if($active==0){
                                            echo "<div class='modal-body' <p> Are you sure you want to activate?</p>
                                            </div>
                                             <div class='modal-footer'>
                                            <td class='text-center border rounded-0'>
                                            <button class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(220,53,69);' href='javascript:void(0)'>
                                            <a href='includes/activateadmin.php/?update=$row[id]'>Activate</button></a></td></tr>  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                            </div></div></div></div>";                                        
                                        }
                                    
                                    }}

                                        echo "</tbody>
                                        </table>";
                                        mysqli_close($conn);
                                        ?>
      
</div>