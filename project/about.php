<?php
include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Xử lý khi user_id chưa được thiết lập
    echo 'User ID không tồn tại trong session.';
    $user_id = null; // Hoặc bạn có thể thiết lập giá trị mặc định khác
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../project/css/style.css">

    <style>
        .heading {
            min-height: 30vh;
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            background: linear-gradient(rgb(0 0 0 / 70%), rgba(0, 0, 0, .4)), url(../project/images/about1.jpg) no-repeat;
            background-size: cover;
            background-position: center;
            text-align: center;
        }


        .heading h3 {
            font-size: 5rem;
            color: var(--white);
            text-transform: uppercase;
        }

        .heading p {
            font-size: 2.5rem;
            color: var(--light-color);
        }

        .heading p a {
            color: var(--white);
        }

        .heading p a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">

    </div>

    <section class="about">

        <div class="flex">

            <div class="image">
                <img src="images/about.jpg" alt="" width="450" height="450" style="opacity: 0.9;">

            </div>

            <div class="content">
                <h3>Tại sao lại chọn chúng tôi?</h3>
                <p>Với kinh nghiệm nhiều năm, chúng tôi cung cấp dịch vụ chất lượng cao, thiết kế riêng theo nhu cầu của
                    bạn. Giá cả cạnh tranh đảm bảo giá trị tuyệt vời, cùng với đội ngũ hỗ trợ khách hàng tận tâm luôn
                    sẵn sàng. Chúng tôi không ngừng đổi mới và cải thiện để mang đến giải pháp tốt nhất. Hãy chọn chúng
                    tôi vì chuyên môn, chất lượng và dịch vụ đặc biệt.</p>
                <a href="contact.php" class="btn">Liên hệ</a>
            </div>

        </div>

    </section>

    <section class="reviews">

        <h1 class="title">Đánh giá của khách hàng</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/Hau.jpg" alt="">
                <p>Tôi rất hài lòng với Điện Thoại mua tại đây. Đội ngũ thân thiện và vui tươi</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Phạm Công Hậu</h3>
            </div>

            <div class="box">
                <img src="images/MinhLuc.jpg" alt="">
                <p> Điện thoại từ DTH Phone với tôi không khác gì 1 món quà. tôi đã rât vui vì mình đã mua ở đây.
                </p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Đào Minh Lực</h3>
            </div>

            <div class="box">
                <img src="images/ThuVO.jpg" alt="">
                <p>Mua sắm tại DTH Phone là 1 trải nghiệm tuyệt vời. Tôi ấn tượng với đội ngũ chuyên nghiệp của
                    họ</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Võ Anh Thư</h3>
            </div>

            <div class="box">
                <img src="images/AnhTa.jpg" alt="">
                <p>Tôi đã mua Điện thoại tại DTH phone cho cả gia đình. Giá cả hợp lý, chất
                    lượng đảm bảo. Tôi rất mong đợi lần quay lại tiếp theo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Vo Ta Duy</h3>
            </div>

            <div class="box">
                <img src="images/AnhNguyen.jpg" alt="">
                <p>Dịch vụ sau bán hàng của DTH phone thật sự xuất sắc. Họ luôn sẵn sàng hỗ trợ và giải đáp mọi thắc
                    mắc của tôi.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Lê Anh Nguyên</h3>
            </div>

            <div class="box">
                <img src="images/Trung.jpg" alt="">
                <p>Tôi rất thích sự đa dạng trong bộ sưu tập DTH phone. Có nhiều lựa chọn phong cách khác
                    nhau, phù hợp với mọi dịp.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Nguyễn Ngọc Trung</h3>
            </div>

        </div>

    </section>

    <section class="authors">

        <h1 class="title">TÁC GIẢ</h1>

        <div class="box-container">
            <!-- VÕ TÁ DUY -->
            <div class="box">
                <img src="images/AnhTa.jpg" alt="" style="width:350px;height:400px;">
                <div class="share">
                    <a href="https://www.facebook.com/duy.vota.90" target="_blank" class="fab fa-facebook-f"></a>
                    <a href="https://www.tiktok.com/@wigan022" target="_blank" class="fab fa-tiktok"></a>
                    <a href="https://www.instagram.com/puis0212/" target="_blank" class="fab fa-instagram"></a>
                </div>
                <h3>Võ Tá Duy</h3>
            </div>
            <!-- TRUNG -->
            <div class="box">
                <img src="images/Trung.jpg" alt="" style="width:300px;height:400px;">
                <div class="share">
                    <a href="https://www.facebook.com/ngoctrung2003" class="fab fa-facebook-f"></a>
                    <a href="https://www.instagram.com/_nqc.trugnn/" class="fab fa-instagram"></a>
                </div>
                <h3>Nguyễn Ngọc Trung</h3>
            </div>
            <!-- HẬU -->
            <div class="box">
                <img src="images/Hau.jpg" alt="" style="width:300px;height:400px;">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100015871594651" class="fab fa-facebook-f"></a>
                </div>
                <h3>Phạm Công Hậu</h3>
            </div>


        </div>

    </section>







    <?php include 'footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>