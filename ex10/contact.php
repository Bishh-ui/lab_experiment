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
    <a href="products.php">Products</a> |
    <a href="cart.php">Cart</a> |
    <a href="contact.php">Contact</a>
</nav>

<main>

<form method="post" action="contact.php">
    <fieldset>
        <legend>Customer Details</legend>

        Name:<br>
        <input type="text" name="customerName" required><br><br>

        Email:<br>
        <input type="email" name="customerEmail" required><br><br>

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
