<?php include("loginButton.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome Seller</title>
		<link rel="stylesheet" href="css/sellerStyle.css">
	</head>
	<body bgcolor="#DCDCDC">
		<?php
			if ($_SESSION["email"] == true) {
				require_once("dbConfig.php");
				$result = mysqli_query($conn, "SELECT * FROM products_info");
			}
			elseif ($_SESSION["email"] == false) {
				header("location:index.php");
			}
		?>
		<div class="topnav">
		  	<a href="index.php">Online Shopping</a>
		  	<a href="productInfo.php">Add Product</a>
		  	<a href="newSeller.php">Add Seller</a>
		  	<a href="logout.php">Logout</a>
		  	<div class="search-container">
			    <form action="/action_page.php">
			      	<input type="text" placeholder="Search for products, brands and categories" name="search">
			      	<button type="submit">Search</button>
			    </form>
		  	</div>
		</div>

		<form class="frm" method="post" action="sellerPageButton.php">
			<label><b><u><h2>All Product Details:</h2></u></b></label>
			<table class="tbl">
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Category</th>
					<th>Image</th>
					<th>Adding Date & Time</th>
					<th>Action</th>
				</tr>
				<?php
					while($row = mysqli_fetch_array($result)) {
						$productName = $row['product_name'];
						$img = $row['image'];
						echo "<tr>";
						echo "<td>" . $row['product_name'] . "</td>";
						echo "<td>" . $row['price'] . "</td>";
						echo "<td>" . $row['quantity'] . "</td>";
						echo "<td>" . $row['category'] . "</td>";
						echo "<td>" . "<img src='Uploads/$img' alt='$img' width='50' height='50'>" . "</td>";
						echo "<td>" . $row['date'] . "</td>";
						echo "<td>" . "<button type='submit' name='remove' value='$productName' style='width:100%'>Remove</button>" . "</td>";
						echo "</tr>";
					}
					mysqli_close($conn);
				?>
			</table>
		</form>
	</body>
</html>
