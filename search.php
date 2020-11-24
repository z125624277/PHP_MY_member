<?php
  require_once("db_connect.php");
  header("Content-type: text/html; charset=utf-8");
  $account = $_POST["account"]; 
  $email = $_POST["email"];

  $link = db_connection("member");
			
  //檢查查詢的帳號是否存在
  $sql = "SELECT name, password FROM users WHERE 
          account = '$account' AND email = '$email'";
  $result = mysqli_query($link, $sql);

  //如果不存在
  if (mysqli_num_rows($result) == 0)
  {
    echo "<script >alert('查詢的資料不存在');</script>";
    echo '<script>window.location.href="search_pwd.html";</script>';
  }
  else  
  {
    $row = mysqli_fetch_object($result);
    $name = $row->name;
    $password = $row->password;
    $message= "名字:".$name.", 帳號=".$account.", 密碼=".$password;
    echo "<script >alert('$message');</script>";
    echo '<script>window.location.href="search_pwd.html";</script>';

  }
  mysqli_free_result($result);
  mysqli_close($link);
?>