<?php
	include("loginButton.php");
	$customerEmail = "";
	$productName = "";
	$productPrice = "";
	if (isset($_POST["cart"])) {
		$productName = $_POST["cart"];

		if (isset($_SESSION["email"])) {
			$customerEmail = $_SESSION["email"];
			require_once("dbConfig.php");
			$sql="SELECT * FROM products_info WHERE product_name='$productName'";
			$result=mysqli_query($conn, $sql);
			// if (!$result) {
   // 	 			printf("Error: %s\n", mysqli_error($conn));
   //  			exit();
			// }
			while($row = mysqli_fetch_array($result)){
				$productPrice = $row['price'];
				$productQuantity = $row['quantity'];
				$productID = $row['product_id'];
			}

			if ($productQuantity > 0) {
				$sql = "INSERT INTO cart_info(customer_email, product_name, price) VALUES('$customerEmail', '$productName', '$productPrice')" or die("Could not execute the cart insert query.");
		
				//mysqli_query($conn, $sql);

				if (mysqli_query($conn, $sql)) {
					$productQuantity -= 1;
		    		echo "<script>alert('Product successfully added to cart');</script>";
		    		$sql = "UPDATE products_info SET quantity='$productQuantity' WHERE product_name='$productName'" or die("Could not execute the product update query.");
		
					mysqli_query($conn, $sql);
				}
				else {
		    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				
				mysqli_close($conn);
			}
			else {
				echo "<script>alert('The product is unavailable');</script>";
			}
		}
		else {
			echo "<script>alert('You have to login first to buy any product');</script>";
			//echo "You have to login first to buy any product";
		}
	}
?>