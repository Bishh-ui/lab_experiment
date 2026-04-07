<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
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
        // Process the form, e.g., send email or save to database
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
    <title>Contact Me</title>
</head>
<body>

<h1>Contact Information</h1>

<p>Email: jhab8505@email.com</p>
<p>Phone: 8789279021</p>
<p>City: Bengaluru</p>

<hr>

<h2>Send Me a Message</h2>

<form method="post" action="contact.php">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone:</label><br>
    <input type="tel" name="phone"><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="4" cols="30" required></textarea><br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>

<hr>

<h2>Navigation</h2>
<a href="index.html">Home</a><br>
<a href="about.html">About Me</a><br>
<a href="education.html">Education</a><br>
<a href="contact.php">Contact</a><br>

</body>
</html>
