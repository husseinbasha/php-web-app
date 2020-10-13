<?php
session_start();
unset($_SESSION['ID']);
unset($_SESSION['USERNAME']);
setcookie("uname", $row['username'] , - time()*8600 , "/" , "" , 0);
setcookie("id", $row['uid'] , - time()*8600 , "/" , "" , 0);
session_destroy();

header("Location: ../login.php?status=loged-out");
exit();
