<!-- function of admin -->
<?php include('functions.php');

if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}


  $item_id = '';
  $item_name = '';
  $price = '';
  $quantity = '';
  
if (isset($_GET['edi'])) {
  $item_id = $_GET['edi'];
  $edit = true;
  $rec = mysqli_query($db, "SELECT * FROM inventory WHERE item_id=$item_id"); 

  $record = mysqli_fetch_array($rec);
  $item_id = $record['item_id'];
  $item_name = $record['item_name'];
  $price = $record['price'];
  $quantity = $record['quantity'];
  }

?>

<style type="text/css">
	
	body{
	margin: 0;
	padding: 0;
	background-image: url('/pis/images/104.jpg');
	background-size: cover;
	font-family: sans-serif;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Item</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/add_item.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<!-- Print Document -->
<!-- <script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script> -->

</head>
<body>


	<nav>
	    <label id="title">| Edit Item</label>
      <ul>
        <li><a href="admin_home.php">ADMIN HOME</a></li>
        <li><a href="add_item.php">ADD ITEM</a></li>
        <li><a class="active" href="user_list.php">EDIT ITEM</a></li>

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


		<h1 id="head">Edit Item</h1>

	<div class="container">
		<form id="reg" method="post" action="update_item.php">
			<?php include('../errors.php'); ?>
			<table border="0">
						
						<input type="hidden" name="item_id" id="name" value="<?php echo $item_id; ?>">
				<tr>
					<td>	
						<label>Item Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="item_name" placeholder="Enter Item Name" value="<?php echo $item_name; ?>" id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>
						<label>Unit Price: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="price" placeholder="Enter Price" value="<?php echo $price; ?>"id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>	
						<label>Quantity: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="quantity" placeholder="Enter Quantity" value="<?php echo $quantity; ?>"id="name"><br><br><br>		
					</td>
				</tr>
									
			</table>
			
			<?php if ($edit == false): ?>
				<button type="submit" name="save" value="Save" id="submit">Save</button>
			<?php else: ?>
				<button type="submit" name="update_item" value="Update" id="submit">Update</button>
			<?php endif ?>

			<!-- <button onclick="printContent('inventory')" class="submit">Print</button> -->
		</form>

	</div>

	</body>
	</html>

