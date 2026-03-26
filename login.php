<?php
session_start();
include "db.php";

$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['username'] = $user['username'];
        $_SESSION['userid'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['profile_image'] = $user['profile_image'];

        header("Location: index.php");
        exit();
    } else {
        $message = "Username หรือ Password ไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login - PetShop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form-wrapper">

        <h2 style="text-align:center; margin-top:20px; font-size:28px; font-weight:800;">
            LOGIN
        </h2>

        <div class="form-top">

            <?php if ($message): ?>
                <p style="text-align:center; color:red; font-weight:bold;"><?php echo $message; ?></p>
            <?php endif; ?>

            <form method="POST">
                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <div style="text-align:center;">
                    <button class="form-btn" name="login">Login</button>
                </div>
            </form>

            <p style="text-align:center; margin-top:10px;">
                ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a>
            </p>

        </div>

        <div class="form-banner"></div>

    </div>

</body>

</html>