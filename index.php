<?php 
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script> location.href='login/login.php' </script>";
} else {
    echo "<script> location.href='view/dashboard.php' </script>";
}