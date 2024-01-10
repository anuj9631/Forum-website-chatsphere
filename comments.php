<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- fontawesome cdn For Icons -->
    <link rel="stylesheet" href="assests/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ChatSphere Forum Community</title>
  </head>
  <body>
  <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>
    <?php 
        $id1=$_GET['threadid'];
        //$noresult=true;
        $sql3="select * from threadlist where thread_id=$id1";
        $result3=mysqli_query($conn,$sql3);
        while($row3=mysqli_fetch_assoc($result3)){
            //$noresult=false;
            $id=$row3['thread_id'];
            $title=$row3['thread_title'];
            $desc=$row3['thread_desc'];
        }
    ?>




    <?php 
        $method=$_SERVER['REQUEST_METHOD'];
        $showalert=false;
        if($method=='POST'){
            //INSERT THREAD INTO DB
            $comment=$_POST['comment'];
            $sno=$_POST['sno'];
        // $thread_desc=$_POST['desc'];
            $sql="INSERT INTO comments (comment_content,thread_id,comment_by,comment_time)VALUES('$comment','$id','$sno',current_timestamp())";
            $result=mysqli_query($conn,$sql);
            $showalert=true;
            if($showalert){ 
              echo "<script>alert('Your comment has been added');</script>";
            
           }
        }
    ?>
        <div class="container">
            <div class="jumbotron my-3">
                <h1 class="display-4"> <?php echo $title ?></h1>
                <p class="lead"><?php echo nl2br($desc); ?></p>
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
                <textarea class="form-control"  id="comment" name="comment" style="height: 100px" required ></textarea>
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
        <p class="lead">Please Log in to start discussion</p>
        </div>';
    }
  ?>
  <div class="container" >
    <h1 class="py-2">Discussions </h1>
    <?php 
    $id1=$_GET['threadid'];
    $noresult=true;
    $sql="select * from comments where thread_id=$id1";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $id=$row['comment_id'];
        $content=$row['comment_content'];
        $comment_time=$row['comment_time'];
        $thread_user_id=$row['comment_by'];
        $sql2="select user_email from users where sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
       $row2= mysqli_fetch_assoc($result2);
       echo ' <div class=" my-4">
                    <img src="assests/images/user.png" width="40px" class="mr-3" alt="...">
                    <div class="media-body"><p class="font-weight-bold my-1">'.$row2['user_email']. ' at '.$comment_time.'</p>'.nl2br($content);'
                    </div>
                </div>';
              if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $row['comment_by']==$_SESSION["sno"]){
                echo '<br> <a href="delete_comment.php?comment_id='.$row['comment_id'].'&threadid='.$id1.'"><button type="button" class="btn btn-info">Delete</button></a>';
              }

        }
        if($noresult){
        echo "Be the first to offer your response in the discussion.";
        }
    ?>
  </div>
    <script src="assests/pyapp.js"></script>
    <script src="assests/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>