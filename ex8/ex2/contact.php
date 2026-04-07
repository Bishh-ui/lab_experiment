<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['customerName']);
    $email = trim($_POST['customerEmail']);
    $category = trim($_POST['category']);
    $message = trim($_POST['message']);

    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (empty($errors)) {
        // Process the form
        echo "<p>Thank you for your message, $name!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopnosis - Contact</title>
</head>
<body>

<header>
    <h1>Contact Us</h1>
</header>

<nav>
    <a href="index.html">Home</a> |
    <a href="products.html">Products</a> |
    <a href="cart.html">Cart</a> |
    <a href="contact.php">Contact</a>
</nav>

<main>

<form method="post" action="contact.php">
    <fieldset>
        <legend>Customer Details</legend>

        Name:<br>
        <input type="text" name="customerName" required><br><br>

        Email:<br>
        <input type="email" name="customerEmail" required  ><br><br>

        Product Category:<br>
        <select name="category">
            <option>Electronics</option>
            <option>Clothing</option>
            <option>Accessories</option>
        </select><br><br>

        Message:<br>
        <textarea name="message" rows="4" cols="30" required></textarea><br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>

</main>


</body>
</html>
