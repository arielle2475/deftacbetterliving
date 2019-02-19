<?php 
session_start();
?>
<html>
<title>Deftac Betterliving Admin | Welcome </title>
<head>
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/fullcalendar.css" rel="stylesheet" type="text/css" media="all">

<style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;

}

.img

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}

#form{
	    border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
	    width: 100%;
		    margin: auto;
display: block;float: left;margin-right: 5px;

}


#margin {
    padding: 100px;
}



</style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title or Expiration Date for Membership");

     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
</head>
<body id="top">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<div style="background-image:url('../images/demo/backgrounds/bg2.jpg');"> 
<div class="bgded overlay" style="max-width:6000px">
 <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="index.php">Deftac Betterliving | Admin</a></h1>
      </div>
           <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Home</a></li>
		  	  <li><a class="drop" href="#">Membership</a>
						<ul>
						   <li ><a href="memberlist.php">Membership Information</a></li>
						  <li><a href="userlist.php">Membership Status</a></li>

						</ul>
				<li><a href="report.php">Reports
				</a></li>
        <li ><a class="drop" href="#">Admin</a>
                <ul>
										  <li class="active" ><a href="adminsubmit.php">Admins</a></li>
                                          <li class="active" ><a href="editadmin.php">Add New Admin</a></li>
     
</ul>
						  <li><a href="../signin/loginadmin.php">Logout</a></li>

				
          </li>
        </ul>
      </nav>
      <!-- ################################################################################################ --> 
    </header>
  </div>
 
</div>


</div></div>



<?php 

	
 $mysqli = new mysqli("localhost", "root", "", "thesis");
	if(isset($_SESSION['adminname'])){
		$sql = "SELECT adminname, adminavatar FROM admins WHERE adminname='".$_SESSION["adminname"]."'";
	}else{
		$sql = "SELECT adminname, adminavatar FROM admins";
	}	
	
	//$result1 = $mysqli->msql_query( $sql ); 
	$result1 = $mysqli->query($sql);
//	print_r($result1->fetch_assoc());
	while ($row =  $result1->fetch_assoc()){
		$_SESSION['adminavatar'] = $row['adminavatar'];
		$_SESSION['adminname'] = $row['adminname'];
	}
?>
<div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">


<div id=margin>


    <img src="<?= $_SESSION['adminavatar'] ?>" width="250" height="250"><br />
   <h1> Welcome, <span class="user"><?= $_SESSION['adminname'] ?></span>!</h1>


 <br />
  <h2 align="center"><a href="#">Calendar of Activities</a></h2>
  <br />
  <div class="containers">
   <div id="calendar"></div>
  </div>
  
  
<?php
    $mysqli = new mysqli("localhost", "root", "", "thesis");
	$sql = "SELECT adminname, adminavatar FROM admins";
	
//	$result1->query( $sql ); 
  //  $sql = "SELECT username, avatar FROM users";

    //$result = mysqli_result object
    $result2 = $mysqli->query( $sql ); 
    ?>
	
	 <?php
    $mysqli = new mysqli("localhost", "root", "", "thesis");
    $sql = "SELECT username, avatar FROM users";

    //$result = mysqli_result object
    $result = $mysqli->query( $sql ); 
    ?>
	
    <div  id=form class="row">
    <span><h3>All registered users:</h3></span>
   <div id="images_hz">
   <?php
    //returns associative array of fetched row
    while( $row = $result->fetch_assoc() ){ 
        echo "<div class='column'><div class='userlist'><span>".$row['username']."</span><br />";
        echo "<img src='../signin/".$row['avatar']."'></div></div>";
    }
?>  </div> </div>

   <div  id=form class="row">
    <span><h3>All registered admins:</h3></span>
	<div id="images_hz">
    <?php
    //returns associative array of fetched row
//	print_r ($result2->fetch_assoc());exit;
    while( $row = $result2->fetch_assoc() ){ 
        echo "<div class='column'><div class='userlist'><span>".$row['adminname']."</span><br />";
        echo "<img src='".$row['adminavatar']."'></div></div>";
    }
?>  
</div></div>

</div>
</div>

<!--- FOOTER -->

<link rel="stylesheet" href="layout/footer.css">
<footer class="footer-distributed">
      <br>
      <div class="footer-left">
        <div class="footerlogo">
        <img src="images/deftacmain.png">
      </div>

        <p class="footer-company-name">Deftac Betterliving &copy; 2018</p>
      </div>

      <div class="footer-center">
    <br>

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Deftac Betterliving</span> Parañaque</p>
        

        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+639054041458</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:deftacbetterliving@gmail.com">deftacbettingliving@gmail.com</a></p>
        </div>

      </div>

      <div class="footer-right">
        <br>
        <div class="footerlogo">
        <img src="images/ribiero.png">
      </div>

        </div>

      </div>

    </footer>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a> 
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.backtotop.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>