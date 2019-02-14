

<html>
<title>Deftac Betterliving Admin | Report </title>
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>

 #box1{
    height: 100vh;
    width: 100%;
    background-image: url(i1.jpg);
    background-size: cover;
    display: table;
    background-attachment: fixed;
        }
   
       #form{
	    border-radius: 10px;
    background-color: #f2f2f2;
    padding: 20px;
	    width: 100%;
		    margin: auto;
display: block;float: left;margin-right: 5px;

}

body{
	background: #FFF;
    margin: 0;
	padding: 0;
	text-align:justify;
}

#margin {
    padding: 100px;
}

</style>

<body id="top">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<div style="background-image:url('../images/demo/backgrounds/bg2.jpg');"> 
<div class="bgded overlay" style="max-width:6000px">
 <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="../index.html">Deftac Betterliving | Admin</a></h1>
      </div>
         <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li ><a href="index.php">Home</a></li>
		  	  <li><a class="drop" href="#">Membership</a>
						<ul>
						   <li ><a href="memberlist.php">Membership Information</a></li>
						  <li><a href="userlist.php">Membership Status</a></li>

						</ul>
				<li class="active"><a href="report.php">Reports
				</a></li>
        <li ><a class="drop" href="#">Admin</a>
                <ul>
										  <li class="active" ><a href="editadmin.php">Admins</a></li>
                                          <li class="active" ><a href="adminsubmit.php">Add New Admin</a></li>
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
    /*
     * Please put this file in the same folder with KoolControls folder
     * or you may modify path of require and scriptFolder to refer correctly
     * to koolchart.php and its folder.
     */
    require "KoolControls/KoolChart/koolchart.php";
    $chart = new KoolChart("chart");
    $chart->scriptFolder="KoolControls/KoolChart";
    $chart->Width = 1000;
    $chart->BackgroundColor = "#ffff";
    $chart->Title->Text = "Members added in 2017";
    $chart->PlotArea->XAxis->Title = "Deftac Membership Chart for 2017";
    $chart->PlotArea->XAxis->Set(array("January","February","March","April","May","June","July","August","September","October","November","December"));
    $chart->PlotArea->YAxis->Title = "Members";
    $chart->PlotArea->YAxis->LabelsAppearance->DataFormatString = "{0}";
    $series = new LineSeries();
	$series->Name = "Member";
    $series->ArrayData(array(20,20,21,24,24,22,25,25,25,26,25,26));
    $chart->PlotArea->AddSeries($series);
?>

<div id="box1" class="wrapper row3" style="background-image:url('../images/demo/bgall.jpg');">
<div id=margin>
    <center><div id=form>
	<body background="statistic.jpg">
        <?php echo $chart->Render(); ?>
    </body></div>

</center>
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