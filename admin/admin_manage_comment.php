<?php
session_start();
include 'backend/config.php';
if (!isset($_SESSION['ad_email'])) {
  header("Location:index.php");
}
?>
<?php
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>ChatSphere Forum Community</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" id="nav">
    <img class="navbar-brand" src="logo1 (2).png" alt="log" style="height:80px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">


      </ul>
      <a href="backend/logout.php">
        <button type="button" class="btn btn-secondary">Log out</button>
      </a>


    </div>
  </nav>
  <div class="jumbotron my-4">

    <table class="table">
      <thead>

        <tr>
          <th scope="col">#</th>
          <th scope="col">Comment content</th>
          <th scope="col">comment by</th>

          <th scope="col">Action</th>
        </tr>
      </thead>

      <?php
      $cnt = 1;

      $sql2 = "select comments.comment_content, comments.comment_id,comments.comment_by,users.sno,users.user_email FROM comments , users
        WHERE  comments.comment_by =users.sno";
      $result2 = mysqli_query($conn, $sql2);
      while ($row2 = mysqli_fetch_assoc($result2)) {
      ?>




        <tbody>

          <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row2['comment_content']; ?></td>
            <td><?php echo  $row2['user_email'] ?></td>

            <?php
            echo ' <td>
                                                        <a href="admin_delete_comment.php?comment_id=' . $row2['comment_id'] . '" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                        <a href="admin_view_single_comment.php?comment_id=' . $row2['comment_id'] . '" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                        
                                                    </td>';
            ?>
          </tr>
        </tbody>
      <?php $cnt = $cnt + 1;
      } ?>


    </table>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>