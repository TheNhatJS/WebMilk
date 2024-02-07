<?php
    session_start();

    if(!isset($_SESSION["username"]))
    {
        header("location: ../home.php");
    }
?>

<?php
    include '../config.php';

	$id = $_GET["key"];
	$sql = "DELETE from user WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		mysqli_close($conn);
		header("Location: ../admin.php");
		exit;
	}
	else
		echo "Xóa thất bại " . mysqli_error($conn);
?>