<!-- common function -->
<?php include('../functions.php');

	// Add users................................................................................
	if (isset($_POST['add_user'])) {

	// receive all input values from the form
		$user_name    = ($_POST['user_name']);
		$email       = ($_POST['email']);
		$password_1  = ($_POST['password_1']);
		$password_2  = ($_POST['password_2']);
		$user_type = ($_POST['user_type']);
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];

		// form validation: ensure that the form is correctly filled
		if (empty($user_name)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		if (empty($user_type)) {
			array_push($errors, "User Type is required");
		}

		if (empty($fname)) {
			array_push($errors, "First Name is required");
		}

		if (empty($lname)) {
			array_push($errors, "Last Name is required");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

				$query = "INSERT INTO staff (`fname`, `lname`, `user_type`, `user_name`, `email`, `password`) 
						  VALUES('$fname','$lname','$user_type','$user_name','$email','$password')";
				mysqli_query($db, $query);
				$_SESSION['message']  = "New user successfully created!!";
				header('location: /pis/admin/user_list.php');
			}else{
						array_push($errors, "Connection errors !");		
			}

		}
	
	// *************************************************************************************

	// Insert data table from database

	$query = "SELECT staff_id,fname,lname,user_type,user_name,email FROM staff";
	$result_set = mysqli_query($db, $query);

		
 	// // *********************************************************************************

	//Delete Records

	  if (isset($_GET['del'])) {
	  $staff_id = $_GET['del'];
	  mysqli_query($db, "DELETE FROM staff WHERE staff_id ='$staff_id'"); 
	  
	  $_SESSION['message'] = "Address deleted!";
	  header('location: user_list.php');

	}

	// // *********************************************************************************

	//Update Records

	 if (isset($_POST['update'])) {

	  $fname = $_POST['fname'];
	  $lname = $_POST['lname'];
	  $user_name = $_POST['user_name'];
	  $email = $_POST['email'];
	  $user_type = $_POST['user_type'];
	  $staff_id = $_POST['staff_id'];

	  mysqli_query($db, "UPDATE staff SET fname='$fname',lname='$lname',user_name='$user_name',email='$email',user_type='$user_type' WHERE staff_id='$staff_id'");

	  $_SESSION['message'] = "Data is updated!";
	  header('location: user_list.php');

	 }

	// // *********************************************************************************

	//Reset password

	if (isset($_POST['reset'])) {

	  $staff_id = $_POST['staff_id'];
	  $password_1  =  $_POST['password_1'];
	  $password_2  =  $_POST['password_2'];

    
    if (empty($password_1)) { 
      array_push($errors, "Password is required"); 
    }

    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
    
    // register user if there are no errors in the form
    if (count($errors) == 0) {
       $password = md5($password_1);
      

    mysqli_query($db, "UPDATE staff SET password='$password' WHERE staff_id='$staff_id'");

    array_push($errors, "Password reset Successfully!!");
    header('location: user_list.php');

    }
  }

// ***************************************************************************************************************
  // 
// call the register() function if register_btn is clicked
	if (isset($_POST['add_item'])) {

	// receive all input values from the form
		$clinicname    = ($_POST['clinics']);
		$date       = ($_POST['clinicdate']);
		$starttime  = ($_POST['clinicstarttime']);
		$endtime  = ($_POST['clinicendtime']);
		$doctorincharge  = ($_POST['doctorincharge']);

		// form validation: ensure that the form is correctly filled
		if (empty($clinicname)) { 
			array_push($errors, "Clinic Name is required"); 
		}
		if (empty($date)) { 
			array_push($errors, "Date is required"); 
		}
		
		if (empty($starttime)) { 
			array_push($errors, "Start Time is required"); 
		}

		if (empty($endtime)) { 
			array_push($errors, "End Time is required"); 
		}

		if (empty($doctorincharge)) { 
			array_push($errors, "Doctor InCharge  is required"); 
		}

		// register item if there are no errors in the form
		if (count($errors) == 0) {
							
				$query = "INSERT INTO schedule_clinic (`clinics`, `clinicdate`, `clinicstarttime`, `clinicendtime`,`doctorincharge`) 
						  VALUES('$clinicname','$date','$starttime','$endtime''$doctorincharge')";
				mysqli_query($db, $query);
				$_SESSION['message']  = "Clinic is scheduled successfully!!";
				header('location: /pis/admin/item_list.php');
			}else{
						array_push($errors, "Connection errors !");		
			}

		}


	// *************************************************************************************************************
		// Insert data table from database

		$query = "SELECT * FROM schedule_clinic";
		$results_set = mysqli_query($db, $query);
 	// // *********************************************************************************

	//Delete Item Records

	  if (isset($_GET['dele'])) {
	  $clinicname = $_GET['dele'];
	  mysqli_query($db, "DELETE FROM schedule_clinic WHERE item_id ='$clinicname'"); 
	  
	  $_SESSION['message'] = "Address deleted!";
	  header('location: /pis/admin/item_list.php');
	}
	// // *********************************************************************************

	//Update Records

	 if (isset($_POST['update_item'])) {

	  $item_id = $_POST['item_id'];
	  $item_name = $_POST['item_name'];
	  $price = $_POST['price'];
	  $quantity = $_POST['quantity'];
	  $staff_id = $_POST['staff_id'];

	  mysqli_query($db, "UPDATE inventory SET item_name='$item_name',price='$price',quantity='$quantity' WHERE item_id='$item_id'");

	  $_SESSION['message'] = "Data is updated!";
	  header('location: item_list.php');

	 }	
   

?>
