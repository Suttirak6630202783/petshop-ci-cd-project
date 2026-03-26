<?php
session_start();
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Show Product</title>
    <link rel="stylesheet" href="style.css?v=<?= time(); ?>">
</head>

<body>

    <div class="wrapper">

        <?php include "menu.php"; ?>

        <!-- ===== BANNER ===== -->
        <div class="show-banner" style="background-image: url('img/SHOW-PRODUCT.jpg');"></div>

        <!-- ===== PRODUCT GRID ===== -->
        <div class="product-section">

            <div class="product-grid">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="product-card">

                        <img src="uploads/<?= $row['image']; ?>" alt="product">

                        <div class="product-body">
                            <h3><?= $row['name']; ?></h3>
                            <p class="detail"><?= $row['detail']; ?></p>
                            <p class="price">ราคา <?= number_format($row['price']); ?> บาท</p>

                            <div class="card-actions">
                                <a href="edit_product.php?id=<?= $row['id']; ?>" class="btn-edit">แก้ไข</a>
                                <a href="delete_product.php?id=<?= $row['id']; ?>"
                                    class="btn-delete"
                                    onclick="return confirm('ลบสินค้านี้?');">
                                    ลบ
                                </a>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

        </div>

        <?php include "footer.php"; ?>

    </div>
</body>

</html>