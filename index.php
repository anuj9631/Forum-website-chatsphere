<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>iDiscuss-Coding forum!</title>
  </head>
  <body>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_nav.php"; ?>
   
    
    <div class="container"><h1 class="text-center">Welcome to iDiscuss Coding Forums!</h1>
    <div class="row ">
<?php
    $sql="select * from `categories`";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $id= $row['category_id'];
        $cat= $row['category_name'];
        $cat_desc= $row['category_description'];
      echo   '<div class="card col-md-4 my-2 mx-2" >
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
          <p class="card-text">'.substr($cat_desc,0,20).'...</p>
          <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">Explore</a>
        </div>
      </div>' ;
    }
    ?>
          </div>
          </div>

    



    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>