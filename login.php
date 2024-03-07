<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'register';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Receive Form Data
    $email = $_POST['loginEmail']; // Updated to use 'loginEmail' field name
    $password = $_POST['loginPassword']; // Updated to use 'loginPassword' field name

    // Sanitize Data (Example using mysqli_real_escape_string)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if user exists with the provided email and password
    $sql = "SELECT * FROM register_db WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, perform login action
        // For example, set session variables, redirect user, etc.
        echo "<script>alert('Login successful');</script>";
    } else {
        // User doesn't exist or invalid credentials
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
        // Redirect back to the contact.php page
        header("Location: contact.php");
        exit(); // Ensure that no further code is executed after the redirect
    }

    // Close Connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Feedback</title>
</head>

<body>
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <a href="index.html" class="feedback__logo">Go back to Maine</a>
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <div class="feedback-container">
        <div class="feedback-content">
            <p>Comments, suggestions, collaborations</p>
            <textarea id="feedbackText" name="feedbackText" placeholder="Enter text" required></textarea>
            <button type="submit" class="submit-btn" id="submit-btn">Submit</button>
            <p id="messageSent" style="display:none;">Message Sent</p>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const submitBtn = document.getElementById("submit-btn"); // Corrected ID here
            const feedbackText = document.getElementById("feedbackText");
            const messageSent = document.getElementById("messageSent");

            submitBtn.addEventListener("click", function () {
                messageSent.style.display = "block"; // Show "Message Sent" paragraph
                feedbackText.style.display = "none"; // Hide textarea
                document.querySelector('.feedback-content p').style.display = "none"; // Hide comments paragraph
                submitBtn.style.display = "none"; // Hide submit button
            });
        });

    </script>
</body>

</html>