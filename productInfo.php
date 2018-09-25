<!DOCTYPE html>
<html>
	<head>
		<title>Add Product</title>
		<link rel="stylesheet" href="css/regStyle.css">
	</head>
	<body bgcolor="#DCDCDC">
		<div class="topnav">
		  	<a href="index.php">Online Shopping</a>
		  	<a href="sellerPage.php">Home</a>
		  	<a href="logout.php">Logout</a>
		  	<div class="search-container">
			    <form action="/action_page.php">
			      	<input type="text" placeholder="Search for products, brands and categories" name="search">
			      	<button type="submit" name="search">Search</button>
			    </form>
		  	</div>
		</div>

		<form class="frm" method="post" action="submitProduct.php" enctype="multipart/form-data">
			<div>
				<h2>Add new product Information</h2><hr>
			</div>
			<div class="required">
				<label>Product Name</label>
				<input placeholder="Prooduct Name" type="text" name="pname">
				</div>
			<div class="required">
				<label>Price</label>
				<input placeholder="Price" type="text" name="pprice">
			</div>
			<div class="required">
				<label>Quantity</label>
				<input  placeholder="Quantity" type="text" name="pquantity">
			</div>
			<div class="required">
				<label>Category</label>
				<input placeholder="Category" type="text" name="pcategory">
			</div>
			<div class="required">
				<label>Product Image</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div>
			<div class="register">
				<button type="reset" name="reset">Reset</button><br>
				<button type="submit" name="submit">Submit</button>
			</div>
		</form>
	</body>
</html>