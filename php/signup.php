<?php
     
    // initial the session 	
    session_start();

    // print_r($_POST); r 表示 array
    if (empty($_POST["user_name"])){
        die ("User name is required.");
    }
    if (strlen($_POST["user_passwd"]) < 8){
        die ("<center style='margin-top:30px'><h2>Password must be at least 8 characters.</h2></center>");
    }
    if ( ! preg_match("/[a-z]/i", $_POST["user_passwd"])){
        die ("<center style='margin-top:30px'><h2>Password must conatin at least one letter.</h2></center>");
    }
    if ( ! preg_match("/[0-9]/", $_POST["user_passwd"])){
        die ("<center style='margin-top:30px'><h2>Password must conatin at least one number.</h2></center>");
    }
    if ($_POST["user_passwd"] !== $_POST["confirm_password"]){
        die ("<center style='margin-top:30px'><h2>Passwords must match.</h2></center>");
    }

    $useraccount = $_POST["user_email"];
    $userpasswd = $_POST["user_passwd"]; // $userpasswd = password_hash($_POST["user_passwd"], PASSWORD_DEFAULT);
                                         // char要設 256, login 時 要用 password_verify($userpasswd, $hash) 來判斷
    $username = $_POST["user_name"];
    $userphone = $_POST["user_phone"];

    // require_once, include_once 在引入的過程中若有重複引入的狀況，會選擇不要重複引入 
    // require 若有錯誤，會立刻終止程式, include 若有錯誤，還可繼續 執行程式 
    include('connect.php');
    	
    $sql_cmd1 = "select * from members where account='$useraccount'"; // SQL 語法
    $result1=mysqli_query($connect, $sql_cmd1); // 執行上面的 SQL 語法, 並傳回 查詢結果
    $num = mysqli_num_rows($result1); //  if $num 大於0, 代表有資料;  $num = 1, 代表1筆資料

    if ($num > 0){
        $msg1="此帳號已存在";
        $msg2="請 重新註冊!";
    } else{        
        $sql_cmd2 = "insert into members (account, passwd, name, phone) values ('$useraccount', '$userpasswd', '$username', '$userphone')";  // SQL 語法
        $result2=mysqli_query($connect, $sql_cmd2); // 執行上面的 SQL 語法, 並傳回 執行結果

        if($result2){
            $msg1="會員註冊成功<br>歡迎 $username 成為<br><font size='5' color='#e600e6'>大直水舞 雲間民宿的會員</font><br>";
            $msg2="新會員 享有 100點 紅利點數!";
        } else {
            $msg1="會員註冊失敗";
            $msg2="請檢查一下註冊填寫的資料!";
        }
    }

    mysqli_free_result($result1);	
    mysqli_free_result($result2);	
    mysqli_close($connect);	
?>

<?php include('area_header.php'); ?>

    <br>
    <div class="container-fluid my-3">		
		<div class="row justify-content-center" >
            <div align="center">
                <?php
                    echo "<h3><strong style='color:#009900'> $msg1 </strong></h3>";
                    print "<a href='../index.html'><button class='btn01'><font size='5'>點選回首頁</font></button></a>";
                ?>
            </div>  
		</div>
	</div><br>
    <div class="alert alert-success text-center">
		<?php print "<strong>$msg2</strong>"; ?> 
	</div>	

<?php include('area_footer.php'); ?>    

