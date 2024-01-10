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
  <div class="container">
    <h1 style="margin-top:100px;" class="text-center">Welcome to admin Panel</h1>
    <div class="card" style="width: 18rem; position:absolute; top:40%; left:30%;">
      <div class="card-body">
        <h5 class="card-title">Thread management

        </h5>
        <p class="card-text">Seamlessly control discussions with our intuitive admin panel feature</p>
        <a href="admin_manage_thread.php" class="card-link">Thread management </a>

      </div>
    </div>
    <div class="card" style="width: 18rem; position:absolute; top:40%; left:60%;">
      <div class="card-body">
        <h5 class="card-title">Comment management
        </h5>

        <p class="card-text">Optimize discussions with our Comment Management feature in the Admin Panel</p>
        <a href="admin_manage_comment.php" class="card-link">Comment management </a>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>