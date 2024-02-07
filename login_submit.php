<?php
    include 'config.php';
    if(isset($_POST['submitLogin']) && $_POST['username'] != '' && $_POST['password'] != ''){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql_login = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $old = mysqli_query($conn, $sql_login);
        $numRow = mysqli_num_rows($old);

        // echo $username;
        // return ;

        if($numRow >= 1) {
/* Dòng này tạo một biến phiên (session) có tên "loggedin" và gán giá trị true cho nó. 
Biến phiên là một cách để lưu trữ thông tin trạng thái người dùng trên nhiều trang trong ứng dụng web. 
Trong trường hợp này, biến "loggedin" được sử dụng để xác định xem người dùng đã đăng nhập hay chưa. */
                    
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            // echo "DN thành công";
            echo "<script>window.location.href = 'home.php';</script>";
        }
        else {
            //$_SESSION["login_error"] = "Tài khoản hoặc mật khẩu không chính xác!";
            header("Location: home.php?error=TkOrMkSai");
            exit;
        }
    }
?>

<?php if (isset($_SESSION["login_error"])) : ?>
    <?php
        echo $_SESSION["login_error"];

        unset($_SESSION["login_error"]);
    ?>
<?php endif; ?>