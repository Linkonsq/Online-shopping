<?php include("loginButton.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to online shopping</title>
		<link rel="stylesheet" href="css/indexStyle.css">
	</head>
	<body bgcolor="#DCDCDC">
		<?php
			if ($_SESSION["email"] == true) {
				require_once("dbConfig.php");
				$result = mysqli_query($conn, "SELECT * FROM products_info");
				$result_row = mysqli_query($conn, "select count(1) FROM products_info");
				$row_count = mysqli_fetch_array($result);
				$total_row = $row_count[0];
			}
			elseif ($_SESSION["email"] == false) {
				header("locatio:index.php");
			}
		?>
		<div class="topnav">
		  	<a href="index.php">Online Shopping</a>
		  	<a href="profile.php">Profile</a>
		  	<a href="logout.php">Logout</a>
		  	<div class="search-container">
			    <form action="/action_page.php">
			      	<input type="text" placeholder="Search for products, brands and categories" name="search">
			      	<button type="submit">Search</button>
			    </form>
		  	</div>
		</div>
		<form class="frm" method="post" action="cartButton.php">
			<table style="display: inline-block;">
				<?php
					while($row = mysqli_fetch_array($result)) 
					{
						$productName = $row['product_name'];
						$img = $row['image'];
						//echo "<tr>";
						if ($total_row%8==0) {
							echo "<tr>\n";
						}
						echo "<td>" . "<img src='Uploads/$img' alt='$img' width='150' height='150'><br>" . $row['product_name'] . "<br> $ " . $row['price'] . "<br><button type='submit' name='cart' value='$productName' style='width:100%'>Add to Cart</button>" . "</td>";
						$total_row++;
						if ($total_row%8==0) {
							echo "<tr>\n";
						}
						//echo "</tr>";
					}
					mysqli_close($conn);
				?>
			</table>
		</form>
	</body>
</html>