<?php
  function db_connection($database)
  {
    $link = mysqli_connect("localhost", "root", "",$database);
    mysqli_query($link, "SET NAMES utf8");
    if($link==FALSE){
      echo ("無法建立資料連接: " . mysqli_connect_error());
      echo ("開啟資料庫失敗: " . mysqli_error($link));
    }
    return $link;
  }
?>