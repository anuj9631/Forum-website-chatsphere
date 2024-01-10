<?php
include '_dbconnect.php';
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/forum">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql="select category_name,category_id from `categories` ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
         echo ' <a class="dropdown-item" href="threadlist.php?catid='.$row["category_id"].'">'.$row["category_name"].'</a>';
          
        }
          
        echo   '</div>
      </li>
    </ul>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> <p class="mx-2 my-2" >Welcome '.$_SESSION['useremail'].'</p><a href="partials/_logout.php" role="button" class="btn btn-primary mx-2 my-2 my-sm-0" type="submit">Log Out</a>
    </form>';
    }
    else{
      echo '<form class="form-inline my-2 my-lg-0">
      
    </form>
    <div class="mx-2">
    <button class="btn btn-primary" data-toggle="modal" data-target="#loginmodal">Log in</button></div>
    <div class="mx-2">
    <button class="btn btn-primary" data-toggle="modal" data-target="#signupmodal">Sign up</button>';
    }
 
   echo ' </div>
    
  </div>
</nav>';
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true'){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!!</strong> You can now log in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
//$showerror=$_GET['showerror'];
if(isset($_GET['showerror']) ){
  
  $showerror=$_GET['showerror'];
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oops!!</strong>'.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if(isset($_GET['showalert']) ){
  $showalert=$_GET['showalert'];
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oops!!</strong>'.$showalert.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
/*if($_GET['$showerror']=='true'){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!!</strong> You can now log in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($_SESSION['showerror']==true){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!!</strong>'.$_SESSION['showerror'].'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oop!!</strong>'.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}*/
?>