
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
    <?php include "partials/_nav.php"; ?>
    
 <?php 
      $method=$_SERVER['REQUEST_METHOD'];
      $showalert=false;
      if($method=='POST'){
        //INSERT THREAD INTO DB
        $firstName=$_POST['contactfirstName'];
        $lastName=$_POST['contactlastName'];
        $email=$_POST['contactemail'];
        $message=$_POST['message'];
        

       // $thread_desc=$_POST['desc'];
        $sql="INSERT INTO `contacts` ( `firstName`, `lastName`, `email`, `message`,`timestamp`) VALUES ('$firstName', '$lastName', '$email', ' $message',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
          echo '<div class="alert alert-success alert-dismissible" role="alert">
           Thank you for using our services. We will contact you soon.
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      }
    ?>
<?php     
  echo ' <center><h1 class="display-4">Contact us directly!</h1></center>
  <div style=" background-color:#ccc;">
  <form class="row col-md-12 my-4" action="'. $_SERVER["REQUEST_URI"].'" method="post" >
  <div class="col-md-4">
    <label for="firstName" class="form-label">First Name(required)</label>
    <input type="text" class="form-control" id="contactfirstName" name="contactfirstName" required>
    
  </div>
  <div class="col-md-4">
    <label for="lastName" class="form-label">Last Name(required)</label>
    <input type="text" class="form-control" id="contactlastName" name="contactlastName" required>
  </div>
  <br>
  <div class="col-md-6">
    <label for="contactemail" class="form-label">Email(required)</label>
    <input type="email" class="form-control" id="contactemail" name="contactemail">
  </div>
  <div class="form-group col-md-7">
    <label for="message">Your message</label>
    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
  </div>
  <div class="my-3">
  <button type="submit" class="btn btn-dark col-md-3">Submit</button>
  </div>
  </form>
  </div>
  ';
?>
</body>
</html>