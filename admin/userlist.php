<?php include "includes/admin_header.php"; ?>

<?php 
	if(!isset($_SESSION['adminname']) && !isset($_SESSION['password'])){
		session_destroy();
		header('location: ../Signin/loginadmin.php?error=Login to access.');
		}
 ?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$query = "SELECT * FROM mfillup";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
    $appDate = $row['approvedDate'];
    $expDate = $row['expirationDate'];
    $name = $row['u_fname'];
    $datediff = strtotime($expDate) - strtotime($appDate);
    $sum = round($datediff / (60 * 60 * 24));
    //  echo $sum;
     switch(true)
     {
         case ($sum == 7):
         echo '<script language="javascript">';
         echo 'alert("' . $name .'s will get his membership expired in 7 days!" )';
         echo '</script>';
         break;

         case ($sum == 6):
         echo '<script language="javascript">';
         echo 'alert("' . $name .' will get his membership expired in 6 days!" )';
         echo '</script>';
         break;

         case ($sum == 5):
         echo '<script language="javascript">';
         echo 'alert("' . $name .' will get his membership expired in 5 days!" )';
         echo '</script>';
         break;

         case ($sum == 4):
         echo '<script language="javascript">';
         echo 'alert("' . $name .' will get his membership expired in 4 days!" )';
         echo '</script>';
         break;

         case ($sum == 3):
         echo '<script language="javascript">';
         echo 'alert("' . $name .' will get his membership expired in 3 days!" )';
         echo '</script>';
         break;

         case ($sum == 2):
         echo '<script language="javascript">';
         echo 'alert("' . $name .' will get his membership expired in 2 days!" )';
         echo '</script>';
         break;

         case ($sum == 1):
         echo '<script language="javascript">';
         echo 'alert("' . $name .' will get his membership expired in 1 day!" )';
         echo '</script>';
         break;

         case ($sum == 0):
         echo '<script language="javascript">';
         echo 'alert("' . $name .'s membership has been expired!" )';
         echo '</script>';
         break;
         default;
     
  }
}
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

    <title>Deftac Betterliving</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="assets/css/style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
 
</head>

