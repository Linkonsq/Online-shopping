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
			      	<button type="submit">Search</button>
			    </form>
		  	</div>
		</div>

		<form class="frm" method="post" action="submitSeller.php">
			<div>
				<h2>Add new seller Information</h2><hr>
			</div>
			<div class="required">
				<label>Gender</label>
				<select class="listbox" name="gender">
					<option value="Select">Select</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				<!-- <p>Required field</p> -->
			</div>
			<div class="required">
				<label>First Name</label>
				<input placeholder="First Name" type="text" name="fname">
				</div>
			<div class="required">
				<label>Last Name</label>
				<input placeholder="Last Name" type="text" name="lname">
			</div>
			<div class="required">
				<label>E-Mail</label>
				<input  placeholder="E-Mail" type="email" name="email">
			</div>
			<div class="required">
				<label>Phone</label>
				<input placeholder="Phone" type="text" name="phone">
			</div>
			<div class="required">
				<label>Address</label>
				<input placeholder="Address" type="text" name="address">
			</div>
			<div class="required">
				<label>Password</label>
				<input placeholder="Password" type="password" name="pass">
			</div>
			<div class="required">
				<label>Retype Password</label>
				<input placeholder="Retype Password" type="password" name="cpass">
			</div>
			
			<div class="register">
				<button type="reset" name="reset">Reset</button><br>
				<button type="submit" name="submit">Submit</button>
			</div>
		</form>
	</body>
</html>