<?php
  require_once("db_connect.php");
  //取得表單資料
  $account = $_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["name"]; 
  $sex = $_POST["sex"];
  $year = $_POST["year"]; 
  $month = $_POST["month"]; 
  $day = $_POST["day"];
  $telephone = $_POST["telephone"]; 
  $cellphone = $_POST["cellphone"]; 	
  $address = $_POST["address"];
  $email = $_POST["email"]; 
  $url = $_POST["url"]; 	
  $comment = $_POST["comment"];
  //資料庫連接
  $link = db_connection("member");
  //檢查帳號是否有人申請
  $sql = "SELECT * FROM users Where account = '$account'";
  $result = mysqli_query($link,$sql);
  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    mysqli_free_result($result);
    //顯示訊息要求使用者更換帳號名稱
    echo "<script>alert('帳號重複 請重新輸入')</script>";
    echo '<script>window.location.href="join.html";</script>';
  }
  else
  {
    mysqli_free_result($result);
    //新增帳號
    $sql = "INSERT INTO users (account, password, name, sex, 
            year, month, day, telephone, cellphone, address,
            email, url, comment) VALUES ('$account', '$password', 
            '$name', '$sex', $year, $month, $day, '$telephone', 
            '$cellphone', '$address', '$email', '$url', '$comment')";
    $result = mysqli_query($link, $sql);
  }	
  mysqli_close($link);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新增帳號</title>
  </head>
  <body>
    <p align="center"><img src="./image/regist.png">       
    <p align="center">已註冊成功:<?php echo $account ?><br>      
      <a href="index.html">返回登入</a>。
    </p>
  </body>
</html>