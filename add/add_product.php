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
        

        $sql = "SELECT title FROM brand";
        $old = mysqli_query($conn, $sql);

        if(isset($_POST['btnThem']))
        {
            $image = $_POST['imageLink'];
            $price = $_POST['unitPrice'];
            $type = $_POST['milkType'];
            $brand = $_POST['milkBrand'];

            $sql_i = "INSERT INTO product(type, brand, price, image) VALUES ('$type', '$brand', $price, '$image')";
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

        

        <form action="add_product.php" method="post">
        
            <h3>Thêm sữa</h3>

            <table>
                <tr>
                    <th><label for="imageLink">Link Ảnh</label></th>
                    <!-- <td><input type="text" id="imageLink" name="imageLink" required></td> -->
                    <td><textarea name="imageLink" id="imageLink" cols="20" rows="5"></textarea></td>
                </tr>

                <tr>
                    <th><label for="milkBrand">Hãng</label></th>

                    <td><select name="milkBrand" id="milkBrand">
                    <?php 
                        while($row = mysqli_fetch_assoc($old)) 
                        {
                    ?>

                        <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                        
                    <?php 
                        }
                    ?>
                    </select></td>
                </tr>
    
                <tr>
                    <th><label for="milkType">Loại sữa - Trọng lượng</label></th>
                    <td><input type="text" id="milkType" name="milkType" required autocomplete="off"></td>
                </tr>
                
                <tr>
                    <th><label for="unitPrice">Đơn giá</label></th>
                    <td><input type="text" id="unitPrice" name="unitPrice" required autocomplete="off"></td>                    
                </tr>
            </table>
            
            <button type="submit" name="btnThem">Thêm</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>
