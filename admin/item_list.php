
<!-- function of admin -->
<?php include('functions.php'); 

if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }
?>


<!DOCTYPE html>
<html>
<head>

	<title>Item List</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/admin/item_list.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| View Clinics</label>
	      <ul>
	        <li><a href="admin_home.php">ADMIN HOME</a></li>
	        <li><a href="add_item.php">SCHEDULE CLINIC</a></li>
	        <li><a class="active" href="Item_list.php">VIEW CLINICS</a></li>

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

    <h1 id="head">Clinic List</h1>

    <?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>
    
    <div id="s"> <!-- purple div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th id="a">Clinic Name</th>
    			<th id="a">Date</th>
    			<th id="a">Start time</th>
				<th id="a">End time</th>
    			<th id="a">Doctor In Charge</th>
    			<th id="a">Action Edit</th>
    			<th id="a">Action Delete</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php while ($row = mysqli_fetch_array($results_set)) { ?>
    		<tr>
    			<td><?php echo $row['clinicname']; ?></td>
    			<td id="c"><?php echo $row['clinicdate']; ?></td> <!-- a refer as text align -->
    			<td id="b"><?php echo $row['clinicstarttime']; ?></td>
				<td id="b"><?php echo $row['clinicendtime']; ?></td>
    			<td id="b"><?php echo $row['doctorincharge']; ?></td>
    			<td>
    				<a href="update_item.php?edi=<?php echo $row['clinicname']; ?>" class="edit_btn">Edit</a>
    			</td>

    			<td>
    				<a href="item_list.php?dele=<?php echo $row['clinicname']; ?>" class="del_btn" onClick="return confirm('Are you sure you want to Delete this clinic?')">Delete</a>
    			</td>

    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
   </div>

    <!-- data table (search, show entries etc..) -->
    <script>
  	$(document).ready(function() {
    $('#allusers').DataTable();
	} );
	</script>

	<!-- ************************* error massage time out  ********************************** -->

	<script type="text/javascript">

	$(document).ready(function () {
	 
	window.setTimeout(function() {
	    $(".msg").fadeTo(1000, 0).slideUp(1000, function(){
	        $(this).remove();
	    });
	}, 5000);
	 
	});
	</script>


    

</body>
</html>
