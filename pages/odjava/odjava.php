<?php
session_start();
if(session_destroy()) {
  header('Location: http://localhost/projekt/pages/odjava/uspjesna-odjava.php');
} else {
  header('Location: http://localhost/projekt/pages/odjava/neuspjesna-odjava.php');
}
?>