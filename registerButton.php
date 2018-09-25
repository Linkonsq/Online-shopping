<?php
	include("dbConfig.php");
	$gender = "";
	$firstName = "";
	$lastName = "";
	$email = "";
	$phone = "";
	$address = "";
	$city = "";
	$country = "";
	$region = "";
	$password = "";
	$confirmPassword = "";
	$errors = array();

	if (isset($_POST['submit'])){
		if($_POST['gender']!="Select"){
			$gender = $_POST['gender'];
		}
		elseif($_POST['gender']=="Select"){
			array_push($errors, "Gender is required");
		}

		if(!empty($_POST['fname'])){
			$firstName = $_POST['fname'];
		}
		elseif(empty($_POST['fname'])){
			array_push($errors, "First Name is required");
		}

		if(!empty($_POST['lname'])){
			$lastName = $_POST['lname'];
		}
		elseif(empty($_POST['lname'])){
			array_push($errors, "Last Name is required");
		}

		if(!empty($_POST['email'])){
			$em = $_POST['email'];
			$sql="SELECT * FROM customers_info WHERE email='$em'";
			$result=mysqli_query($conn, $sql);
	 		$count=mysqli_num_rows($result);
			if($count > 0) {
    			array_push($errors, "Customer with same email is already exist");
    			mysqli_close($conn);
			}
			else {
				$email = $_POST['email'];
			}
		}
		elseif(empty($_POST['email'])){
			array_push($errors, "E-mail is required");
		}

		if(!empty($_POST['phone'])){
			$phone = $_POST['phone'];
		}
		elseif(empty($_POST['phone'])){
			array_push($errors, "Phone is required");
		}

		if(!empty($_POST['address'])){
			$address = $_POST['address'];
		}
		elseif(empty($_POST['address'])){
			array_push($errors, "Address is required");
		}

		if(!empty($_POST['city'])){
			$city = $_POST['city'];
		}
		elseif(empty($_POST['city'])){
			array_push($errors, "City is required");
		}

		if($_POST['country']!="Select"){
			$country = $_POST['country'];
		}
		elseif($_POST['country']=="Select"){
			array_push($errors, "Country is required");
		}

		if($_POST['region']!="Select"){
			$region = $_POST['region'];
		}
		elseif($_POST['region']=="Select"){
			array_push($errors, "Region is required");
		}		

		if(!empty($_POST['pass'])){
			$password = $_POST['pass'];
		}
		elseif(empty($_POST['pass'])){
			array_push($errors, "Password is required");
		}

		if(!empty($_POST['cpass'])){
			$confirmPassword = $_POST['cpass'];
		}
		elseif(empty($_POST['cpass'])){
			array_push($errors, "Confirm Password is required");
		}

		if((!empty($_POST['pass']) && !empty($_POST['cpass'])) && ($password != $confirmPassword)) {
			array_push($errors, "Password doesn't match");
		}
	}

	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo $error . "<br>";
		}
	}
	elseif (count($errors) == 0) {
		//$password = md5($password);
		$sql = "INSERT INTO customers_info(gender, first_name, last_name, email, phone, address, city, country, region, password) VALUES('$gender', '$firstName', '$lastName', '$email', '$phone', '$address', '$city', '$country', '$region', '$password')" or die("Could not execute the insert query.");
		
		//mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
    		//echo "Registered Successfully";
    		echo "<script>alert('Registered Successfully');</script>";
    		mysqli_close($conn);
		}
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    		mysqli_close($conn);
		}
	}
?>