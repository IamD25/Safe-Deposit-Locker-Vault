<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST["fullName"]);
    $email = trim($_POST["emailAddress"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);
    $contactNumber = trim($_POST["contactNumber"]);

    $errors = [];

    if (empty($fullName)) {
        $errors[] = "Full Name is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }

    if (!preg_match('/^\d{10}$/', $contactNumber)) {
        $errors[] = "Invalid contact number";
    }

    if (empty($errors)) {
        // Process form (e.g., save to database)
        echo "Form submitted successfully!";
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
