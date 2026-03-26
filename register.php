<?php
include "db.php";
$message = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($check) > 0) {
        $message = "Username ถูกใช้แล้ว";
    } else {
        $sql = "INSERT INTO users(username, firstname, lastname, password, email, phone, address)
                VALUES('$username','$firstname','$lastname','$password','$email','$phone','$address')";

        if (mysqli_query($conn, $sql)) {
            $message = "สมัครสมาชิกสำเร็จ!";
        } else {
            $message = "เกิดข้อผิดพลาด";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Register - PetShop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form-wrapper">

        <h2 style="text-align:center; margin-top:20px; font-size:28px; font-weight:800;">
            REGISTER
        </h2>

        <div class="form-top">

            <?php if ($message): ?>
                <p style="text-align:center; color:<?php echo strpos($message, "สำเร็จ") ? "green" : "red"; ?>;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>

            <form method="POST">

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Firstname</label>
                <input type="text" name="firstname" required>

                <label>Lastname</label>
                <input type="text" name="lastname" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <label>Email</label>
                <input type="email" name="email">

                <label>Phone</label>
                <input type="text" name="phone">

                <label>Address</label>
                <input type="text" name="address">

                <div style="text-align:center;">
                    <button class="form-btn" name="register">Register</button>
                </div>

            </form>

            <p style="text-align:center; margin-top:10px;">
                มีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบ</a>
            </p>

        </div>

        <div class="form-banner"></div>

    </div>

</body>

</html>