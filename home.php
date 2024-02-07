<?php

use PSpell\Config;

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk</title>
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOJdbE2YXgXN_hitWtAYn3GSQQQoEq8e1rrQ&usqp=CAU" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/iCon/themify-icons/themify-icons.css">


</head>

<body>
    <div id="main">
        <div id="header">
            <div class="logo">
                <a href="#" class="logo-milk">
                    <img src="./assets/img/Logo/logoweb.jpg" alt="" class="milk-img">
                </a>
            </div>

            <ul id="nav">
                <!-- Trang chủ, Giới thiệu, Contact, Sản phẩm -->
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#content-a">Giới thiệu</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <a href="#milks">Sản phẩm
                        <i class="nav-arrow-down ti-angle-down"></i>

                    </a>
                    <ul class="sub-nav">

                        <?php
                            include 'config.php';

                            $sql = "SELECT title FROM brand";
                            $old = mysqli_query($conn, $sql);
                        ?>
                
                        <?php 
                            while($row = mysqli_fetch_assoc($old)) 
                            {
                        ?>
                            <!-- Vinamilk, Milo, Nutifood, TH True Milk -->
                            <li><a href="#<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></li>
                        <?php 
                            }
                        ?>
                    </ul>
                </li>
            </ul>

            <div class="customer">
                <!-- Nếu người dùng đã đăng nhập -->
                <?php if (isset($_SESSION['username'])) : ?>

                <ul id="nav-login">
                    <li>
                        <div class="user">
                            <i class="user-icon ti-user"></i>
                            <span>
                                <?php echo $_SESSION['username']; ?>
                            </span>
                        </div>
                        <?php 
                            include 'config.php';

                            $sql = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";

                            $old = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($old);
                            // echo $row['role'];                            
                        ?>

                        <?php if ($row['role'] == 'ADMIN') : ?>

                            <ul class="sub-nav-login">
                                <li><a href="admin.php" class="admin">Admin</a></li>
                                <li>
                                    <form action="logout_submit.php" method="post">
                                        <button type="submit" name="logout" class="btn-logout">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>

                        <?php else: ?>

                            <ul class="sub-nav-login">
                                <li>
                                    <form action="logout_submit.php" method="post">
                                        <button type="submit" name="logout" class="btn-logout">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>

                        <?php endif; ?>
                    </li>
                </ul>
                <!-- Nếu người dùng chưa đăng nhập -->
                <?php else : ?>
                <div class="user">
                    <i class="user-icon ti-user"></i>
                    <a href="#" class="js-dn">Đăng nhập</a> | <a href="#" class="js-dk">Đăng ký</a>
                </div>
                <?php endif; ?>
                
                
                <i class="btn-shop ti-shopping-cart"></i>

                <div class="search-btn">
                    <i class="search-icon ti-search"></i>
                </div>

            </div>

        </div>


        <div id="slider">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="./assets/img/Slider/slide1.jpg" alt="" class="slide-milk-img">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/img/Slider/slide2.jpg" alt="" class="slide-milk-img">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/img/Slider/slide4.jpg" alt="" class="slide-milk-img">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/img/Slider/slide5.jpg" alt="" class="slide-milk-img">
                    </div>
                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>


        <div id="content">
            <!-- Giới thiệu -->
            <div id="content-a" class="content-section">
                <h2 class="content-heading">Giới thiệu</h2>

                <table class="introduce">

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd">Dinh Dưỡng Tối Ưu:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Sữa tươi là nguồn cung cấp chất canxi, protein, vitamin D và khoáng chất, giúp hỗ trợ xây dựng và duy trì cơ bắp, xương, và răng khỏe mạnh.
                            </p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd">Dễ Tiêu Hóa:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Sự tươi mới của sữa tươi giúp dễ tiêu hóa hơn, phù hợp cho mọi độ tuổi và đặc biệt là những người có vấn đề về hệ tiêu hóa.
                            </p>
                            <hr>

                        </td>
                    </tr>

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd">Hỗ Trợ Phục Hồi Cơ Bắp:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Protein chất lượng cao trong sữa tươi là nguồn năng lượng quan trọng, giúp phục hồi cơ bắp sau hoạt động thể chất.
                            </p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd">Hỗ Trợ Phát Triển Não Bộ:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Chứa axit amin và DHA, sữa tươi hỗ trợ phát triển não bộ, đặc biệt quan trọng trong giai đoạn phát triển của trẻ em.
                            </p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd"> Tăng Cường Sức Khỏe Trẻ Em:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Sữa tươi là nguồn dưỡng chất quan trọng giúp trẻ phát triển toàn diện, xây dựng hệ thống miễn dịch mạnh mẽ.
                            </p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd">Giữ Ẩm Da và Làm Đẹp Tự Nhiên:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Vitamin và khoáng chất trong sữa tươi có thể giúp duy trì độ ẩm cho da, mang lại làn da khỏe mạnh và đẹp tự nhiên.
                            </p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td class="introduce-head">
                            <h4 class="table-hd"> Hỗ Trợ Phục Hồi Sau Bệnh:</h4>
                        </td>

                        <td class="introduce-body">
                            <p class="text-about">
                            Dinh dưỡng cao trong sữa tươi giúp cơ thể nhanh chóng phục hồi sau khi ốm đau, giúp tái tạo tế bào và củng cố sức khỏe.
                            </p>
                            
                        </td>
                    </tr>
                </table>


            </div>

            <!-- Sản phẩm -->
            <div class="bg-milk">
                <div id="milks" class="content-section">
                    
                    <h2 class="content-heading text-white">Sản phẩm</h2>
                    <?php
                        include 'config.php';

                        $sql = "SELECT title FROM brand";
                        $old = mysqli_query($conn, $sql);
                    ?>
            
                    <?php 
                        while($row = mysqli_fetch_assoc($old)) 
                        {
                    ?>

                        <!-- Bg: Vinamilk -->
                        <h3 id="<?php echo $row['title']; ?>" class="list-head text-white"><?php echo $row['title']; ?></h3>
                        <?php 
                            include 'config.php';

                            $sql_s = "SELECT * FROM product WHERE brand = '{$row['title']}' ";
                            
                            $result = mysqli_query($conn, $sql_s);
                        ?>
                        <div class="row list-milk">

                            <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>

                            <div class="col col-fif ">
                                <img src="

                                    <?php echo $row['image']; ?>

                                " alt="" class="milk-img">
                                <div class="body-milk">
                                    <div class="content-cast">
                                        <h5 class="cast">
                                        <?php echo $row['price']; ?> VNĐ
                                        </h5>
                                        <h6>
                                        <?php echo $row['type']; ?>
                                        </h6>
                                    </div>
                                    <div class="content-buy">
                                        <button class="buy-milk">Buy</button>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>

                        </div>
                        <!-- End: Vinamilk -->

                    <?php 
                        }
                    ?>

                   

                </div>
            </div>

            <!-- BG: Contact -->
            <div id="contact" class="content-section">
                <h2 class="content-heading">Contact</h2>

                <div class="row contact-content">
                    <div class="col col-half map">
                        <iframe class="map-img" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6434900.284017996!2d101.03348579882817!3d38.04612740719044!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1700389012042!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade "></iframe>
                    </div>

                    <div class="col col-half info">
                        <div class="row contact-info">
                            <div class="col col-full infomation">
                                <p><i class="ti-location-pin"></i>Đại học Kiến trúc Đà Nẵng</p>
                                <p><i class="ti-mobile"></i>Phone: +00 19191919</p>
                                <p><i class="ti-email"></i>Email: mail@mail.com</p>
                            </div>
                        </div>

                        <form action="">
                            <div class="row contact-form mt-44">
                                <div class="col col-half">
                                    <input type="text" name="" placeholder="Name" required class="form-control">
                                </div>

                                <div class="col col-half">
                                    <input type="email" name="" placeholder="Email" required class="form-control">
                                </div>
                            </div>
                            <div class="row contact-form mt-8">
                                <div class="col col-full">
                                    <input type="text" name="" placeholder="Message" required class="form-control">
                                </div>
                            </div>
                            <input class="pull-right btn mt-16" type="submit" value="SEND">
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div id="footer">
            <div class="socials-list">
                <a href=""><i class="ti-facebook"></i></a>
                <a href=""><i class="ti-instagram"></i></a>
                <a href=""><i class="ti-youtube"></i></a>
                <a href=""><i class="ti-pinterest"></i></a>
                <a href=""><i class="ti-twitter"></i></a>
                <a href=""><i class="ti-linkedin"></i></a>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------- -->
    <div class="modal-dn js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header">
                <h3 class="header-dn">Đăng nhập</h3>
            </header>
            
            <?php
            include 'config.php';

            if (isset($_POST['submitLogin']) && $_POST['username'] != '' && $_POST['password'] != '') {
                $username = $_POST["username"];
                $password = md5($_POST["password"]);
                

                $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
                $old = mysqli_query($conn, $sql);
                $numRow = mysqli_num_rows($old);
                if ($numRow >= 1) {
                    /* Dòng này tạo một biến phiên (session) có tên "loggedin" và gán giá trị true cho nó. 
                    Biến phiên là một cách để lưu trữ thông tin trạng thái người dùng trên nhiều trang trong ứng dụng web. 
                    Trong trường hợp này, biến "loggedin" được sử dụng để xác định xem người dùng đã đăng nhập hay chưa. */
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $username;
                    echo "<script>window.location.href = 'home.php';</script>";
                } else {
                    echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
                    $_SESSION["login_error"] = "Tài khoản hoặc mật khẩu không chính xác!";
                }
            }
            ?>
            <?php if (isset($_SESSION["login_error"])) : ?>
                <div class="error-message">
                    <?php
                    echo $_SESSION["login_error"];
                    //Dòng này loại bỏ biến phiên "login_error" sau khi đã hiển thị thông báo lỗi. 
                    unset($_SESSION["login_error"]);
                    ?>
                </div>
                
            <?php
            /*<?php endif; ?>: Dòng này đóng điều kiện bắt đầu từ <?php if (isset($_SESSION["login_error"])) : ?>. 
            Điều này kết thúc phần mã mà chỉ được thực hiện nếu biến phiên "login_error" tồn tại.*/
                endif; 
            ?>


            <form class="modal-body" method="post" action="home.php">
                <label for="tk-dn" class="modal-label">
                    Tài khoản
                </label>
                <input type="text" class="modal-input" id="tk-dn" name="username" required placeholder="Nhập tài khoản">


                <label for="mk" class="modal-label">
                    Nhập mật khẩu
                </label>
                <input type="password" class="modal-input" id="mk" name="password" required placeholder="Nhập mật khẩu">

                <div class="hotro">
                    <input type="checkbox" id="ghinho" class="modal-check" onclick="show(this)">
                    <label for="ghinho" class="remember"> Hiện mật khẩu</label>
                    <p class="text-help"><a href="#" class="modal-help">Quên mật khẩu</a></p>
                </div>

                <div class="dn-btn">
                    <button type="submit" name="submitLogin" class="btn-dn">Đăng nhập</button>
                </div>

            </form>

            <!-- Ẩn hiện MK -->
            <script>
                function show(check) {
                    const mkInput = document.getElementById('mk');
                    const doi = document.getElementsByClassName('remember');

                    if (check.checked) {
                        mkInput.type = 'text';
                        doi[0].innerHTML = "Ẩn mật khẩu";
                    } else {
                        mkInput.type = 'password';
                        doi[0].innerHTML = "Hiện mật khẩu";
                    }
                }
            </script>


        </div>
    </div>

    <div class="modal-dk js-modal-dk">
        <div class="modal-container js-modal-Container">
            <div class="modal-close js-modal-Close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header">
                <h3 class="header-dn">Đăng Ký</h3>
            </header>

            <form class="modal-body" method="post" action="register_submit.php">
                <label for="ten" class="modal-label">
                    Họ và tên
                </label>
                <input type="text" class="modal-input" id="ten" name="fullName" required placeholder="Nhập họ và tên">


                <label for="tk-dk" class="modal-label">
                    Tài khoản
                </label>
                <input type="text" class="modal-input" id="tk-dk" name="userName" required placeholder="Nhập tài khoản">


                <label for="mk-dk" class="modal-label">
                    Nhập mật khẩu
                </label>
                <input type="password" class="modal-input" id="mk-dk" name="password" required placeholder="Nhập mật khẩu">


                <label for="mk-dk-ag" class="modal-label">
                    Xác nhận mật khẩu
                </label>
                <input type="password" class="modal-input" id="mk-dk-ag" name="rePassword" required placeholder="Nhập lại mật khẩu">


                <div class="dn-btn">
                    <button type="submit" name="submit" class="btn-dn">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        //Đăng nhập
        const modaldn = document.querySelector('.js-modal');

        const log = document.querySelector('.js-dn');

        const modalclose = document.querySelector('.js-modal-close');

        const container = document.querySelector('.js-modal-container');

        function showModalLogin() {
            modaldn.classList.add('open');
        }

        function hideModalLogin() {
            modaldn.classList.remove('open');
        }


        log.addEventListener('click', showModalLogin);

        modalclose.addEventListener('click', hideModalLogin);

        modaldn.addEventListener('click', hideModalLogin);

        container.addEventListener('click', function(even) {
            even.stopPropagation();
        });



        //Đăng ký
        const modaldk = document.querySelector('.js-modal-dk');

        const dk = document.querySelector('.js-dk');

        const modalClose = document.querySelector('.js-modal-Close');

        const modalContainer = document.querySelector('.js-modal-Container');

        function showModalSignUp() {
            modaldk.classList.add('opendk');
        }

        function hideModalSignUp() {
            modaldk.classList.remove('opendk');
        }


        dk.addEventListener('click', showModalSignUp);

        modalClose.addEventListener('click', hideModalSignUp);

        modaldk.addEventListener('click', hideModalSignUp);

        modalContainer.addEventListener('click', function(even) {
            even.stopPropagation()
        });
    </script>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            // direction: 'vertical',

            loop: true,
            autoplay: {
                delay: 2500,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>

    <script>
        //window.location.search: Thuộc tính này trả về chuỗi tìm kiếm (query string) của URL hiện tại, bắt đầu từ dấu chấm hỏi "?" và bao gồm các tham số truy vấn và giá trị của chúng.
        //Ví dụ, nếu URL là "home.php?error=Matkhaukhongkhop", thì window.location.search sẽ là "?error=Matkhaukhongkhop".
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const tb = urlParams.get('tb');
        
        if (error === 'Matkhaukhongkhop') {
            // Hiển thị thông báo sử dụng thẻ "alert"
            alert("Mật khẩu không khớp!");
        }
        else if (error === 'Tkdatontai'){
            alert("Tài khoản đã tồn tại!");
        }

        // else if (error === 'TkOrMkSai'){
        //     alert("Tài khoản hoặc mật khẩu không chính xác");
        // }
        else if (tb === 'DkThanhCong') {
            alert("Đăng ký tài khoản thành công!");
        }
    </script>

</body>

</html>