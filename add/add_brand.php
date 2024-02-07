<?php
    session_start();

    if(!isset($_SESSION["username"]))
    {
        header("location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOJdbE2YXgXN_hitWtAYn3GSQQQoEq8e1rrQ&usqp=CAU" type="image/x-icon" />

    <title>Milk - ADMIN - Thêm Sữa</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 600px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        h3{
            margin-bottom: 16px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="reset"] {
            background-color: #f44336;
        }

        button:hover {
            opacity: 0.6;
        }
    </style>
</head>
<body>
    
    <?php 
        include ('../config.php');

        if(isset($_POST['btnThem']))
        {
            $code = $_POST['code'];
            $nameBrand = $_POST['nameBrand'];
            $adress = $_POST['adress'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];

            $sql_i = "INSERT INTO brand(code, title, adress, phone, email) VALUES ('$code', '$nameBrand', '$adress', '$phoneNumber', '$email')";
            $result = mysqli_query($conn, $sql_i);

            if($result) {
                //Đóng kết nối CSDL
                mysqli_close($conn);
    
                //Quay về trang danh sách
                header("Location: ../admin.php");
                exit;  // Thêm exit để dừng mã ngay sau khi chuyển hướng
            }
            else {
                echo "Thêm mới thất bại: " . mysqli_error($conn);
            }
        }
    ?>
    <div class="main">

        <form action="add_brand.php" method="post">
        
            <h3>Thêm hãng mới</h3>

            <table>
                <tr>
                    <th><label for="code">Mã</label></th>
                    <td><input type="text" id="code" name="code" required></td>
                </tr>

                <tr>
                    <th><label for="nameBrand">Tên hãng</label></th>
                    <td><input type="text" id="nameBrand" name="nameBrand" required></td>  
                </tr>
    
                <tr>
                    <th><label for="adress">Địa chỉ</label></th>
                    <td><input type="text" id="adress" name="adress" required autocomplete="off"></td>
                </tr>
                
                <tr>
                    <th><label for="phoneNumber">Số điện thoại</label></th>
                    <td><input type="text" id="phoneNumber" name="phoneNumber" required autocomplete="off"></td>                    
                </tr>

                <tr>
                    <th><label for="email">Email</label></th>
                    <td><input type="text" id="email" name="email" required autocomplete="off"></td>                    
                </tr>
            </table>
            
            <button type="submit" name="btnThem">Thêm</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>
