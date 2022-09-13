<?php
  function msg($msg,$number){
    echo $msg;
    http_response_code($number);
  }  
?>