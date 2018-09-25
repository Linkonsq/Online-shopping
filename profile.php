<!DOCTYPE html>
<html>
	<head>
		<title>Customer Profile</title>
		<link rel="stylesheet" href="css/sellerStyle.css">
	</head>
	<body bgcolor="#DCDCDC">
		<?php
			session_start();
			if ($_SESSION["email"] == true) {
				$customerEmail = $_SESSION["email"];
				require_once("dbConfig.php");
				$result_customer = mysqli_query($conn, "SELECT * FROM customers_info");
				$result_cart = mysqli_query($conn, "SELECT * FROM cart_info WHERE customer_email='$customerEmail'");
			}
			elseif ($_SESSION["email"] == false) {
				header("location:index.php");
			}
		?>
		<div class="topnav">
		  	<a href="index.php">Online Shopping</a>
		  	<a href="customerPage.php">Home</a>
		  	<a href="logout.php">Logout</a>
		  	<div class="search-container">
			    <form action="/action_page.php">
			      	<input type="text" placeholder="Search for products, brands and categories" name="search">
			      	<button type="submit">Search</button>
			    </form>
		  	</div>
		</div>

		<form class="frm" method="post" action="customerPageButton.php">
			<label><b><u><h2>Customer Information:</h2></u></b></label>
			<table class="tbl">
				<tr>
					<th>Gender</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>City</th>
					<th>Country</th>
					<th>Region</th>
				</tr>
				<?php
					while($row = mysqli_fetch_array($result_customer)) {
						echo "<tr>";
						echo "<td>" . $row['gender'] . "</td>";
						echo "<td>" . $row['first_name'] . "</td>";
						echo "<td>" . $row['last_name'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['phone'] . "</td>";
						echo "<td>" . $row['address'] . "</td>";
						echo "<td>" . $row['city'] . "</td>";
						echo "<td>" . $row['country'] . "</td>";
						echo "<td>" . $row['region'] . "</td>";
						echo "</tr>";
					}
				?>
			</table><br>
			<label><b><u><h2>Cart List:</h2></u></b></label>
			<table class="tbl">
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Date</th>
					<th>Remove</th>
				</tr>
				<?php
					while($row = mysqli_fetch_array($result_cart)) {
						$productName = $row['product_name'];
						echo "<tr>";
						echo "<td>" . $row['product_name'] . "</td>";
						echo "<td>" . $row['price'] . "</td>";
						echo "<td>" . $row['date'] . "</td>";
						echo "<td>" . "<button type='submit' name='remove' value='$productName' style='width:100%'>Remove</button>" . "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</form>
	</body>
</html>
