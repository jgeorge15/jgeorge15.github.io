<!doctype html>
<html>
<?php
   include("connectDatabase.php");
   session_unset(); 
   session_destroy(); 
   header("location: login.php");
   ?>
   </html>