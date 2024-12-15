<?php
// Set response header for success
header("HTTP/1.1 200 OK");

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;

    // Validate data (simple example)
    if (!$name || !$email || !$message) {
        echo "Semua kolom harus diisi!";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email tidak valid!";
        exit;
    }

    // Process data: Save to database, send email, etc.
    // In this example, we'll just print the data (you can implement your own storage logic here)
    // e.g., save data to a database or send an email.

    // For simplicity, just return success message
    echo "Kritik dan Saran berhasil diterima!";
} else {
    // Handle invalid request
    echo "Metode request tidak valid.";
}
?>
