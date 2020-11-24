<?php
  //清除 cookie 內容
  setcookie("id", "");
  setcookie("passed", "");
	
  header("location:index.html");
  exit();
?>