<body style="font-family: Montserrat, sans-serif;background-color: rgb(235,235,235);">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a class="text-center" href="#" style="padding-left: 40px;"><img src="assets/img/deftac.png" width="100px" style="width: 125px;height: 125px;"></a>
            </div>

            <ul class="list-unstyled components">
            <li>
                    <a href="index.php">Dashboard</a>
                </li>                <li>
                    <a href="#memberSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Members</a>
                    <ul class="collapse list-unstyled" id="memberSubmenu">
                        <li class="active">
                            <a href="memberlist.php">Membership List</a>
                        </li>
                        <li>
                            <a href="userlist.php">Membership Status</a>
                        </li>
                        <li>
                            <a href="transhistory.php">Membership Transactions</a>
                        </li>
                    </ul>
                </li>
                <li>
                <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admins</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li>
                            <a href="adminlist.php">Admin List</a>
                        </li>
                        <li>
                            <a href="editadmin.php">Edit Admin</a>
                        </li>
                        <li>
                            <a href="createadmin.php">Create Admin</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blog</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="posts.php">View Posts</a>
                        </li>
                        <li>
                            <a href="categories.php">View Categories</a>
                        </li>
                        <li>
                            <a href="comment.php">View Comments</a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="calendar.php">Calendar</a>
                </li>
                <li>
                <a class="h ha"  href="gallery.php">Gallery</a>
            </li>
            <li >
                    <a href="chatbox.php">Chatbox</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="profile.php" class="btn p-2 mr-2 mb-2  download" style="color:black; font-weight:bold;">Profile</a>
                </li>
                <li>
                    <a class="btn p-2 mr-2 mb-2 btn-danger article" href="../signin/login.php" style="color:white; font-weight:bold;">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                            <h1>Welcome, <span class="user"><?= $_SESSION['adminname'] ?></span></p>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav> <div class="col-md-12 search-table-col" data-aos="fade-up" data-aos-once="true" style="margin-top: 30px;padding-top: 0px;font-family: Montserrat, sans-serif;">
                    <div class="form-group pull-right col-lg-4"><input type="text" id="myInput" onkeyup="myFunction()" ptitle="Type in a name"  placeholder="Search Username" class="search form-control"></div>
                    <h1>Membership Status</h1>
                    <div class="table-responsive border rounded shadow-lg" style="background-color: #ffffff;">
                        <table id="myTable" class="table">
                            <thead>
                                <tr class="text-center" style="color: rgb(255,255,255);background-color: #333332;">
                                    <th class="border rounded-0">Avatar</th>
                                    <th class="border rounded-0">Username</th>
                                    <th class="border rounded-0">Email Address</th>
                                    <th class="border rounded-0">Registered Date</th>
                                    <th class="border rounded-0">Approved Date</th>
                                    <th class="border rounded-0">End Date</th>
                                    <th class="border rounded-0">Status</th>

                                </tr>
                            </thead>
                            <tbody>

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


                                    $sql = "SELECT * FROM users, mfillup WHERE users.username = mfillup.username";

                                    $result = mysqli_query($conn, $sql);
                                    echo "<tr>";
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row

                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr><td class='text-center border rounded-0'><img class='img-thumbnail border rounded-0 shadow-sm' src='../signin/".$row['avatar']."' width='100px' height='100px' style='width: 100px;'></td>
                                            <td class='border rounded-0'>" . $row["username"]. "</td> <td class='border rounded-0'>" . $row["email"]. "</td><td class='border rounded-0'>" . $row["reg_date"]. "</td><td class='border rounded-0'>" . $row["approvedDate"]. "</td><td class='border rounded-0'>" . $row["expirationDate"]. "</td>"	;
                                    $active=$row['isActive'];
                                     
                                    $row = json_encode($row);

                                            if($active==1){
                                            echo "<td class='text-center border rounded-0'><button class='btn p-2 mr-2 mb-2' data-toggle='modal' data-target='#confirmModal' data-user='$row' style='color: white;font-weight: bold;background-color: rgb(40,167,69);'>Active</button>
                                            </td></tr>";    
                                        }
                                            if($active==0){
                                            echo "<td class='text-center border rounded-0'><button class='btn p-2 mr-2 mb-2'data-toggle='modal' data-target='#confirmModal' data-user='$row' style='color: white;font-weight: bold;background-color: rgb(220,53,69);'>Blocked</button>
                                            </td></tr>";    
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
    </div>
<!-- Admin Modal -->
<?php include "includes/confirm_admin_modal.php"; ?>
     <script>
            function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }       
            }
            }
     </script>       <script>

$('#confirmModal').on('show.bs.modal', function (e) {
  
    let user = JSON.parse(e.relatedTarget.dataset.user);
    console.log(user);
    let number = 'Member #';
    let title = 'Are you sure you want to ';
    let titleQuestion = user.isActive === '1' ? 'deactivate?' : 'activate?';
    let buttonStyle = user.isActive === '1' ? 'btn-danger' : 'btn-success';
    let buttonStyleOpposite = user.isActive === '0' ? 'btn-danger' : 'btn-success';
    let buttonText = user.isActive === '1' ? 'Deactivate' : 'Activate';
    let formAction = user.isActive === '1' ? 'includes/deactivate.php?update='+user.id : 'includes/activate.php?update='+user.id;
    
    document.querySelector('#userID').textContent = number + user.id;
    document.querySelector('#confirmTitle').textContent = title + titleQuestion;
    document.querySelector('#userImage').src = '../signin/'+user.avatar;
    document.querySelector('#userName').textContent = user.username;
    document.querySelector('#userEmail').textContent = user.email;
    
    document.querySelector('#confirmButton').value = buttonText;
    document.querySelector('#confirmButton').classList.add(buttonStyle);
    document.querySelector('#confirmButton').classList.remove(buttonStyleOpposite);

    document.querySelector('#confirmForm').action = formAction;
});
</script>
        <?php include "includes/footer.php"; ?>

</body>
</html>