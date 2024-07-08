<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="assets/fav_icon.png">

    <link rel="stylesheet" href="https://drive.google.com/uc?id=1Xdx8HdMvtXjJSwGW5MBetXNX3e7l2wvl">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-QH9BB76ntG2g9N8FxRe+2vlfU2oTj5HvVso88p0xwAE=" crossorigin="anonymous">
    <title>REGISTER</title>
</head>

<body>
    <div id="alert-placeholder" class="alert-container"></div>
    <?php include 'navbar.php'; ?>
    <section>
        <div class="imgbx">
            <img src="assets/loginbg.png" alt="Background Image">
        </div>
        <div class="contentbx" style="padding:0px;">
            <div class="formbx" style="padding:0px;">
                <h2>Register</h2>
                <!-- Alert placeholder -->
                <?php
                require_once 'config.php';

                ini_set('display_errors', 1);
                error_reporting(E_ALL);

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $phoneno = $_POST["phoneno"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $cpassword = $_POST["cpassword"];
                    $error = array();

                    // Validate input
                    if (empty($phoneno) || empty($email) || empty($password) || empty($cpassword)) {
                        array_push($error, "All fields are required");
                    }
                    if ($password !== $cpassword) {
                        array_push($error, "Passwords do not match");
                    }
                    if (!preg_match("/^[0-9]{10}$/", $phoneno)) {
                        array_push($error, "Enter a valid 10-digit phone number");
                    }
                    if (strlen($password) < 8) {
                        array_push($error, "Password should be at least 8 characters long");
                    }
                    if (!preg_match("/[a-z]/", $password)) {
                        array_push($error, "Password must contain at least one lowercase letter");
                    }
                    if (!preg_match("/[A-Z]/", $password)) {
                        array_push($error, "Password must contain at least one uppercase letter");
                    }
                    if (!preg_match("/[0-9]/", $password)) {
                        array_push($error, "Password must contain at least one number");
                    }
                    if (!preg_match("/[@$!%*#?&]/", $password)) {
                        array_push($error, "Password must contain at least one special character");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($error, "Email is not valid");
                    }

                    $sql = "SELECT * FROM registration WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        array_push($error, "Email already exists");
                    }
                    $sql = "SELECT * FROM registration WHERE phoneno = '$phoneno'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        array_push($error, "Phone number already exists");
                    }
                    // Process form data if no errors
                    if (empty($error)) {
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        //echo "Password Hash: " . $passwordHash; // Debugging line to show the hashed password

                        $sql = "INSERT INTO registration (phoneno, email, password) VALUES (?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);

                        if (!$stmt) {
                            echo "<script>
                document.getElementById('alert-placeholder').innerHTML = '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Database error: Unable to initialize statement. <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
            </script>";
                        } else {
                            if (mysqli_stmt_prepare($stmt, $sql)) {
                                mysqli_stmt_bind_param($stmt, "sss", $phoneno, $email, $passwordHash);
                                if (mysqli_stmt_execute($stmt)) {
                                    
                                    echo "<script>
                        document.getElementById('alert-placeholder').innerHTML = '<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">Registration successful! <br> Now You Can Login!!!!! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
                    </script>";
                    
                                } else {
                                    echo "<script>
                        document.getElementById('alert-placeholder').innerHTML = '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Registration failed! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
                    </script>";
                                }
                            } else {
                                echo "<script>
                    document.getElementById('alert-placeholder').innerHTML = '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Failed to prepare the SQL statement. <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
                </script>";
                            }
                            mysqli_stmt_close($stmt);
                        }
                        mysqli_close($conn);
                    } else {
                        foreach ($error as $err) {
                            echo "<script>
                document.getElementById('alert-placeholder').innerHTML += '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">$err <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
            </script>";
                        }
                    }
                }
                ?>




                <form id="registerForm" action="register.php" method="POST">
                    <div class="intputbx">
                        <span>Phone No.</span>
                        <input type="text" name="phoneno">
                    </div>
                    <div class="intputbx">
                        <span>Email</span>
                        <input type="email" name="email" >
                    </div>
                    <div class="intputbx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="intputbx">
                        <span>Confirm Password</span>
                        <input type="password" name="cpassword">
                    </div>
                    <div class="intputbx">
                        <input id="registerBtn" type="submit" value="Register" name="submit">
                    </div>
                    <div class="intputbx">
                        <p>Have an Account? <a href="login.php">Log In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha256-S3A/S4i0pICX3WaP6R+PpEAX4b7kFBITks0uR2vSR1A=" crossorigin="anonymous"></script>
    <script src="https://drive.google.com/uc?id=1TubQ2cDzryjFVZA1SMEkTrtX-p0uF6Zm"></script>
    <script>
        document.getElementById('registerForm').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission on Enter key press
                document.getElementById('registerBtn').click();
            }
        });
    </script>
</body>

</html>


















