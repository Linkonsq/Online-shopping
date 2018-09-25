<!DOCTYPE html>
<html>
	<head>
		<title>Register Account</title>
		<link rel="stylesheet" href="css/regStyle.css">
	</head>
	<body bgcolor="#DCDCDC">
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

		<form class="frm" method="post" action="registerButton.php">
			<div>
				<h2>Create new customer account</h2><hr>
			</div>
			<div>
				<p class="para">If you already have an account with us, please login at the <a class="link" href="login.php">login page.</a></p>
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Gender</label>
				<select class="listbox" name="gender">
					<option value="Select">Select</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>First Name</label>
				<input placeholder="First Name" type="text" name="fname">
				</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Last Name</label>
				<input placeholder="Last Name" type="text" name="lname">
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>E-Mail</label>
				<input  placeholder="E-Mail" type="email" name="email">
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Phone</label>
				<input placeholder="Phone" type="text" name="phone">
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Address</label>
				<input placeholder="Address" type="text" name="address">
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>City</label>
				<input placeholder="City" type="text" name="city">
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Country</label>
				<select class="listbox" name="country">
					<option value="Select">Select</option>
					<option value="Bangladesh">Bangladesh</option>
				</select>
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Region</label>
				<select class="listbox" name="region">
					<option value="Select">Select</option>
					<option value="Barisal">Barisal</option>
					<option value="Chittagong">Chittagong</option>
					<option value="Dhaka">Dhaka</option>
					<option value="Khulna">Khulna</option>
					<option value="Rajshahi">Rajshahi</option>
					<option value="Rangpur">Rangpur</option>
					<option value="Sylhet">Sylhet</option>
				</select>
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Password</label>
				<input placeholder="Password" type="password" name="pass">
			</div>
			<div class="required">
				<!--<p class="errMsg" id="gen">Please fill out this field</p>-->
				<label>Retype Password</label>
				<input placeholder="Retype Password" type="password" name="cpass">
			</div>
			<div class="register">
				<button type="reset" name="reset">Reset</button><br>
				<button type="submit" name="submit">Register</button>
			</div>
		</form>
	</body>
</html>