<?php
session_start();
session_destroy();
header("location:/App_gestions/index.html");
exit();

?>