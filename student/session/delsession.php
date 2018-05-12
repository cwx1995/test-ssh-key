<?php 
session_start();
// $_SESSION ['abc_id']=null;
//主要用unset
// unset($_SESSION ['abc_id']);
//删除所有 
session_destroy();
?>