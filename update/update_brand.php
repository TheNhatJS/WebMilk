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

    <title>Milk - ADMIN - Update</title>

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

        input, textarea {
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
        $id = $_GET['key'];
        require_once("../config.php");

        $sql = "SELECT * FROM brand WHERE code = '$id' ";
        $old = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($old);

        if(isset($_GET['btnUpdate']))
        {
            $code = $_GET['code'];
            $nameBrand = $_GET['nameBrand'];
            $adress = $_GET['adress'];
            $phoneNumber = $_GET['phoneNumber'];
            $email = $_GET['email'];

            $sql_ud = "UPDATE brand
                    SET code = '$code',
                        title = '$nameBrand',
                        adress = '$adress',
                        phone = '$phoneNumber',
                        email = '$email'
                    WHERE code = '$id' ";

            $result = mysqli_query($conn, $sql_ud);
            if($result)
            {
                mysqli_close($conn);
                header("Location: ../admin.php");
                exit;
            }
            else
            {
                echo "Update thất bại " . mysqli_error($conn);
            }
        }
    ?>
    <div class="main">
    <form action="update_brand.php">
        
        <h3>Update - Brand</h3>

        <table>
            <input type="hidden" name="key" value="<?php echo $id; ?>">
            <tr>
                <th><label for="code">Mã</label></th>
                <td><input type="text" id="code" name="code" required value="<?php echo $row['code'] ?>"></td>
            </tr>

            <tr>
                <th><label for="nameBrand">Tên hãng</label></th>
                <td><input type="text" id="nameBrand" name="nameBrand" required value="<?php echo $row['title'] ?>"></td>  
            </tr>

            <tr>
                <th><label for="adress">Địa chỉ</label></th>
                <td><input type="text" id="adress" name="adress" required autocomplete="off" value="<?php echo $row['adress'] ?>"></td>
            </tr>
            
            <tr>
                <th><label for="phoneNumber">Số điện thoại</label></th>
                <td><input type="text" id="phoneNumber" name="phoneNumber" required autocomplete="off" value="<?php echo $row['phone'] ?>"></td>                    
            </tr>

            <tr>
                <th><label for="email">Email</label></th>
                <td><input type="text" id="email" name="email" required autocomplete="off" value="<?php echo $row['email'] ?>"></td>                    
            </tr>
        </table>
        
        <button type="submit" name="btnUpdate">Update</button>
        <button type="reset">Reset</button>
    </form>
    </div>
</body>
</html>
