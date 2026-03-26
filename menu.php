<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="navbar">

    <!-- LEFT MENU -->
    <div class="nav-left">
        <a href="index.php">
            <img src="img/ICON.png" alt="logo">
        </a>

        <?php if (isset($_SESSION['username'])): ?>
            <a href="show_product.php">SHOW PRODUCT</a>
            <a href="add_product.php">ADD PRODUCT</a>
        <?php endif; ?>
    </div>

    <!-- RIGHT MENU -->
    <div class="nav-right">

        <?php if (!isset($_SESSION['username'])): ?>

            <a href="login.php">LOGIN</a>
            <a href="register.php">REGISTER</a>

        <?php else: ?>

            <div class="profile-info">
                <span><?php echo $_SESSION['username']; ?></span>
            </div>

            <a class="logout-btn" href="logout.php">LOGOUT</a>

        <?php endif; ?>

    </div>
</div>