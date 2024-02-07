<?php

use PSpell\Config;

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk - ADMIN</title>

    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOJdbE2YXgXN_hitWtAYn3GSQQQoEq8e1rrQ&usqp=CAU" type="image/x-icon" />

    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php 
        if(!isset($_SESSION["username"]))
        {
            header("location: home.php");
        }
        else{
                    // echo "<script>alert('Wellcome ADMIN');</script>";
        }
    ?>
    <div class="main">
        <div class="menu">
            <ul class="nav-admin">
                <li><a href="./home.php">Trang chủ</a></li>
                <li><a href="#hang">Hãng</a></li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul class="sub-nav-admin">

                        <?php
                            include 'config.php';

                            $sql = "SELECT title FROM brand";
                            $old = mysqli_query($conn, $sql);
                        ?>
                
                        <?php 
                            while($row_b = mysqli_fetch_assoc($old)) 
                            {
                        ?>

                            <li><a href="#<?php echo $row_b['title']; ?>"><?php echo $row_b['title']; ?></a></li>

                        <?php 
                            }
                        ?>

                    </ul>
                </li>
                <li><a href="#nguoi-dung">Người dùng</a></li>
                <li><a href="#ad-don-hang">Đơn hàng</a></li>
                <li><a href="./logout_submit.php">Đăng xuất</a></li>
            </ul>
        </div>
        
        <div class="content-admin">

            <!-- Brand -->
            
            <?php 
                include 'config.php';

                $sql = "SELECT * FROM brand";
                
                $old = mysqli_query($conn, $sql);
            ?>
            <div class="tb-milk">
                <h2 id="hang" style="margin-bottom: 10px;">Hãng</h2>

                <table border="1" width="800">
                    <tr>
                        <th>Mã</th>
                        <th>Tên hãng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>

                        <th colspan="2"><a href="./add/add_brand.php">Thêm</a></th>
                    </tr>
                    
                    <?php
                        while($row = mysqli_fetch_assoc($old))
                        {
                    ?>

                    <tr>
                        <td>
                            <?php echo $row["code"]; ?>
                        </td>

                        <td>
                            <?php echo $row["title"]; ?>
                        </td>

                        <td>
                            <?php echo $row["adress"]; ?>
                        </td>

                        <td>
                            <?php echo $row["phone"]; ?>
                        </td>

                        <td>
                            <?php echo $row["email"]; ?>
                        </td>

                        <td class="btn-capnhat"><a href="./update/update_brand.php?key=<?php echo $row["code"];?>">Sửa</a></td>
                        <td><a href="./delete/delete_brand.php?key=<?php echo $row["code"];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></td>
                    </tr>
                    <?php
                        }
                    ?>

                </table>
            </div>
            <hr style="width: 500px; margin: 0 auto;">

            <!-- Sản phẩm -->

            <?php
                include 'config.php';

                $sql = "SELECT title FROM brand";
                $old = mysqli_query($conn, $sql);
            ?>
    
            <?php 
                while($row_b = mysqli_fetch_assoc($old)) 
                {
            ?>

            <!-- Begin: Vinamilk - ADMIN -->
            <div class="tb-milk">
                <h2 id="<?php echo $row_b['title']; ?>" style="margin-bottom: 10px;"><?php echo $row_b['title']; ?></h2>

                <?php 
                    include 'config.php';

                    $sql_s = "SELECT * FROM product WHERE brand = '{$row_b['title']}'  ";
                    
                    $result = mysqli_query($conn, $sql_s);
                ?>
                <table border="1" width="800" method="post">
                    <tr>
                        <th>Ảnh</th>
                        <th>Loại sữa - Trọng lượng</th>
                        <th>Đơn giá</th>
                        <th colspan="2"><a href="./add/add_product.php">Thêm</a></th>
                    </tr>
                    <?php
                        while($row_p = mysqli_fetch_assoc($result))
                        {
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $row_p['image']; ?>" alt="" style="width: 50px; height: 50px;">
                        </td>

                        <td>
                            <?php echo $row_p['type']; ?>
                        </td>

                        <td>
                            <?php echo $row_p['price']; ?> VNĐ
                        </td>
                        <td class="btn-capnhat"><a href="./update/update_product.php?key=<?php echo $row_p['id'];?>">Sửa</a></td>
                        <td><a href="./delete/delete_product.php?key=<?php echo $row_p['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></td>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>
            <!-- End: Vinamilk - ADMIN -->
            <?php 
                }
            ?>

            <hr style="width: 500px; margin: 0 auto;">

            <!-- Begin: Người dùng -->
            <?php 
                include 'config.php';

                $sql = "SELECT * FROM user WHERE role = 'USER' ";
                
                $old = mysqli_query($conn, $sql);
            ?>
            <div class="tb-milk">
                <h2 id="nguoi-dung" style="margin-bottom: 10px;">Người dùng</h2>

                <table border="1" width="800">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th colspan="2"></th>
                    </tr>
                    
                    <?php
                        while($row = mysqli_fetch_assoc($old))
                        {
                    ?>

                    <tr>
                        <td>
                            <?php echo $row["fullName"]; ?>
                        </td>

                        <td>
                            <?php echo $row["username"]; ?>
                        </td>

                        <td>
                            <?php echo $row["password"]; ?>
                        </td>
                        <td class="btn-capnhat"><a href="./update/update_user.php?key=<?php echo $row['id'];?>">Sửa</a></td>
                        <td><a href="./delete/delete_user.php?key=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></td>
                    </tr>
                    <?php
                        }
                    ?>

                </table>
            </div>
            <hr style="width: 500px; margin: 0 auto;">
            <!-- End: Người dùng -->


            <!-- Begin: Đơn hàng -->
            <div class="tb-milk">
                <h2 id="ad-don-hang" style="margin-bottom: 10px;">Đơn hàng</h2>

                <table border="1" width="800">
                    <tr>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ảnh</th>
                        <th>Loại sữa</th>
                        <th>Trọng lượng</th>
                        <th>Đơn giá</th>
                        <th colspan="2"></th>
                    </tr>
                    
                    <tr>
                        <td>A</td>
                        <td>Đà Nẵng</td>
                        <td>010101029</td>
                        <td>Ảnh 1</td>
                        <td>Sữa tươi</td>
                        <td>1L</td>
                        <td class="btn-capnhat"><a href="#">Sửa</a></td>
                        <td><a href="#">Xóa</a></td>
                    </tr>
                </table>
            </div>
            <!-- End: Đơn hàng -->
        </div>
    </div>
</body>
</html>