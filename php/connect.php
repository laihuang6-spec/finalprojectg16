<?php
    // 資料庫主機 相關資訊 port 3306
    $db_host = "mysql01.cffvjkjkddfc.us-east-1.rds.amazonaws.com"; // ip address 或 host name
    $db_username= "admin";
    $db_password = "12345678";
    $db_name = "hotel"; 

    // 連接 資料庫伺服器 + 資料庫
	// $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
	// $db_link = mysqli_connect($db_host, $db_username, $db_password, $db_name);
	$connect = mysqli_connect($db_host, $db_username, $db_password);
	$db_link = mysqli_select_db($connect, $db_name);
	
    if ($connect->connect_errno){  // connect_errno 傳回 error code, connect_error 傳回 error string
        // die("連接 Amazon RDS mysql01 資料庫伺服器 失敗 <br>");
        print_r(mysqli_connect_error()); 
        exit();	
    }   

    if (!$db_link){
        die("使用 Amazon RDS mysql01 資料庫伺服器 的 $db_name 資料庫 失敗 <br>");	
    }  
?>
