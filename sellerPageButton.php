<?php
	require_once("dbConfig.php");
	if (isset($_POST["remove"])) {
		$productName = $_POST["remove"];
		$sql="DELETE FROM products_info WHERE product_name='$productName'";
		$result=mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<script>alert('Product Successfully removed');</script>";
	}
?>