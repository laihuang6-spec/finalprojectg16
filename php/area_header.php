<?php 
	session_start();
	$username = $_SESSION["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- using Bootstrap css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- using my slide.CSS -->
	 <link rel="stylesheet" href="../css/mycss.css">
     <!-- using Bootstrap js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>大直水舞 雲間民宿</title>
</head>
<body>
	<header align="center">
		<h3 style="line-height: 45px">大直水舞 雲間民宿</h3>
		<?php
			echo "<font size='3' color='red' style='position: absolute; right:5px'>會員: $username </font>";
		?>
	</header>  
	<nav class="scrollmenu sticky-top">
		<a href="index.php">首頁</a>
		<a href="#">環境交通</a>
		<a href="buy.php">我要訂房</a>
		<a href="#">最新消息</a>
		<a href="logout.php">登出</a>
	</nav>
