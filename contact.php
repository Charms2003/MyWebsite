<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'register'; //change this to name of your database

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";
    }

    // Receive Form Data
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $country = $_POST['country']; // Added country field
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $contact = $_POST['contact']; // Added contact field
    $email = $_POST['email']; // Added email field
    $password = $_POST['password']; // Added password field

    // Sanitize Data (Example using mysqli_real_escape_string)
    $lname = mysqli_real_escape_string($conn, $lname);
    $fname = mysqli_real_escape_string($conn, $fname);
    $address = mysqli_real_escape_string($conn, $address);
    $country = mysqli_real_escape_string($conn, $country); // Sanitized country field
    $province = mysqli_real_escape_string($conn, $province);
    $city = mysqli_real_escape_string($conn, $city);
    $barangay = mysqli_real_escape_string($conn, $barangay);
    $contact = mysqli_real_escape_string($conn, $contact); // Sanitized contact field
    $email = mysqli_real_escape_string($conn, $email); // Sanitized email field
    $password = mysqli_real_escape_string($conn, $password); // Sanitized password field

    // Insert Data into Database, change the table name
    $sql = "INSERT INTO register_db (lname, fname, address, country, province, city, barangay, contact, email, password) VALUES ('$lname', '$fname', '$address', '$country', '$province', '$city', '$barangay', '$contact', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully Registered');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close Connection
    $conn->close();
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- =====BOX ICONS===== -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MyWebsite</title>
    <script src="contact.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <a href="index.html" class="nav__logo">Maine</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.html" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="about.html" class="nav__link">About Me</a></li>
                    <li class="nav__item"><a href="work.html" class="nav__link">Creative Works</a></li>
                    <li class="nav__item"><a href="contact.php" class="nav__link">Contact</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <!--===== CONTACT =====-->

    <section class="contact section" id="contact">
        <h2 class="section-title">Contact</h2>

        <div class="contact__container bd-grid">
            <p>Comments, suggestions, collaborations</p>


            <!-- LOGIN FORM -->
            <div id="login-container">
                <form class="login-form" action="login.php" method="post">
                    <h2>Login</h2>
                    <div class="input-group">
                        <label for="loginEmail">Email</label>
                        <input type="text" id="loginEmail" name="loginEmail" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
                    </div>
                    <div class="button-group">
                        <button type="button" class="register-btn" id="registerBtn">Register</button>
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                </form>
            </div>

            <!-- REGISTER FORM -->

            <div id="register-container" style="display:none;">
                <form class="register-form" action="contact.php" method="post">

                    <div class="register-heading">
                        <h2>Register</h2>
                    </div>

                    <div class="register-input-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="register-input-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="register-input-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Address" required>
                    </div>
                    <div class="register-input-group">
                        <label for="country">Country</label>
                        <select id="country" name="country" required>
                            <option value="Philippines" selected>Philippines</option>
                        </select>
                    </div>
                    <div class="register-input-group">
                        <label for="province">Province</label>
                        <select id="province" name="province" required>
                            <!-- Options for province dropdown -->
                        </select>
                    </div>
                    <div class="register-input-group">
                        <label for="city">City/Municipality</label>
                        <select id="city" name="city" required>
                            <!-- Options for city dropdown -->
                        </select>
                    </div>
                    <div class="register-input-group">
                        <label for="barangay">Barangay</label>
                        <select id="barangay" name="barangay" required>
                            <!-- Options for barangay dropdown -->
                        </select>
                    </div>
                    <div class="register-input-group">
                        <label for="contact">Contact</label>
                        <input type="text" id="contact" name="contact" placeholder="Contact" required>
                    </div>
                    <div class="register-input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="register-input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="register-input-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword"
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="register-button-group">
                        <button type="submit" class="for-register-btn">Register</button>
                        <button type="button" class="for-login-btn" id="backToLoginBtn">Go back to Login</button>
                    </div>
                </form>
            </div>


            <script src="dropdown.js"></script>

        </div>
    </section>


    </main>