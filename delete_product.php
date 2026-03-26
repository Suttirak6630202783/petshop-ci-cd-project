<?php
include 'db.php';

$id = $_GET['id'];

// ดึงชื่อรูป
$sql = "SELECT image FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// ลบไฟล์รูป
if ($row['image'] && file_exists("uploads/" . $row['image'])) {
    unlink("uploads/" . $row['image']);
}

// ลบข้อมูล
mysqli_query($conn, "DELETE FROM products WHERE id = $id");

// กลับหน้า show
header("Location: show_product.php");

