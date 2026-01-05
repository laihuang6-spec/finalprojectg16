
<?php
	session_start(); // initial the session 
	include('connect.php');

	$useraccount = $_POST['user_email'];
	$userpasswd = $_POST['user_passwd']; 

    $sql_cmd1 = "select * from members where account='$useraccount' and passwd='$userpasswd'";  // SQL 語法
	
	$result=mysqli_query($connect, $sql_cmd1); // 執行上面的 SQL 語法, 並傳回 執行結果

	$row=mysqli_fetch_array($result); // 如果 $result 不是空的, 就將拿到的結果, 放到 $row ($row是一個 array)
	                                  // mysqli_fetch_row( ):  以 "整數" 為索引
									  // mysqli_fetch_assoc( ):以"欄位名稱" 為索引
									  // mysqli_fetch_array( ):"整數" 與 "欄位名稱" 為索引均可

	if($row['account']==$useraccount && $row['passwd']==$userpasswd){	
		$_SESSION["name"] = $row['name'];
		// var_dump($_SESSION); 
		header("Location: index.php"); 
	} else{
		echo "<center><br><h2><font color='red'>帳號密碼錯誤! </font></h2></center>";
		exit();
	}
?>

