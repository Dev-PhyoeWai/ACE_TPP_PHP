<?php

require("UserValidate.php");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (isset($_POST['submit'])) {
		# validate entries
		$validation = new UserValidator($_POST, $_FILES);
		$errors = $validation->validateForm();
		
		if (empty($errors)) {
			
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
			$price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
			$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
			$weight = filter_var($_POST['weight'], FILTER_VALIDATE_FLOAT);
			$image = $_FILES['image'];
			
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($image["name"]);
			if (move_uploaded_file($image["tmp_name"], $target_file)) {
				
				$product = [
					"name" => $name,
					"price" => $price,
					"description" => $description,
					"weight" => $weight,
					"image" => $target_file
				];
				
				$products = file_exists('users.txt') ? json_decode(file_get_contents('users.txt'), true) : [];
				$products[] = $product;
				
				file_put_contents('users.txt', json_encode($products));
				
				echo "<h2 style='color:#36fa36'>Product added successfully.</h2>";
			} else {
				echo "<h2 style='color:#f80303'>* Error uploading file.</h2>";
			}
		}
	}
}
?>

<html>
<head>
    <title>Users Validation Form</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Product Name</span>
                <input type="text" name="name" placeholder="name" value="<?php echo $_POST['name'] ?? '' ?>"/>
                <div class="error">
					<?php echo $errors['name'] ?? '' ?>
                </div>
            </div>
            <div class="input-box">
                <span class="details">Price</span>
                <input type="text" id="price" name="price" value="<?php echo $_POST['price'] ?? '' ?>">
                <div class="error">
					<?php echo $errors['price'] ?? '' ?>
                </div>
            </div>
            <div class="input-box">
                <span class="details">Description</span>
                <textarea id="description" name="description" rows="8" cols="50"><?php echo $_POST['description'] ?? '' ?></textarea>
            </div>
            <div class="input-box">
                <span class="details">Weight</span>
                <input type="text" id="weight" name="weight" value="<?php echo $_POST['weight'] ?? '' ?>"/>
                <div class="error">
					<?php echo $errors['weight'] ?? '' ?>
                </div>
            </div>
            <div class="file-field">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                <div class="error">
					<?php echo $errors['image'] ?? '' ?>
                </div>
            </div>
            <input class="btn" type="submit" name="submit" value="Add"/>
        </div>
    </form>
</div>

<?php

if (file_exists('users.txt')) {
	$products = json_decode(file_get_contents('users.txt'), true);
	if (!empty($products)) {
		$less = array_filter($products, function($product) {
			return $product['price'] < 10000;
		});
		
		$greater = array_filter($products, function($product) {
			return $product['price'] >= 10000;
		});
		
		function displayProductsTables($products, $title)
		{
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
		displayProductsTables($less, "Products with price less than 10000");
		displayProductsTables($greater, "Products with price greater than or equal to 10000");
	}
} else {
	echo "No products found.";
}
?>

</body>
</html>
