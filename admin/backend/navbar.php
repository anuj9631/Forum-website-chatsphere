<?php
session_start();
include 'config.php';
// include 'logo1 (2).png';
echo '<nav class=" navbar navbar-expand-lg navbar-light" id="nav">';
?>
<img class="navbar-brand" src="assests/images/logo1 (2).png" alt="logo" style="height:80px;">
<?php
echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
  <ul class="navbar-nav nav-links mr-auto">
    <li class="nav-item active submenu">
      <a href="/minorProj">Home </a>
    </li>
    <li class="submenu">
      <a href="about.php">About</a>
    </li>
    <li class="submenu">
        <a href="contact.php">Contact</a>
      </li>
    <li class=" submenu">
      <a  class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Resources
      </a>
      <div class="sub-menu">
        <ul>
            <li class="drop-item"><a href="https://cplusplus.com/doc/tutorial/" target="_blank"
                    class="drop-link">C++</a></li>
            <li class="drop-item"><a
                    href="https://www.learnjavaonline.org/#:~:text=Welcome%20to%20the%20LearnJavaOnline.org,from%2C%20and%20follow%20the%20instructions."
                    target="_blank" class="drop-link">Java</a></li>
            <li class="drop-item"><a href="https://docs.python.org/3/tutorial/index.html"
                    target="_blank" class="drop-link">Python</a></li>
            <li class="drop-item"><a
                    href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide"
                    target="_blank" class="drop-link">JavaScript</a></li>

        </ul>
    </div>
    </li>
    <li class=" submenu">
        <a  class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="sub-menu">
          <ul>
            <li class="drop-item"><a href="threadlist.php?catid=1" class="drop-link">Java</a></li>
            <li class="drop-item"><a href="threadlist.php?catid=2" class="drop-link">Python</a></li>
            <li class="drop-item"><a href="threadlist.php?catid=3" class="drop-link">C++</a></li>
            <li class="drop-item"><a href="threadlist.php?catid=4" class="drop-link">JavaScript</a></li>
          </ul>
      </div>
    </li>
    
</ul>
<form action="search.php" method="get">
    <div class="searchBox">
        <div class="search-field">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" class="bx bx-search">
            </button>
        </div>  
    </div>
</form>';

            echo '<ul class="nav justify-content-end">
            <li class="nav-item">
                <div class="mx-2">
                    <a href="partials/_loginmodal.php">
                    <button class="btn btn-primary" >Log in</button></a>
                </div>
            </li>
            <li class="nav-item">
                <div class="mx-2">
                    <a href="partials/_logout.php">
                    <button class="btn btn-primary" >Log out</button></a>
                </div>
            </li>

            </ul>' ;  
echo '</div> </nav>';
    
    

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true'){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!</strong> You can now log in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']==true)
      { 
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!</strong> You are logged in.
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
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
  ?>