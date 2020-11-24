<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
  /*  判斷 passed 變數如果不等於 TRUE代表未登入網站 回首頁 index.html	*/
  if ($passed != "TRUE"){header("location:index.html");exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>會員管理</title>
    <meta charset="utf-8">
  </head>
  <body>
    <p align="center"><img src="./image/management.png"></p>
    <p align="center">
      <a href="modify.php">修改會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="delete.php">刪除會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="logout.php">登出網站</a>
    </p>
  </body>
</html>