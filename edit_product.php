<?php
include 'db.php';

// รับ id
$id = $_GET['id'];

// ดึงข้อมูลสินค้าเดิม
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// เมื่อกดบันทึก
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

    // ถ้ามีอัปโหลดรูปใหม่
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        // ย้ายไฟล์
        move_uploaded_file($tmp, "uploads/" . $image);

        // (เสริม) ลบรูปเก่า
        if ($product['image'] && file_exists("uploads/" . $product['image'])) {
            unlink("uploads/" . $product['image']);
        }
    } else {
        $image = $product['image'];
    }

    // update
    $update = "UPDATE products SET
                name='$name',
                price='$price',
                detail='$detail',
                image='$image'
               WHERE id=$id";

    mysqli_query($conn, $update);
    header("Location: show_product.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">

        <!-- 🔶 MENU -->
        <?php include 'menu.php'; ?>

        <!-- 🔶 BANNER -->
        <div class="add-banner">
            <h1>Edit Product</h1>
        </div>

        <!-- 🔶 CONTENT -->
        <div class="add-product-wrapper">
            <div class="add-product-box">

                <form method="post" enctype="multipart/form-data" class="form-grid">

                    <!-- ชื่อสินค้า -->
                    <div>
                        <label>ชื่อสินค้า</label>
                        <input type="text" name="name" value="<?= $product['name']; ?>" required>
                    </div>

                    <!-- ราคา -->
                    <div>
                        <label>ราคา</label>
                        <input type="number" name="price" value="<?= $product['price']; ?>" required>
                    </div>

                    <!-- รายละเอียด -->
                    <div class="form-grid-full">
                        <label>รายละเอียดสินค้า</label>
                        <textarea name="detail" rows="4"><?= $product['detail']; ?></textarea>
                    </div>

                    <!-- รูปสินค้า -->
                    <!-- รูปสินค้า -->
                    <div class="form-grid-full upload-box">

                        <img
                            src="uploads/<?= $product['image']; ?>"
                            class="preview-img"
                            id="previewImg"
                            alt="preview">

                        <div class="upload-text">
                            <p class="upload-title">แก้ไขรูปสินค้า</p>
                            <p class="upload-desc">คลิกปุ่มด้านล่างเพื่อเลือกรูปใหม่</p>
                        </div>

                        <!-- input file (ซ่อนไว้ แต่ยังทำงาน) -->
                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            accept="image/*">

                        <!-- ปุ่ม -->
                        <label for="imageInput" class="browse-btn">
                            เลือกรูปใหม่
                        </label>

                    </div>

                    <!-- ปุ่ม -->
                    <div class="form-grid-full">
                        <button type="submit" name="submit" class="submit-btn">
                            บันทึกการแก้ไข
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- 🔶 FOOTER -->
        <?php include 'footer.php'; ?>

    </div>

    <!-- 🔶 SCRIPT preview รูป -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('previewImg').src = URL.createObjectURL(file);
            }
        });
    </script>

</body>

</html>