<!DOCTYPE html>
<html>
	<head>
		<title>Account Login</title>
		<link rel="stylesheet" href="css/logStyle.css">
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
		</div><br><br>

		<form class="frm" method="post" action="loginButton.php">
			<div>
				<h2>New Customer</h2>
			</div>
			<div>
				<p>By creating an account you will be able to shop faster.</p>
			</div>
			<div class="login">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit" name="continue">Continue</button>
			</div>
		</form>
		<form class="frm" method="post" action="loginButton.php">
			<div>
				<h2>Returning Customer</h2>
			</div>
			<div class="required">
				<label>E-Mail</label>
				<input  placeholder="E-Mail" type="email" name="email">
			</div>
			<div class="required">
				<label>Password</label>
				<input placeholder="Password" type="password" name="pass">
			</div>
			<div>
				<label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Login as: </label>
				<input type="radio" name="radio" value="customer" checked> Customer
  				<input type="radio" name="radio" value="seller"> Seller
			</div>
			<div class="login">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit" name="login">Login</button>
			</div>
		</form>
	</body>
</html>