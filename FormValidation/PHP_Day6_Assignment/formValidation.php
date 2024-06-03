
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize input
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $weight = filter_var($_POST['weight'], FILTER_VALIDATE_FLOAT);
        $image = $_FILES['image'];
        
        // Check for errors
        $errors = [];
        if (!$name) $errors[] = "Invalid product name";
        if ($price === false) $errors[] = "Invalid price";
        if (!$description) $errors[] = "Invalid description";
        if ($weight === false) $errors[] = "Invalid weight";
        if ($image['error'] != UPLOAD_ERR_OK) $errors[] = "Error uploading image";
        
        if (empty($errors)) {
            // Move the uploaded file to a directory
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                // Create an array for the product
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "description" => $description,
                    "weight" => $weight,
                    "image" => $target_file
                ];
                
                // Load existing products
                $products = file_exists('users.txt') ? json_decode(file_get_contents('users.txt'), true) : [];
                
                // Add the new product to the list
                $products[] = $product;
                
                // Save the updated product list back to the file
                file_put_contents('users.txt', json_encode($products));
                
                echo "Product added successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
?>

<html>
<head>
	<title>Product Form</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<!--    <form action="formValidation.php" method="post" enctype="multipart/form-data">-->
<!--        <label for="name">Product Name:</label>-->
<!--        <input type="text" id="name" name="name"><br><br>-->
<!--        -->
<!--        <label for="price">Price:</label>-->
<!--        <input type="number" id="price" name="price"><br><br>-->
<!--        -->
<!--        <label for="description">Description:</label>-->
<!--        <textarea id="description" name="description"></textarea><br><br>-->
<!--        -->
<!--        <label for="weight">Weight:</label>-->
<!--        <input type="number" id="weight" name="weight"><br><br>-->
<!--        -->
<!--        <label for="image">Image:</label>-->
<!--        <input type="file" id="image" name="image"><br><br>-->
<!--        -->
<!--        <input type="submit" value="Submit" class="btn">-->
<!--    </form>-->

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Product Name</span>
                    <input type="text" name="name" placeholder="name"/>
                </div>
                <div class="input-box">
                    <span class="details">Price</span>
                    <input type="number" id="price" name="price">
                </div>
                <div class="input-box">
                    <span class="details">Description</span>
                    <textarea id="description" name="description" rows="8" cols="50"></textarea>
                </div>
                <div class="input-box">
                    <span class="details">Weight</span>
                    <input type="number" id="weight" name="weight"/>
                </div>
                <div class="file-field">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image">
                </div>
                <input class="btn" type="submit" value="Add"/>
            </div>
        </form>
    </div>
    
    <?php
	// Display products based on their price
	
	if (file_exists('users.txt')) {
		$products = json_decode(file_get_contents('users.txt'), true);
		
		// Separate products into two categories
		$less_than_10000 = array_filter($products, function($product) {
			return $product['price'] < 10000;
		});
		
		$greater_than_equal_10000 = array_filter($products, function($product) {
			return $product['price'] >= 10000;
		});
		
		// Function to display products in a table
		function display_products_table($products, $title) {
			echo "<h2>$title</h2>";
			echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Weight</th>
                    <th>Image</th>
                </tr>";
			foreach ($products as $product) {
				echo "<tr>
                    <td>{$product['name']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['description']}</td>
                    <td>{$product['weight']}</td>
                    <td><img src='{$product['image']}' alt='{$product['name']}' width='30'></td>
                </tr>";
			}
			echo "</table>";
		}
		
		// Display the tables
		display_products_table($less_than_10000, "Products with Price Less Than 10000");
		display_products_table($greater_than_equal_10000, "Products with Price Greater Than or Equal to 10000");
	} else {
		echo "No products found.";
	}
    ?>

</body>
</html>
