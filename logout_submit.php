<?php
/* Dòng này bắt đầu hoặc tiếp tục phiên của người dùng. 
Phiên là cách để lưu trữ thông tin trạng thái của người dùng trong suốt thời gian họ tương tác với ứng dụng web. 
Bằng cách gọi session_start(), bạn khởi đầu phiên và có thể truy cập hoặc sửa đổi các biến phiên. */
    session_start();

    $_SESSION = array();

    session_destroy(); //Hủy tất cả biến phiên

    header("Location: home.php");
    exit;
?>