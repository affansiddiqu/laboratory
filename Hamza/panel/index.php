<?php
session_start();

if(!isset($_SESSION["userpass"])){
  header('location: ../login.php');
}
include("admin/includes/header1.php");
include("admin/includes/header.php");
include("admin/includes/sidebar.php");
include("admin/includes/topbar.php");
include("admin/includes/footer.php");
?>