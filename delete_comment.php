<?php
session_start();
include 'partials/_dbconnect.php';
?>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $id = $_GET['comment_id'];
  $id1 = $_GET['threadid'];
  $sql2 = "delete FROM `comments` WHERE `comments`.`comment_id` = $id";

  $result = mysqli_query($conn, $sql2);

  if ($sql2) {
    $_SESSION['message'] = "comment deleted successfully";
    header("Location: comments.php?threadid=" . $id1);
    exit(0);
  } else {
    $_SESSION['message'] = "Something went wrong";
    header("Location: comments.php?threadid=" . $id1);
    exit(0);
  }
}
?>