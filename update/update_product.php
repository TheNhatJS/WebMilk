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
        $id = $_GET['key'];
        require_once("../config.php");

        $sql_p = "SELECT * FROM product WHERE id = $id";
        $old1 = mysqli_query($conn, $sql_p);
        $row_p = mysqli_fetch_assoc($old1);

        if(isset($_GET['btnUpdate']))
        {
            $image = $_GET['imageLink'];
            $price = $_GET['unitPrice'];
            $type = $_GET['milkType'];
            $brand = $_GET['milkBrand'];

            $sql_ud = "UPDATE product
                    SET type = '$type',
                        brand = '$brand',
                        price = $price,
                        image = '$image'
                    WHERE id = $id";

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
        <form action="update_product.php">
            <h3>Update</h3>

            <table>
                <input type="hidden" name="key" value="<?php echo $id; ?>">         
                <tr>
                    <th><label for="imageLink">Link Ảnh</label></th>
                    <!-- <td><input type="text" id="imageLink" name="imageLink" required></td> -->
                    <td><textarea name="imageLink" id="imageLink" cols="20" rows="5"><?php echo $row_p['image']; ?></textarea></td>
                </tr>

                <tr>
                    <th><label for="milkBrand">Hãng</label></th>

                    <?php
                        include '../config.php';

                        $sql = "SELECT title FROM brand";
                        $old2 = mysqli_query($conn, $sql);
                    ?>
            
                        <td><select name="milkBrand" id="milkBrand">
                        <?php 
                            while($row_b = mysqli_fetch_assoc($old2)) 
                            {
                        ?>     
                            <option value="<?php echo $row_b['title']; ?>"

                                <?php 
                                    if($row_p['brand'] == $row_b['title'])
                                        echo "selected";
                                ?>
                                
                            ><?php echo $row_b['title']; ?></option>
                            
                            
                        <?php 
                            }
                        ?>
                        </select></td>

                </tr>
    
                <tr>
                    <th><label for="milkType">Loại sữa - Trọng lượng</label></th>
                    <td><input type="text" id="milkType" name="milkType" required value="<?php echo $row_p['type']; ?>"></td>
                </tr>
                
                <tr>
                    <th><label for="unitPrice">Đơn giá</label></th>
                    <td><input type="text" id="unitPrice" name="unitPrice" required value="<?php echo $row_p['price']; ?>"></td>
                </tr>

            </table>
            
            <button type="submit" name="btnUpdate">Update</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>
