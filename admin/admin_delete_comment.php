<?php
session_start();
include 'backend/config.php';
if (!isset($_SESSION['ad_email'])) {
  header("Location:index.php");
}
?>
<?php
$id = $_GET['comment_id'];
$sql2 = "delete FROM `comments` WHERE `comments`.`comment_id` = $id";

$result = mysqli_query($conn, $sql2);

if ($sql2) {
  $_SESSION['message'] = "comment deleted successfully";
  header("Location: admin_manage_comment.php");
  exit(0);
} else {
  $_SESSION['message'] = "Something went wrong";
  header("Location: admin_manage_comment.php");
  exit(0);
}
?>