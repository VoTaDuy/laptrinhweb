<?php

include 'config.php';

session_start();

// Kiểm tra thông tin 
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (isset($_POST['add_to_cart'])) {

    // If user is not logged in, redirect to login page
    if ($user_id === null) {
        header('Location: login.php');
        exit();
    }

    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_image = mysqli_real_escape_string($conn, $_POST['product_image']);
    $product_quantity = (int)$_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $_SESSION['cart_message'] = 'Sản phẩm đã được thêm vào giỏ hàng!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $_SESSION['cart_message'] = 'Sản phẩm đã được thêm vào giỏ hàng!';
    }

    // Redirect to the same page to display message
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/style.css">

    <style>
    .home {
        min-height: 85vh;
        background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('../project/images/backgr.png') no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .products .box-container .box .image {
        height: 25rem;
        width: 25rem;
    }

    /* CSS để ẩn các sản phẩm sau sản phẩm thứ 5 */
    .products .box-container .box:nth-child(n+6) {
        display: none;
    }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="home">

        <div class="content">
            <h3>Điểm Bán Điện Thoại Uy Tín</h3>
            <p>Chất lượng đảm bảo – Giá trị vượt trội.</p>
            <a href="about.php" class="white-btn">XEM THÊM</a>
        </div>

    </section>

    <section class="products">

        <h1 class="title">SẢN PHẨM MỚI NHẤT!!</h1>

        <div class="box-container">

            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
            <form action="" method="post" class="box">
                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price"><?php echo number_format($fetch_products['price'], 0, ',', '.'); ?> VNĐ</div>
                <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btn">
            </form>
            <?php
                }
            } else {
                echo '<p class="empty">Chưa có sản phẩm!</p>';
            }
            ?>
        </div>

        <div class="load-more" style="margin-top: 2rem; text-align:center">
            <a href="shop.php" class="option-btn">Xem thêm</a>
        </div>

    </section>

    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="images/AnhTung.jpg" alt="" style="height: 550px; width:550px ">
            </div>

            <div class="content">
                <h3>VỀ CHÚNG TÔI</h3>
                <p>Chúng tôi đánh giá cao sự quan tâm của bạn đến bộ sưu tập đồng hồ của chúng tôi. Nếu bạn có bất kỳ
                    câu hỏi hoặc cần hỗ trợ, xin vui lòng liên hệ với chúng tôi. Chúng tôi mong được phục vụ bạn.</p>
                <a href="about.php" class="btn">Xem thêm</a>
            </div>

        </div>

    </section>

    <section class="home-contact">

        <div class="content">
            <h3>BẠN CÓ CÂU HỎI NÀO KHÔNG?</h3>
            <p>Chúng tôi rất trân trọng sự quan tâm của bạn đến bộ sưu tập đồng hồ của chúng tôi. Nếu bạn có bất kỳ câu
                hỏi nào hoặc muốn để lại đánh giá, xin vui lòng liên hệ với chúng tôi. Chúng tôi luôn sẵn sàng hỗ trợ
                bạn!</p>
            <a href="contact.php" class="white-btn">LIÊN HỆ</a>
        </div>

    </section>

    <?php include 'footer.php'; ?>

    <!-- Custom JS File Link -->
    <script src="js/script.js"></script>

    <!-- JavaScript to show alert messages -->
    <script>
    <?php if (isset($_SESSION['cart_message'])): ?>
    alert("<?php echo $_SESSION['cart_message']; ?>");
    <?php unset($_SESSION['cart_message']); // Clear message after displaying 
            ?>
    <?php endif; ?>
    </script>

</body>

</html>