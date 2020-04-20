<?php 
 //ob_start();  Ovu funkciju sam koristio za uključivanje izlaznog baferovanja zbog sesije
   session_start();
    require_once 'config/connection.php';
    include "models/products/functions.php";
 //   include "models/admin/functions.php";


    $page = "";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
	include 'views/fixed/head.php';
    include 'views/fixed/header.php';
  if (($page == "index") || (!$page)) {
    include "views/menu/slider.php";
   } else {
    include "views/menu/nav.php";
   }

   switch ($page) {

    case "index":
        include "views/contain/contain.php";
        break;
  case "register":
        include "views/contain/register.php";
        break;
  case "login":
        include "views/contain/login.php";
        break;  
   case "contact":
        include "views/contain/contact.php";
        break; 
   case "readmore":
        include "views/contain/readmore.php";
        break; 
   case "store":
        include "views/contain/store.php";
        break; 
   case "aboutus":
        include "views/contain/author.php";
        break; 
  case "table":
        include "views/contain/adminpanel/adminusers.php";
        break;
  case "adminlog":
        include "views/contain/adminpanel/adminlog.php";
        break; 
   case "adminproduct":
        include "views/contain/adminpanel/adminproducts.php";
        break;              
    default:
        include "views/contain/contain.php";
        break;
}

    include 'views/fixed/footer.php';

  

 
    $openLog = fopen(LOG_FILE, "a");
  fwrite($openLog, $_SERVER['PHP_SELF']."?page=".$_GET['page']."\t".$_SERVER['REMOTE_ADDR']."\t".date('d-m-Y H:m:s')."\n");

      fclose($openLog); 
   