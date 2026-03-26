<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PetShop Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">

        <!-- ===== NAVBAR ===== -->
        <?php include "menu.php"; ?>

        <!-- ===== BANNER ===== -->
        <div class="banner" style="background-image: url('img/PETSHOP-INVENTORY.jpg');"></div>


        <!-- ===== CONTENT ===== -->
        <div class="container">

            <h1>WELCOME TO PETSHOP</h1>
            <h2>ร้านขายอาหารสัตว์เลี้ยง และอุปกรณ์คุณภาพดี ราคาประหยัด</h2>

            <p>
                สวัสดีลูกค้าทุกท่านที่เข้ามาเยี่ยมชมร้านของเรา PetShop ที่นี่เรามุ่งเน้นในการคัดสรรสินค้าคุณภาพ
                เพื่อสัตว์เลี้ยงที่คุณรัก ไม่ว่าจะเป็นอาหารสัตว์ อุปกรณ์ดูแลสุขภาพ ของเล่น หรือสินค้าเฉพาะทาง
                เราพร้อมให้บริการด้วยหัวใจและใส่ใจในทุกรายละเอียด เพื่อให้สัตว์เลี้ยงของคุณมีความสุขและมีสุขภาพที่ดี
            </p>

            <p>
                หากคุณต้องการคำแนะนำเพิ่มเติม ทีมงานของเราพร้อมให้คำปรึกษาอย่างเป็นกันเอง
                ขอให้ทุกท่านเพลิดเพลินกับการเลือกซื้อสินค้า และหวังว่าจะได้เป็นส่วนหนึ่งในการดูแลสัตว์เลี้ยงของคุณค่ะ ❤️
            </p>

        </div>

        <?php include "footer.php"; ?>


    </div>
</body>

</html>