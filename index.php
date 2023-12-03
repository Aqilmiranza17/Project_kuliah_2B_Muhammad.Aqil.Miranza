<?php
if (isset($_GET['x']) && $_GET['x'] == 'home') {
   $page = "home.php";
   include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'obat') {
   $page = "obat.php";
   include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
   $page = "user.php";
   include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kasir') {
   $page = "kasir.php";
   include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
   $page = "report.php";
   include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
   include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
   include "proses/proses_logout.php";
} else {
   $page = "home.php";
   include "main.php";
}
?>