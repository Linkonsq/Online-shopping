<?php
	require_once("dbConfig.php");
	if (isset($_POST["remove"])) {
		$productName = $_POST["remove"];
		$sql="DELETE FROM cart_info WHERE product_name='$productName'";
		$result=mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<script>alert('Product Successfully removed from your cart list');</script>";
	}
?>