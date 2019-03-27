<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'thesis');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['adminname']);
  $email = mysqli_real_escape_string($db, $_POST['adminemail']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admins WHERE adminname='$username' OR adminemail='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['adminname'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['adminemail'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO admins (adminname, adminemail, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['adminname'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../Admin/index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_Admin'])) {
	//print_r ($_POST); exit;
  $username = mysqli_real_escape_string($db, $_POST['adminname']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  else {
    echo '<script language="javascript">';
    echo 'alert("Wrong Username/Password Combination!" )';
    echo '</script>';
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM admins WHERE adminname='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	
  	if (mysqli_num_rows($results) == 1) {
			$dbResults = mysqli_fetch_assoc($results);
			
		if ($dbResults['isactive'] == 1 && $dbResults['admintype'] == 1){
      $_SESSION['adminname'] = $username;
      $_SESSION['admintype'] = $dbResults['admintype'];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ../superadmin/index.php');
    
    }
    elseif ($dbResults['isactive'] == 1 && $dbResults['admintype'] == 0){
  	  $_SESSION['adminname'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['admintype'] = $dbResults['admintype'];
  	  header('location: ../Admin/index.php');
    
    }
    else {
		echo "Login Failed!";
      array_push($errors, "Wrong username/password combination");
      header('location: ../signin/loginadmin.php');
  	}
  }
}
}




//checks if superAdmin
function isAdmin()
{
	if (isset($_SESSION['adminname']) && $_SESSION['admintype'] == 1) {
		return true;
	}else{
		return false;
	}
}
?>