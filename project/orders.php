<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
    /* style.css */
    body {
        font-family: 'Roboto', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .heading {
        background-color: #f5f5f5;
        padding: 20px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .heading h3 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .heading p {
        margin: 5px 0 0;
        color: #666;
    }

    .placed-orders {
        padding: 20px;
        background-color: #fff;
    }

    .title {
        font-size: 4rem;
        margin-bottom: 30px;
        text-align: center;
        color: #333;
    }

    .order-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .order-box {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .order-info {
        display: flex;
        flex-direction: column;
    }

    .order-details p {
        margin: 5px 0;
        font-size: 2rem;

    }

    .order-details span {
        font-weight: 500;
    }

    .payment-status {
        font-weight: bold;
        padding: 2px 5px;
        border-radius: 4px;
    }

    .payment-status.pending {
        color: #ff6f6f;
        background-color: #ffe5e5;
    }

    .payment-status.completed {
        color: #4caf50;
        background-color: #e8f5e9;
    }

    .empty {
        text-align: center;
        font-size: 18px;
        color: #888;
    }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="placed-orders">
        <h1 class="title">Đơn đặt hàng</h1>
        <div class="order-container">
            <?php
            $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($order_query) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
            ?>
            <div class="order-box">
                <div class="order-info">
                    <div class="order-details">
                        <p>Ngày đặt hàng:
                            <span><?php echo date('d/m/Y', strtotime($fetch_orders['placed_on'])); ?></span>
                        </p>
                        <p>Tên người đặt hàng: <span><?php echo $fetch_orders['name']; ?></span></p>
                        <p>Số điện thoại: <span><?php echo $fetch_orders['number']; ?></span></p>
                        <p>Email: <span><?php echo $fetch_orders['email']; ?></span></p>
                        <p>Địa chỉ: <span><?php echo $fetch_orders['address']; ?></span></p>
                        <p>Phương thức thanh toán: <span><?php echo $fetch_orders['method']; ?></span></p>
                        <p>Tên sản phẩm: <span><?php echo $fetch_orders['total_products']; ?></span></p>
                        <p>Tổng: <span><?php echo number_format($fetch_orders['total_price'], 0, ',', '.'); ?>
                                VNĐ</span></p>
                        <p>Tình trạng thanh toán:
                            <span
                                class="payment-status <?php echo ($fetch_orders['payment_status'] == 'Đang duyệt') ? 'pending' : 'completed'; ?>">
                                <?php echo $fetch_orders['payment_status']; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">Chưa có đơn hàng nào!</p>';
            }
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <!-- Custom JS File Link -->
    <script src="js/script.js"></script>
</body>

</html>