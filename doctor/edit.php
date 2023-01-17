<!-- function of admin -->
<?php include('function.php');

if (!isDoctor()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

    $staff_id = '';
    $p_id = '';
    $comment = '';
    $w_id = '';
    $admitdischarge = '';
    $admitdischarge_id = '';

if (isset($_GET['edit_admitdis'])) {
    $p_id=$_GET['edit_admitdis'];

    $record_C=mysqli_query($db,"SELECT * FROM admit WHERE p_id='$p_id'");

    $record=mysqli_fetch_array($record_C);
    $staff_id = $record['staff_id'];
    $p_id = $record['p_id'];
    $comment = $record['comment'];
    $w_id = $record['w_id'];
    $admitdischarge = $record['admitdischarge'];
    $admitdischarge_id = $record['admitdischarge_id'];
  }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Edit</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Edit</label>
	      <ul>
	        <li><a class="active"  href="doctor_home.php">HOME</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/21.png" class="profile_info">
                 </small>

            <?php endif ?>
        </li>

      </ul>
    </nav><br><br><br><br>
    
    <div class="container">

    <h1>Edit</h1>

    <form action="doctor_home.php" method="post" id="frm">

        <input type="hidden" name="admitdischarge_id" value="<?php echo $admitdischarge_id; ?>">
        <input type="hidden" name="staff_id" value="<?php echo $_SESSION['user']['staff_id']; ?>">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">

        <label>Comment</label><br><br>
        <input type="text" id="name" name="comment" value="<?php echo $comment;?> "><br><br><br>

        <label>Ward Id</label><br><br>
        <input type="text" id="name" name="w_id" value="<?php echo $w_id;?> "><br><br><br>

        <label>Admit / Discharge</label><br><br>
        <select name="admitdischarge" id="name">
            <option selected value="<?php echo $admitdischarge;?>"><?php echo $admitdischarge; ?></option>
            <option value="Admit">Admit</option>
            <option value="Discharge">Discharge</option>
        </select><br><br><br>

        <button type="submit" class="btn btn-info" name="update_admit">Update Admit</button>
    </form>
    </div><br><br><br>



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
