<?php
    // 資料庫主機 相關資訊 port 3306
    $db_host = "mysql01.cffvjkjkddfc.us-east-1.rds.amazonaws.com"; // ip address 或 localhost
    $db_username= "admin";
    $db_password = "12345678";
    $db_name = "hotel"; 

    // sudo nano dbinfo.inc.php
    // 連接 資料庫伺服器 + 資料庫
	// $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
	// $db_link = mysqli_connect($db_host, $db_username, $db_password, $db_name);
	$connect = mysqli_connect($db_host, $db_username, $db_password);
	$db_link = mysqli_select_db($connect, $db_name);
	
    if ($connect->connect_error){  // connect_errno 傳回 error code, connect_error 傳回 error string
        $msg = "連接 Amazon RDS mysql01 資料庫伺服器 失敗 <br>";	
    }  else if (!$db_link){
        $msg = "使用 Amazon RDS mysql01 資料庫伺服器 hotel 資料庫 失敗 <br>";	
        } else {
    $db_name = "hotel"; 
            $msg = "使用 Amazon RDS mysql01 資料庫伺服器 $db_name 資料庫 成功 <br>"; 
        }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br>
    <div align="center">
		<?php
			echo "<h2><strong style='color:#009900'> $msg </strong></h2>";
		?>
	</div>  
</body>
</html>

