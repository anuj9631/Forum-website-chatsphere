
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
    <?php include 'partials/_nav.php';?>
       
    
    <?php
    $id=$_GET['catid'];
    $sql="select * from `categories` where category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $catname=$row['category_name'];
      $desc=$row['category_description'];
    }
    ?>
    
    <?php 
      $method=$_SERVER['REQUEST_METHOD'];
      $showalert=false;
      if($method=='POST'){
        //INSERT THREAD INTO DB
        $thread_title=$_POST['title'];
        $thread_desc=$_POST['desc'];
        $sno=$_POST['sno'];
        $sql="INSERT INTO `threads` (`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_id`, `timestamp`)VALUES('$thread_title','$thread_desc','$id','$sno',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!!</strong> Your thread has been added please wait for community to respond.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      }
    ?>
    <div class="container">
    <div class="jumbotron my-3">
        <h1 class="display-4">Welcome to <?php echo $catname ?> forum</h1>
        <p class="lead"><?php echo $desc ?></p>
        <hr class="my-4">
        <p>This forum is for sharing knowledge</p>
       <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>-->
    </div>
    </div>
    <div class="container">
        <h1 class="py-2">Browse question </h1>
        <?php
    $id=$_GET['catid'];
    $sql="select * from `threads` where thread_cat_id=$id";
    $result=mysqli_query($conn,$sql);
    $noResult=true;
    while($row=mysqli_fetch_assoc($result)){
      $noResult=false;
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
      $thread_time=$row['timestamp'];
      $id=$row['thread_id'];
      $thread_user_id=$row['thread_user_id'];
      $sql2="select user_email from `users` where sno='$thread_user_id'";
      $result2=mysqli_query($conn,$sql2);
     $row2= mysqli_fetch_assoc($result2);
      echo '<div class="media my-4">
      <img src="img/user.png" width="40px" class="mr-3" alt="...">
      <div class="media-body">
      <p class="font-weight-bold my-1">'.$row2['user_email'].' at '.$thread_time.'</p>
      <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
      '.$desc.'
      </div>
  </div>';
    }
    if($noResult){
      echo "Be the 1st person to ask a question";
    }
    ?>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<div class="container my-4">
  <h2>Ask a question </h2>
  <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
    <div class="mb-3">
    <label for="title" class="form-label">Thread Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
   </div>
    <div class="mb-3">
    <div class="form-floating">
    <textarea class="form-control"  id="desc" name="desc" style="height: 100px"></textarea>
    <label for="desc">Elaborate your problem</label>
    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
</div>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>';
    }

  else{
   echo '<div class="container">
    <p class="lead">You need to log in to start a discussion</p>
    </div>';
  }
  ?>
  
       <!-- <div class="media my-4">
            <img src="img/user.png" width="40px" class="mr-3" alt="...">
            <div class="media-body">
            <h5 class="mt-0">unable to run python program</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <div class="media my-4">
            <img src="img/user.png" width="40px" class="mr-3" alt="...">
            <div class="media-body">
            <h5 class="mt-0">unable to execute numpy methods</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <div class="media my-4">
            <img src="img/user.png" width="40px" class="mr-3" alt="...">
            <div class="media-body">
            <h5 class="mt-0">unable to execute pandas methods</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>