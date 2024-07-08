<link rel="icon" type="image/x-icon" href="assets/fav_icon.png">
<style>
  body {
    margin: 0;
    font-family: "Roboto", sans-serif;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(to right, #f76b01, #f94b01);
    padding: 10px 20px;
    color: white;
    margin: 0px;
}

.logo img {
    height: 55px; /* Adjust as needed */
}

.menu {
    display: flex;
    justify-content: center;
    flex-grow: 1;
}

.menu a {
    font-size: 16px;
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    position: relative;
}

.menu a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    display: block;
    background: white;
    transition: width .3s;
    bottom: -5px;
    left: 0;
}

.menu a:hover::after {
    width: 100%;
}

.menu a:hover {
    font-size: 17px;
}

.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
}

.hamburger span {
    height: 4px;
    width: 25px;
    background-color: white;
    margin: 4px;
    border-radius: 2px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .menu {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 79px;
        right: 0;
        background: linear-gradient(to right, #f76b01, #f94b01);
        width: 200px;
    }

    .menu.active {
        display: flex;
    }

    .hamburger {
        display: flex;
    }

    .menu a {
        padding: 15px 0px;
        text-align: center;
        width: 100%;
    }
}

.auth-buttons {
    display: flex;
    gap: 5px;
}

.auth-buttons a {
    color: black;
    font-size: 13px;
    text-decoration: none;
    padding: 10px 15px;

    border: 1px solid black;
    border-radius: 5px;
    background: none;
}
/* 
.auth-buttons a:hover {
    
} */

</style>
<?php session_start(); ?>
<nav class="navbar">
    <div class="logo">
        <a href="#">
            <img src="assets/logo4.png" alt="Logo">
        </a>
    </div>
    <div class="menu" id="menu">
        <a href="#home">HOME</a>
        <a href="#contact">CONTACT</a>
        <a href="#contents">TRENDING</a>
        <a href="#videos">VIDEOS</a>
        <a href="#photos">PHOTOS</a>
    </div>
    <div class="auth-buttons">
        <?php if (isset($_SESSION['user_email'])): ?>
            <p><?php //echo $_SESSION['user_email']; ?></p>
            <a style="justify-content: center;" href="logout.php">LOGOUT</a>
        <?php else: ?>
            <a href="login.php">LOGIN</a>
            <a href="register.php">REGISTER</a>
        <?php endif; ?>
    </div>
    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
<script>
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('menu');

    hamburger.addEventListener('click', () => {
        menu.classList.toggle('active');
    });
</script>
