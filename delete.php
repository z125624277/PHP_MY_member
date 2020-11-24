<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
  /*  判斷 passed 變數如果不等於 TRUE代表未登入網站 回首頁 index.html	*/
  if ($passed != "TRUE"){header("location:index.html");exit();
  }
  else
  {
    require_once("db_connect.php");
    $id = $_COOKIE["id"];
    //建立資料連接
    $link = db_connection("member");
    //刪除帳號
    $sql = "DELETE FROM users Where id = $id";
    $result = mysqli_query($link, $sql);
    //關閉資料連接
    mysqli_close($link);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>刪除會員資料成功</title>
  </head>
  <body >
    <p align="center"><img src="./image/eraser.png"></p>
    <p align="center">
      您的資料已刪除。
    </p>
    <p align="center"><a href="index.html">回首頁</a></p>
  </body>
</html>