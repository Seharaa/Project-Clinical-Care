<!-- function of admin -->
<?php include('functions.php'); 

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>

<style type="text/css">
	
	body{
	margin: 0;
	padding: 0;
	background-image: url('/pis/images/117.jpg');
	background-size: cover;
	font-family: sans-serif;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Schedule Clinic</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/add_item.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">
</head>
<body>


	<nav>
	    <label id="title">| Schedule Clinic</label>
      <ul>
        <li><a href="admin_home.php">ADMIN HOME</a></li>
        <li><a class="active" href="add_item.php">SCHEDULE CLINIC</a></li>
        <li><a href="item_list.php">VIEW CLINIC</a></li>

        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
       
		<li>
				<!-- logged in user information -->

     		<?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/18.png" class="profile_info">
                 </small>

            <?php endif ?>
 		</li>

      </ul>
    </nav>


		<h1 id="head">Schedule Clinic</h1>

	<div class="container">
		<form id="reg" method="post" action="add_item.php">
			<?php include('../errors.php'); ?>
			<table border="0">
			
				<tr>
					<td>
						<label>Clinic Name: </label><br><br><br>
					</td>
					
					<td>
						<select id="slt" name="clinics" placeholder="Select a Clinic">
							<option value=""></option>
							<option value="1breastdiseaseclinic">Breast Disease Clinic</option>
							<option value="2cardiologyclinic">Cardiology clinic</option>
							<option value="3cardiothorasicclinic">Cardio Thorasic Clinic</option>
							<option value="4">Chest Clinic</option>
							<option value="5">Dental Clinic</option>
							<option value="6">Dermatology Clinic</option>
							<option value="7">Diabetes & Endocrine Clinic</option>
							<option value="8">ENT Clinic</option>
							<option value="9">Eye Clinic</option>
							<option value="10">Forensic Psychatric Clinic</option>
							<option value="11">Gastro Enterology Clinic (Physician)</option>
							<option value="12">Gastro Intestinal Clinic (Surgeon)</option>
							<option value="13">Genito Urinary Clinic</option>
							<option value="14">Heamatology Clinic</option>
							<option value="15">Medical Clinics</option>
							<option value="16">Nephrology Clinic</option>
							<option value="17">Neurology Clinic</option>
							<option value="18">Neuro Surgical Clinic </option>
							<option value="19">Nutrition Clinic</option>
							<option value="20">Oncology Clinic</option>
							<option value="21">Onco Surgical Clinic</option>
							<option value="22">Orthopaedic Clinic</option>
							<option value="23">Paediatric Clinics</option>
							<option value="24">Pain Management Clinic</option>
							<option value="25">Palliative Care Clinic</option>
							<option value="26">Plastic Surgery Clinic</option>
							<option value="27">Psychiatric Clinic</option>
							<option value="28">Rabies Treatment Clinic</option>
							<option value="29">Rheumatology Clinic</option>
							<option value="30">Speech Therapy Clinic</option>
							<option value="31">Surgical Clinics</option>
							<option value="32">Vascular & Transplant Clinic</option>
							</select><br><br><br>	
					</td>	
				</tr>
				<tr>
					<td>	
						<label>Date: </label><br><br><br>
					</td>
					<td>
						<input type="date" name="clinicdate" placeholder="Enter Clinic date" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Start Time: </label><br><br><br>
					</td>
					<td>
						<input type="time" name="clinicstarttime" placeholder="Enter Starting time" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>End  Time: </label><br><br><br>
					</td>
					<td>
						<input type="time" name="clinicendtime" placeholder="Enter Endinging time" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Doctor InCharge: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="doctorincharge" value="<?php echo $_SESSION['user']['staff_id']; ?>" id="name"><br><br><br>		
					</td>
				</tr>
					

			</table>
			<input type="submit" name="add_item" value="+ Schedule Clinic" id="submit">
		</form>

		

	</div>

</body>
</html>
