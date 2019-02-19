<?php
session_start();

// initializing variables
$adusername = "";
$ademail    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'thesis');

// REGISTER USER
if (isset($_POST['reg_admin'])) {
  // receive all input values from the form
  $adusername = mysqli_real_escape_string($db, $_POST['adminname']);
  $ademail = mysqli_real_escape_string($db, $_POST['adminemail']);
  $adpassword_1 = mysqli_real_escape_string($db, $_POST['password']);
  $adpassword_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($adusername)) { array_push($errors, "Username is required"); }
  if (empty($ademail)) { array_push($errors, "Email is required"); }
  if (empty($adpassword_1)) { array_push($errors, "Password is required"); }
  if ($adpassword_1 != $adpassword_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admins WHERE adminname='$adusername' OR adminemail='$ademail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $admin = mysqli_fetch_assoc($result);
  
  if ($admin) { // if user exists
    if ($admin['adminname'] === $adusername) {
      array_push($errors, "Username already exists");
    }

    if ($admin['adminemail'] === $ademail) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$adpassword = md5($adpassword_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO admins (adminname, adminemail, password) 
  			  VALUES('$adusername', '$ademail', '$adpassword')";
  	mysqli_query($db, $query);
  	$_SESSION['adminname'] = $adusername;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../Admin/index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_admin'])) {
	//print_r ($_POST); exit;
  $adusername = mysqli_real_escape_string($db, $_POST['adminname']);
  $adpassword = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($adusername)) {
  	array_push($errors, "Username is required");
  }
  if (empty($adpassword)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$adpassword = md5($adpassword);
  	$query = "SELECT * FROM admins WHERE adminname='$adusername' AND password='$adpassword'";
  	$results = mysqli_query($db, $query);
	
  	if (mysqli_num_rows($results) == 1) {
			$dbResults = $results->fetch_assoc();
			
		if ($dbResults['isactive'] == 1){
  	  $_SESSION['adminname'] = $adusername;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ../Admin/index.php');
	  exit;
	  }else{		  	  header('location: ../member/gallery.html');

	}
  	}else {
		echo "Login Failed!";
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>