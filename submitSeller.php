<?php
	include("dbConfig.php");
	$gender = "";
	$firstName = "";
	$lastName = "";
	$email = "";
	$phone = "";
	$address = "";
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
			$sql="SELECT * FROM sellers_info WHERE email='$em'";
			$result=mysqli_query($conn, $sql);
	 		$count=mysqli_num_rows($result);
			if($count > 0) {
    			array_push($errors, "Seller with same email is already exist");
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
			if(is_numeric($_POST["phone"])){
                $phone = $_POST['phone'];
            }
            else{
                array_push($errors, "Enter a valid phone number.");    
            }
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
		$sql = "INSERT INTO sellers_info(gender, first_name, last_name, email, phone, address, Password) VALUES('$gender', '$firstName', '$lastName', '$email', '$phone', '$address', '$password')" or die("Could not execute the insert query.");
		
		//mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
    		echo "New record created successfully";
		}
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
?>