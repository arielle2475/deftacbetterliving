<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<div id="box1" class="bgded overlay" style="background-image:url('images/demo/img/blackbg.jpg');"> 
 <style>
        
        #box1{
            height: 100vh;
            width: 100%;
            background-image: url(i1.jpg);
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }
   
       
    </style>
</head>
<body id="top"><div id="box1">

   <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logos">
    <img src="deftac.png">
      </div>          
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="../member/index.html">Home</a></li>
      <li><a href="../member/gallery.html">Gallery</a></li> 
      <li><a class="drop" href="#">Coaches</a>
            <ul>
              <li><a href="../member/shiba.html">Coach Martin</a></li>
              <li><a href="../member/shoob.html">Coach Rommel</a></li>
              <li><a href="../member/husky.html">Coach Richard</a></li>
            </ul>
        <li><a href="../member/shop.html">Shop</a></li>
        <li><a href="../member/about.html">About Us</a></li>
          <li class="active"><a class="drop" href="welcome.php">Account</a>
            <ul>
              <li><a href="shiba.html">Cart</a></li>
              <li><a href="../Signin/login.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>
  <br>
  <link rel="stylesheet" href="formstyle2.css">

<?php session_start(); ?>

<div class="body content">
<div class="welcome">
<br>
<br>
<br>
<br>
Welcome <span class="user"><?= $_SESSION['username'] ?></span>!
<br>
<br>
<?php
$mysqli = new mysqli('localhost', 'root', "" , 'thesis');
$sql = 'SELECT username, avatar FROM users';
$result = $mysqli->query($sql); //$result = mysqli_result object
 
?>
<br>
<br>
<div id = "registered">
<span> All registered users</span>
<?php
while($row = $result->fetch_assoc()){
	echo "<div class='userlist'><span>$row[username]</span><br />";
	echo "<img src='$row[avatar]'></div>";
}
	
	?>
</div>
