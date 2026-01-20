<?php
// ✅ บังคับ charset ให้ browser
header('Content-Type: text/html; charset=utf-8');

// ✅ เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "xapp");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . $conn->connect_error);
}

// ✅ ตั้ง charset ให้ MySQL (สำคัญมาก)
$conn->set_charset("utf8mb4");

// ดึงข้อมูลสินค้า
$result = $conn->query("SELECT * FROM market");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการสินค้า</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4" style="background: linear-gradient(135deg, #e3f2fd, #ffffff);">

<div class="container mt-4">
    <h1 class="mb-2">🛒 รายการสินค้า</h1>
    <p class="text-muted">แพลตฟอร์มขายของออนไลน์สำหรับวิทยาลัยเทคนิคนางรอง</p>

    <div class="row g-3">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm">
                        <img 
                            src="<?= htmlspecialchars($row['image_path']) ?>" 
                            class="card-img-top"
                            alt="<?= htmlspecialchars($row['product_name']) ?>"
                            style="height: 200px; object-fit: cover;"
                        >

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <?= htmlspecialchars($row['product_name']) ?>
                            </h5>

                            <p class="text-danger fw-bold mb-3">
                                <?= number_format($row['price'], 2) ?> บาท
                            </p>

                            <a 
                                href="checkout.html?id=<?= $row['id'] ?>" 
                                class="btn btn-primary mt-auto w-100"
                            >
                                เพิ่มลงตะกร้า
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-danger">ไม่มีข้อมูลสินค้า</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
