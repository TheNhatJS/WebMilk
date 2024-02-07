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

        $sql = "SELECT * FROM user WHERE id = $id";
        $old = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($old);

        if(isset($_GET['btnUpdate']))
        {
            $fullName = $_GET['fullName'];
            $username = $_GET['userName'];
            $password = md5($_GET['passWord']);

            $sql_ud = "UPDATE user
                    SET fullName = '$fullName',
                        username = '$username',
                        password = '$password'
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
        <form action="update_user.php">
            <h3>User - Update</h3>

            <table>
                <input type="hidden" name="key" value="<?php echo $id; ?>">         
                <tr>
                    <th><label for="fullName">Họ và tên</label></th>
                    <td><input type="text" id="fullName" name="fullName" required value="<?php echo $row['fullName']; ?>"></td>
                </tr>
    
                <tr>
                    <th><label for="userName">Username</label></th>
                    <td><input type="text" id="userName" name="userName" required value="<?php echo $row['username']; ?>"></td>
                </tr>
                
                <tr>
                    <th><label for="passWord">Password</label></th>
                    <td><input type="text" id="passWord" name="passWord" required value="<?php echo $row['password']; ?>"></td>
                </tr>

            </table>
            
            <button type="submit" name="btnUpdate">Update</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>
