<?php
	include("dbConfig.php");
	$target_dir = "Uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $productName = "";
    $productPrice;
    $productQuantity;
    $productCategory = "";
    $productImage = "";
    $errors = array();

	if(isset($_POST["submit"])) {
        if (!empty($_POST['pname'])) {
            $pn = $_POST['pname'];
            $sql="SELECT * FROM products_info WHERE product_name='$pn'";
            $result=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($result);
            if($count > 0) {
                array_push($errors, "Product with same name is already exist");
                mysqli_close($conn);
            }
            else {
                $productName = $_POST['pname'];
            }
        }
        elseif (empty($_POST['pname'])) {
            array_push($errors, "Product Name is required.");
        }

        if (!empty($_POST['pprice'])) {
            if(is_numeric($_POST["pprice"])){
                $productPrice = $_POST['pprice'];
            }
            else{
                array_push($errors, "Enter a valid price.");    
            }
        }
        elseif (empty($_POST['pprice'])) {
            array_push($errors, "Product Price is required.");
        }

        if (!empty($_POST['pquantity'])) {
            if(is_numeric($_POST["pquantity"])){
                $productQuantity = $_POST['pquantity'];
            }
            else{
                array_push($errors, "Enter a valid quantity.");    
            }
            
        }
        elseif (empty($_POST['pquantity'])) {
            array_push($errors, "Product Quantity is required.");
        }

        if (!empty($_POST['pcategory'])) {
            $productCategory = $_POST['pcategory'];
        }
        elseif (empty($_POST['pcategory'])) {
            array_push($errors, "Product Category is required.");
        }

        if (!empty($_FILES['fileToUpload']['name'])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check == false) {
                array_push($errors, "File is not an image.");   
            }
            elseif (file_exists($target_file)) {
                array_push($errors, "This product is already exists.");
            }
            elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
            elseif($_FILES["fileToUpload"]["size"] > 1000000) {
                array_push($errors, "Sorry, your file is too large.");
            }
            else {
                $productImage = $_FILES['fileToUpload']['name'];
                if (count($errors) == 0) {
                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                }
            }
        }
        elseif (empty($_FILES['fileToUpload']['name'])) {
            array_push($errors, "Product Image is required.");
        }
    }

	if (count($errors) > 0) {
		foreach ($errors as $error) {
			echo $error . "<br>";
		}
	}
	elseif (count($errors) == 0) {
		$sql = "INSERT INTO products_info(product_name, price, quantity, category, image) VALUES('$productName', '$productPrice', '$productQuantity', '$productCategory', '$productImage')" or die("Could not execute the product insert query.");
		
		//mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
    		echo "New record created successfully";
		}
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
?>