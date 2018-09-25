<?php
	session_start();
	ob_start();
	require ('dbConfig.php');
	
	$email = "";
	$password = "";
	$errors = array();

	if (isset($_POST['continue'])){
		header("location:register.php");
	}
	elseif (isset($_POST['login'])) {
		if(!empty($_POST['email'])){
			$email = $_POST['email'];
		}
		elseif(empty($_POST['email'])){
			array_push($errors, "E-mail is required");
		}

		if(!empty($_POST['pass'])){
			$password = $_POST['pass'];
		}
		elseif(empty($_POST['pass'])){
			array_push($errors, "Password is required");
		}
	}

	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo $error . "<br>";
		}
	}
	elseif (count($errors) == 0) {
		//$password = md5($password);
		if(isset($_POST['radio'])){
			if($_POST['radio']=="customer") {
				$sql="SELECT * FROM customers_info WHERE email='$email' and password='$password'";
				$result=mysqli_query($conn, $sql);
	 			$count=mysqli_num_rows($result);

		 		if($count==1){
			    	$_SESSION['email']=$email;
			    	//close the db connection here
			    	mysqli_close($conn);
			    	header("location:customerPage.php");
				}
				else {
				    //close the db connection here
				    mysqli_close($conn);
				    echo "Invalid E-mail and Password";
				}
			}
			elseif ($_POST['radio']=="seller") {
				$sql="SELECT * FROM sellers_info WHERE email='$email' and password='$password'";
				$result=mysqli_query($conn, $sql);
	 			$countt=mysqli_num_rows($result);

		 		if($countt==1){
			    	$_SESSION['email']=$email;
			    	//close the db connection here
			    	mysqli_close($conn);
			    	header("location:sellerPage.php");
				}
				else {
				    //close the db connection here
				    mysqli_close($conn);
				    echo "Invalid E-mail and Password";
				}
			}
		}
	}

	ob_end_flush();
?>