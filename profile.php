<?php
session_start();
require 'db.php';

// เช็ค login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">
        <?php include 'menu.php'; ?>

        <!-- ===== BANNER ===== -->
        <div class="add-banner">
            <h1>My Profile</h1>
        </div>

        <!-- ===== PROFILE ===== -->
        <div class="profile-wrapper">
            <div class="profile-card">

                <!-- รูปโปรไฟล์ -->
                <img
                    src="uploads/profile/<?= $user['profile_image'] ?: 'default.jpg'; ?>"
                    class="profile-img">

                <!-- ชื่อ -->
                <h2>
                    <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']); ?>
                </h2>

                <p class="profile-username">
                    @<?= htmlspecialchars($user['username']); ?>
                </p>

                <!-- ข้อมูล -->
                <div class="profile-info-box">

                    <div>
                        <span>Email</span>
                        <p><?= htmlspecialchars($user['email']); ?></p>
                    </div>

                    <div>
                        <span>Phone</span>
                        <p><?= htmlspecialchars($user['phone']); ?></p>
                    </div>

                    <div>
                        <span>Address</span>
                        <p><?= nl2br(htmlspecialchars($user['address'])); ?></p>
                    </div>

                </div>

                <a href="edit_profile.php" class="profile-edit-btn">
                    แก้ไขโปรไฟล์
                </a>

            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>

</body>

</html>