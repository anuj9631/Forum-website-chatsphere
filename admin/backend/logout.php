<?php
session_start();
session_destroy();
header("Location: /minorProj/admin/index.php");
exit;
?>