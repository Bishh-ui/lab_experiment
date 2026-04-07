<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopnosis";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Database created or already exists
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,
image VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // Table created or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert products if not exist
$sql = "INSERT IGNORE INTO products (id, name, price, image) VALUES
(1, 'Smartphone', '₹15,000', 'phone.jpg'),
(2, 'Laptop', '₹55,000', 'laptop.jpg')";

if ($conn->query($sql) === TRUE) {
    // Data inserted
} else {
    echo "Error inserting data: " . $conn->error;
}

// Retrieve products
$sql = "SELECT id, name, price, image FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopnosis - Products</title>
</head>
<body>

<header>
    <h1>Our Products</h1>
</header>

<nav>
    <a href="index.html">Home</a> |
    <a href="products.php">Products</a> |
    <a href="cart.html">Cart</a> |
    <a href="contact.html">Contact</a>
</nav>

<main>

<?php foreach ($products as $product): ?>
<article>
    <figure>
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="200">
        <figcaption><?php echo $product['name']; ?> - <?php echo $product['price']; ?></figcaption>
    </figure>
</article>
<?php endforeach; ?>

<section>
    <details>
        <summary>More Product Details</summary>
        <p>All products come with 3 year warranty.</p>
    </details>
</section>

</main>



</body>
</html>
