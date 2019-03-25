<!DOCTYPE html>
<html>
<head>
<title>Deftac Betterliving | Calendar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/fullcalendar.css" rel="stylesheet" type="text/css" media="all">

<script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<style>
        
        #box1{
           
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
  //   var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
   //    url:"insert.php",
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
  //    url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
  //     alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
  //   if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
   //    url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
    //    alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 7500);    
}
</script>
</head>
<body id="top">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>

<div  style="background-image:url('../images/demo/img/header1.jpg');"> 
<div class="bgded overlay" style="max-width:6000px">
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
        <div id="logos">
	  <img src="deftac.png">
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.html">Home</a></li>
		  <li><a href="gallery.html">Gallery</a></li> 
		  <li><a class="drop" href="#">Coaches</a>
            <ul>
              <li><a href="shiba.html">Coach Martin</a></li>
              <li><a href="shoob.html">Coach Rommel</a></li>
              <li><a href="husky.html">Coach Richard</a></li>
            </ul>
						             <li  class="active"><a href="calendar.php">Calendar</a></li>

				  <li><a class="drop" href="welcome.php">Account</a>
            <ul>
              <li><a href="../signin/login.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
	      </header>
  </div>
  
   <img class="mySlides w3-animate-fading" src="../images/demo/backgrounds/1.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="../images/demo/backgrounds/2.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="../images/demo/backgrounds/3.jpg" style="width:100%">
      

  </div>



<div id="box1" class="wrapper row3" style="background-image:url('../images/demo/backgrounds/gallerybg.jpg');">





<div id=margin>





 <br />
  <h2 align="center"><a href="#">Calendar of Activities</a></h2>
  <br />
  <div class="containers">
   <div id="calendar"></div>
  </div>

</div>











</div>








<!--- FOOTER -->

<link rel="stylesheet" href="layout/footer.css">
<footer class="footer-distributed">
      <br>
      <div class="footer-left">
        <div class="footerlogo">
        <img src="images/demo/img/deftacmain.png">
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
        <img src="images/demo/img/ribiero.png">
      </div>

        </div>

      </div>

    </footer>


</body>
</html>