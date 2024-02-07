<?php
    include 'config.php';
    if(isset($_POST['submit']) && $_POST['fullName'] != '' &&$_POST['userName'] != '' && $_POST['password'] != '' && $_POST['rePassword'] != ''){
        $username = $_POST['userName'];
        $fullName = $_POST['fullName'];
        $password = md5($_POST['password']);//Mã hóa bằng md5()
        $rePassword = $_POST['rePassword'];

        if ($password != md5($rePassword)) {
            // Mật khẩu không khớp, chuyển hướng về trang chủ và truyền thông báo
            /* Dòng mã này sử dụng hàm header() trong PHP để thực hiện chuyển hướng trang web. 
            Nó đặt tiêu đề HTTP "Location" để chỉ định URL đích mà trình duyệt sẽ được chuyển hướng đến. 
            Trong trường hợp này, URL đích là "home.php?error=Matkhaukhongkhop". 
            Điều này có nghĩa là khi thực hiện chuyển hướng, trình duyệt sẽ tải trang "home.php" và truyền tham số truy vấn "error" với giá trị "Matkhaukhongkhop". */
            header("Location: home.php?error=Matkhaukhongkhop");
            exit;
        }

        $sql_check = "SELECT * FROM user WHERE username = '$username' ";
        $old = mysqli_query($conn, $sql_check);
        //Dòng này sử dụng hàm mysqli_num_rows để đếm số lượng bản ghi (hàng) trả về từ kết quả truy vấn. 
        $numRow = mysqli_num_rows($old);
        if($numRow >= 1){
            header("Location: home.php?error=Tkdatontai");
            exit;
        }

        $sql_insert = "INSERT INTO user (fullName, username, password, role) VALUES ('$fullName', '$username', '$password', 'USER')";
        $old2 = mysqli_query($conn, $sql_insert);
        if ($old2 === TRUE){
            // echo "New record created successfully";
            // // Chuyển hướng về trang chủ "home.php" sau 2 giây
            // header("Refresh:2; url=home.php");
            // exit;

            header("Location: home.php?tb=DkThanhCong");
            exit;
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();

    }
?>