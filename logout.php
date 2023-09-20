<?php
session_start();
if(session_destroy()){
   header("location:index2.php"); 
}
?>