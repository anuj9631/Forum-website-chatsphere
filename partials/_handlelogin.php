<?php
$showalert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $email=$_POST['loginemail'];
    $pass=$_POST['loginpassword'];
    $sql="select * from `users` where user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1){
        //$showerror="Email already exists";
        //header("Location:/forum/index.php?signupsuccess=false&error=$showerror");
        $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_pass'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['sno'];
                $_SESSION['useremail']=$email;
                //echo "logged in";
                header("Location:/forum/index.php");
                exit;
            }
            else{
                //echo "unable to log in";
                $showalert="passwords do no match";
                header("Location:/forum/index.php?signupsuccess=false&showalert=passwords do no match");
            }
        }
        else{
            $showalert="please sign in first";
            header("Location:/forum/index.php?signupsuccess=false&showalert=please sign in first");
        }
    }


?>