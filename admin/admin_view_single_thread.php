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
  <?php
  $id = $_GET['thread_id'];
  $sql = "select * from `threadlist` where  thread_id=$id";

  $result = mysqli_query($conn, $sql);

  $cnt = 1;
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="jumbotron my-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Thread Title</th>
            <th scope="col">Thread Description</th>

          </tr>
        </thead>
        <tbody>

          <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row['thread_title']; ?></td>
            <td><?php echo $row['thread_desc']; ?></td>
          </tr>
        </tbody>
      <?php $cnt = $cnt + 1;
    } ?>


    </div>