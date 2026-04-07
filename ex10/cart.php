<?php
session_start();

// Set a cookie for last visit
if (!isset($_COOKIE['last_visit'])) {
    setcookie('last_visit', date('Y-m-d H:i:s'), time() + (86400 * 30), "/"); // 30 days
}

// Initialize cart in session if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        ['name' => 'Smartphone', 'price' => '₹15,000', 'quantity' => 1],
        ['name' => 'Laptop', 'price' => '₹55,000', 'quantity' => 1]
    ];
}

$cart = $_SESSION['cart'];
$total = 0;
foreach ($cart as $item) {
    $price = floatval(str_replace(['₹', ',', ' '], '', $item['price']));
    $total += $price * $item['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopnosis - Cart</title>
</head>
<body>

<header>
    <h1>Your Cart</h1>
</header>

<nav>
    <a href="index.html">Home</a> |
    <a href="products.php">Products</a> |
    <a href="cart.php">Cart</a> |
    <a href="contact.php">Contact</a>
</nav>

<main>

<?php if (isset($_COOKIE['last_visit'])): ?>
<p>Last visit: <?php echo $_COOKIE['last_visit']; ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart as $item): ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>

<footer>
    <p>Total Amount: ₹<?php echo number_format($total, 2); ?></p>
</footer>

</body>
</html>
