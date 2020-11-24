<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
  /*  判斷 passed 變數如果不等於 TRUE代表未登入網站 回首頁 index.html	*/
  if ($passed != "TRUE")
  {
    header("location:index.html");
    exit();
  }
  else
  {
    require_once("db_connect.php");
    //取得 表單資料
    $id = $_COOKIE["id"];
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
		
    //建立資料連接
    $link = db_connection("member");
    $sql="UPDATE users SET password='$password',name='$name',sex='$sex',year=$year,month=$month,
        day=$day,telephone='$telephone',cellphone='$cellphone',address='$address',
        email='$email',url='$url',comment='$comment' WHERE id=$id";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
  }		
?>
<!DOCTYPE html>
<html>
  <head>
    <title>修改會員資料成功</title>
    <meta charset="utf-8">
  </head>
  <body>
    <center>
      <img src="./image/success.png"><br><br>
      <?php echo $name ?>，已修改成功。
      <p><a href="main.php">返回會員網頁</a></p>
    </center>        
  </body>
</html>