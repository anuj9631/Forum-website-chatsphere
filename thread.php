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
    
    <?php 
    $id=$_GET['threadid'];
    //$noresult=true;
    $sql="select * from `threads` where thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        //$noresult=false;
        $id=$row['thread_id'];
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
      

    }
   /* if($noresult){
      echo "be the fisrt person to answer";
    }*/
    ?>
      <?php 
      $method=$_SERVER['REQUEST_METHOD'];
      $showalert=false;
      if($method=='POST'){
        //INSERT THREAD INTO DB
        $comment=$_POST['comment'];
        $sno=$_POST['sno'];
       // $thread_desc=$_POST['desc'];
        $sql="INSERT INTO `comments` (`comment_content`,`thread_id`,`comment_by`,`comment_time`)VALUES('$comment','$id','$sno',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!!</strong> Your comment has been added .
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      }
    ?>
    
    <div class="container">
    <div class="jumbotron my-3">
        <h1 class="display-4"> <?php echo $title ?></h1>
        <p class="lead"><?php echo $desc ?></p>
        <hr class="my-4">
        
        
    </div>
    </div>
    


    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
     echo  '<div class="container my-4">
      <h2>Post a comment </h2>
      <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
       
        <div class="mb-3">
        <div class="form-floating">
        <textarea class="form-control"  id="comment" name="comment" style="height: 100px"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
        <label for="desc">Type your Comment</label>
        </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Post Comment</button>
      </form>
      </div>';
    }

  else{
   echo '<div class="container">
    <p class="lead">You need to log in to post a comment</p>
    </div>';
  }
  ?>





    <div class="container" >
        <h1 class="py-2">Discussions </h1>
        <?php 
    $id=$_GET['threadid'];
    $noresult=true;
    $sql="select * from `comments` where thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $id=$row['comment_id'];
        $content=$row['comment_content'];
        $comment_time=$row['comment_time'];
        $thread_user_id=$row['comment_by'];
        $sql2="select user_email from `users` where sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
       $row2= mysqli_fetch_assoc($result2);
       echo ' <div class="media my-4">
        <img src="img/user.png" width="40px" class="mr-3" alt="...">
        <div class="media-body"><p class="font-weight-bold my-1">'.$row2['user_email']. ' at '.$comment_time.'</p>'.$content.'
        </div>
    </div>';

    }
    if($noresult){
      echo "be the fisrt person to answer";
    }
    ?>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>