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
				
    //執行 SELECT 陳述式取得使用者資料
    $sql = "SELECT * FROM users Where id = $id";
    $result = mysqli_query($link,$sql);
		
    $row = mysqli_fetch_assoc($result);  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>修改會員資料</title>
    <meta charset="utf-8">		
    <style>
    tr{
      background-color:#99FF99;
    }
    </style>
  </head>
  <body>
    <p align="center"><img src="./image/modify.png"></p>
    <form method="post" action="update.php" >
      <table border="0" align="center" >
        <tr> 
          <td colspan="2" bgcolor="#FFD8CF" align="center"> 
            填入下列資料 (標示「*」欄位請務必填寫)
          </td>
        </tr>
        <tr> 
          <td align="right">*使用者帳號：</td>
          <td><?php echo $row{"account"} ?></td>
        </tr>
        <tr> 
          <td align="right">*使用者密碼：</td>
          <td> 
            <input type="password" name="password" size="15" value="<?php echo $row["password"] ?>">
          </td>
        </tr>
        <tr> 
          <td align="right">*密碼確認：</td>
          <td>
            <input type="password" name="re_password" size="15" value="<?php echo $row["password"] ?>">
            (再輸入一次密碼)
          </td>
        </tr>
        <tr> 
          <td align="right">*姓名：</td>
          <td><input type="text" name="name" size="8" value="<?php echo $row["name"] ?>"></td>
        </tr>
        <tr> 
          <td align="right">*性別：</td>
          <td> 
            <input type="radio" name="sex" value="男" checked>男 
            <input type="radio" name="sex" value="女">女
          </td>
        </tr>
        <tr> 
          <td align="right">*生日：</td>
          <td>民國 
            <input type="text" name="year" size="2" value="<?php echo $row{"year"} ?>">年 
            <input type="text" name="month" size="2" value="<?php echo $row{"month"} ?>">月 
            <input type="text" name="day" size="2" value="<?php echo $row{"day"} ?>">日
          </td>
        </tr>
        <tr> 
          <td align="right">電話：</td>
          <td> 
            <input type="text" name="telephone" size="20" value="<?php echo $row{"telephone"} ?>">
          </td>
        </tr>
        <tr> 
          <td align="right">手機：</td>
          <td> 
            <input type="text" name="cellphone" size="20" value="<?php echo $row{"cellphone"} ?>">
          </td>
        </tr>
        <tr> 
          <td align="right">地址：</td>
          <td><input type="text" name="address" size="45" value="<?php echo $row{"address"} ?>"></td>
        </tr>
        <tr> 
          <td align="right">E-mail 帳號：</td>
          <td><input type="text" name="email" size="30" value="<?php echo $row{"email"} ?>"></td>
        </tr>
        <tr> 
          <td align="right">個人網站：</td>
          <td><input type="text" name="url" size="40" value="<?php echo $row{"url"} ?>"></td>
        </tr>
        <tr> 
          <td align="right">備註：</td>
          <td><textarea name="comment" rows="4" cols="45"><?php echo $row{"comment"} ?></textarea></td>
        </tr>
        <tr> 
          <td colspan="2" align="CENTER"> 
            <input type="submit" value="修改資料">
            <input type="reset" value="重新填寫">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php
    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
  }
?>