<?php
session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_product'])) {

    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $newName = time() . "_" . $image;
    move_uploaded_file($tmp, "uploads/" . $newName);

    $sql = "INSERT INTO products (name, detail, price, quantity, image)
            VALUES ('$name','$detail','$price','$quantity','$newName')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Add product เรียบร้อยแล้ว');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <!-- สำคัญ -->
    <link rel="stylesheet" href="style.css?v=1">
</head>

<body>

    <div class="wrapper">

        <?php include "menu.php"; ?>

        <!--  BANNER ===== -->
        <div class="add-banner">
            <h1>ADD PRODUCT</h1>
        </div>

        <!-- ===== FORM ===== -->
        <div class="add-product-wrapper">

            <div class="add-product-box">

                <form method="POST" enctype="multipart/form-data">

                    <div class="form-grid">

                        <div class="form-grid-full">
                            <label>ชื่อสินค้า</label>
                            <input type="text" name="name" required>
                        </div>

                        <div class="form-grid-full">
                            <label>รายละเอียดสินค้า</label>
                            <textarea name="detail" rows="3"></textarea>
                        </div>

                        <div>
                            <label>ราคา</label>
                            <input type="number" name="price" required>
                        </div>

                        <div>
                            <label>จำนวน</label>
                            <input type="number" name="quantity" required>
                        </div>

                        <div class="upload-box">

                            <!-- รูป preview เต็มกรอบ -->
                            <img id="preview" class="upload-preview">

                            <!-- content ซ้อนด้านหน้า -->
                            <div class="upload-content" id="uploadContent">
                                <p class="upload-title">Choose a file or drag & drop it here</p>
                                <p class="upload-desc">PNG, JPG up to 50MB</p>

                                <input type="file" id="image" name="image" required
                                    onchange="previewImage(this)">
                                <label for="image" class="browse-btn">Browse File</label>
                            </div>

                        </div>


                    </div>

                    <button type="submit" name="add_product" class="submit-btn">
                        ADD PRODUCT
                    </button>

                </form>

            </div>

        </div>

        <?php include "footer.php"; ?>

    </div>

    <!-- ===== PREVIEW SCRIPT ===== -->
    <script>
        function previewImage(input) {
            const preview = document.getElementById("preview");
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>