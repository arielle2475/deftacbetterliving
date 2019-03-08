<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal  -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" style="opacity: 1;font-family: Montserrat, sans-serif;">
<div class="modal-dialog" role="document">
<!-- Modal Content -->
   
   <div class="modal-content" >
   <div class="modal-header bg-dark" style="background-color: #dc1a1a;height: 66px;padding: 13px;">
       <h4 class="modal-title" style="color: rgb(255,255,255); font-weight: bold;">Confirm</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
       <div class="table-responsive " style="padding:30px;height: 200px;  background-color: #ffffff;">
                        <table class="table border rounded shadow">
                            <thead>
                                <tr style="background-color: #343a40;color: rgb(255,255,255);">
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Email Address</th>
                                </tr>
                            </thead>
                            <tbody style="height: 86px;">

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

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr style='height: 81px;'>

                                            <td class='text-center border rounded-0'><img class='img-thumbnail border rounded-0 shadow-sm' width='50px' height='50px' src='".$row['adminavatar']."' width='100px' height='100px' style='width: 100px;'></td>
                                            <td class='border rounded-0'>" . $row["adminname"]. "</td> 
                                            <td class='border rounded-0'>" . $row["adminemail"]. "</td>"	;
                                            echo "</tr></tbody>
                                            </table></div>
                                            ";
                                    $active=$row['isactive'];
                                            if($active==1){
                                            echo "<div class='modal-body' <p> Are you sure you want to deactivate?</p>
                                            </div>
                                        <div class='modal-footer'>
                                            <td class='text-center border rounded-0'>
                                            <button class='btn btn-danger bg-danger border-danger'  type='button'  style='color: white;font-weight: bold;background-color: rgb(220,53,69);' href='javascript:void(0)'>
                                            <a href='includes/deactivateadmin.php/?update=$row[id]'>Deactivate</button></a></td></tr>
                                            <button class='btn btn-warning' type='button' data-dismiss='modal' style='font-weight: bold;color: rgb(255,255,255);'>Cancel</button>
                                            </div></div></div></div>";

                                            }  
                                            if($active==0){
                                            echo "<div class='modal-body' <p> Are you sure you want to activate?</p>
                                            </div>
                                             <div class='modal-footer'>
                                            <td class='text-center border rounded-0'>
                                            <button class='btn btn-success bg-success border-success' type='button' style=' font-weight: bold; background-color: #dc1a1a;' href='javascript:void(0)'>
                                            <a href='includes/activateadmin.php/?update=$row[id]'>Activate</button></a></td></tr>  
                                            <button class='btn btn-warning' type='button' data-dismiss='modal' style='font-weight: bold;color: rgb(255,255,255);'>Cancel</button>
                                            </div></div></div></div>";                                        
                                        }
                                    
                                    }}

                                        echo "</tbody>
                                        </table>";
                                        mysqli_close($conn);
                                        ?>

    </div>
    </div>
</div>
</div>

