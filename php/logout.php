<?php       
    // Session的機制 是將 user 活動 記錄在server端
    session_start();
    // unset($_SESSION[$username]); // 只刪除 $username 這個單一 session
    session_unset(); // 並不登出session變數,但把目前所有已創建的session 內存變數的值清空
    session_destroy(); // 登出所有的session變數,並且結束session會話, 但內存的 session 變數保留
    mysqli_close($connect);  // 關閉 與 Amazon RDS mysql01 資料庫伺服器 之間的連線
    header("Location: ../index.html"); 
?>
