<!DOCTYPE html>
<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="css/indexStyle.css">
	</head>
	<body bgcolor="DCDCDC">
		<?php
			require_once("dbConfig.php");
			$result = mysqli_query($conn, "SELECT * FROM products_info");
			$result_row = mysqli_query($conn, "select count(1) FROM products_info");
			$row_count = mysqli_fetch_array($result);
			$total_row = $row_count[0];
		?>
		<div class="topnav">
		  	<a href="index.php">Online Shopping</a>
		  	<a href="login.php">Login</a>
		  	<a href="register.php">Sign Up</a>
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
						$img = $row['image'];
						//echo "<tr>";
						if ($total_row%8==0) {
							echo "<tr>\n";
						}
						echo "<td>" . "<img src='Uploads/$img' alt='$img' width='150' height='150'><br>" . $row['product_name'] . "<br> $ " . $row['price'] . "<br><button type='submit' name='cart' style='width:100%'>Add to Cart</button>" . "</td>";
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
