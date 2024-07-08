<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="assets/fav_icon.png">

    <title>LOGIN PAGE</title>
</head>

<body>
    <section>
        <div class="imgbx">
            <img src="assets/loginbg.png">
        </div>
        <div class="contentbx" style="padding:0px;">
            <div class="formbx" style="padding:0px;">
                <h2>Login</h2>

                <?php
                require_once 'config.php';
                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // // Sanitize input to prevent SQL injection
                    $email = mysqli_real_escape_string($conn, $email);
                    $password = mysqli_real_escape_string($conn, $password);

                    $sql = "SELECT * FROM registration WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);

                    // Check if user exists
                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        // echo "Stored Hashed Password: " . $user["password"] . "<br>";
                        // echo "Entered Password: " . $password . "<br>";

                        // Verify password
                        if (password_verify($password, $user["password"])) {
                            session_start();
                            $_SESSION['user_email'] = $user['email'];
                            $_SESSION['user_id'] = $user['phoneno'];



                            header('Location: index.php');
                            exit();
                        } else {
                            echo "<script>alert('Incorrect Password')</script>";
                        }
                    } else {
                        echo "<script>alert('User not found')</script>";
                    }
                }
                ?>


                <form action="login.php" method="POST">
                    <div class="intputbx">
                        <span>Email</span>
                        <input type="email" name="email" autocomplete="on">
                    </div>
                    <div class="intputbx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="intputbx">
                        <input id="loginBtn" type="submit" value="LogIn" name="login">
                    </div>
                    <div class="intputbx">
                        <p>Don't have an Account ? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('loginBtn').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission on Enter key press
                document.getElementById('loginBtn').click();
            }
        });
    </script>
</body>
</html>