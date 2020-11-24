<?php
  require_once("db_connect.php");
  header("Content-type: text/html; charset=utf-8");
	
  //取得表單資料(POST)
  $account = $_POST["account"]; 	
  $password = $_POST["password"];
  //建立資料庫連接
  $link = db_connection("member");
  //根據傳入的帳密 檢查資料庫是否相同
  $sql="SELECT *FROM users WHERE account='$account' AND password='$password'";
  $result= mysqli_query($link,$sql);

  //如果帳號密碼錯誤
  if (mysqli_num_rows($result) == 0)
  {
    mysqli_free_result($result);	
    mysqli_close($link);
    echo "<script>alert('帳號密碼錯誤! 重新登入')</script>";
    echo '<script>window.location.href="index.html";</script>';
  }
	
  //如果帳號密碼正確
  else
  {
    //取得 id 欄位
    $id = mysqli_fetch_object($result)->id;
    mysqli_free_result($result);
    mysqli_close($link);

    //將id 加入 cookies
    setcookie("id", $id);
    setcookie("passed", "TRUE");		
    header("location:main.php");		
  }
?>