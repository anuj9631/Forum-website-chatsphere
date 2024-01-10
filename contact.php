<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assests/style.css">
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ChatSphere Forum Community</title>
</head>

<body>
    <?php include "partials/_header.php"; ?>
    <?php include 'partials/_dbconnect.php'; ?>
 <?php 
      $method=$_SERVER['REQUEST_METHOD'];
      $showalert=false;
      if($method=='POST'){
        //INSERT THREAD INTO DB
        $firstName=$_POST['FirstName'];
        $lastName=$_POST['LastName'];
        $email=$_POST['EmailAddress'];
        $phoneNo=$_POST['PhoneNumber'];
        $feedback=$_POST['feedback'];
        $sql="INSERT INTO contacts ( firstName, lastName, email,phoneNo, feedback,timestamp) VALUES ('$firstName', '$lastName', '$email','$phoneNo', ' $feedback',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
          echo '<script>alert("Thank you for submitting contact form. We will get back to you shortly");</script>';
        }
      }
    ?>
 <section id="footer" class="gradient-background">
            <div class="contact-icon ">
                <div class="row flex-lg-row-reverse align-items-center ">
                    <div class="py96 bb bc-black-050 ta-center">
                        <center>
                            <svg aria-hidden="true" class="svg-spot spotMailLg fc-black-350 mb24" width="120"
                                height="120" viewBox="0 0 96 96">
                                <path opacity=".2"
                                    d="m8 37.9 34.75 21.51a5.8 5.8 0 0 0 5.88-.04l36.6-22.54A5.8 5.8 0 0 1 94 41.8v46.4c0 3.2-2.6 5.8-5.8 5.8H13.8A5.8 5.8 0 0 1 8 88.2V37.9Z">
                                </path>
                                <path
                                    d="M11 7.5A4.5 4.5 0 0 1 15.5 3h60A4.5 4.5 0 0 1 80 7.5v18a1.5 1.5 0 0 1-3 0v-18c0-.83-.67-1.5-1.5-1.5h-60c-.83 0-1.5.67-1.5 1.5v18a1.5 1.5 0 0 1-3 0v-18ZM31.55 13a3.2 3.2 0 0 0-3 2.59A3.4 3.4 0 0 0 25.38 13a3.3 3.3 0 0 0-2.54 1.06 3.2 3.2 0 0 0-.8 2.61c0 3.03 3.96 5.82 5.63 7l.09.06a1.2 1.2 0 0 0 1.51 0l.26-.18c1.66-1.2 5.47-3.96 5.47-6.88 0-1.61-.48-3.67-3.45-3.67ZM1 23.5A4.5 4.5 0 0 1 5.5 19h2a1.5 1.5 0 0 1 0 3h-2c-.83 0-1.5.67-1.5 1.5v4.36l41.23 26.2c.17.1.37.1.54 0L87 27.85V23.5c0-.83-.67-1.5-1.5-1.5h-2a1.5 1.5 0 0 1 0-3h2a4.5 4.5 0 0 1 4.5 4.5v62a4.5 4.5 0 0 1-4.5 4.5h-80A4.5 4.5 0 0 1 1 85.5v-62Zm86 7.91L56.75 50.63l22.81 22.8a1.5 1.5 0 0 1-2.12 2.13L54.16 52.28l-6.78 4.3a3.5 3.5 0 0 1-3.76 0l-6.78-4.3-23.28 23.28a1.5 1.5 0 0 1-2.12-2.12l22.8-22.81L4 31.41V85.5c0 .83.67 1.5 1.5 1.5h80c.83 0 1.5-.67 1.5-1.5V31.41ZM42.5 24a1.5 1.5 0 0 0 0 3h26a1.5 1.5 0 0 0 0-3h-26ZM41 16.5c0-.83.67-1.5 1.5-1.5h17a1.5 1.5 0 0 1 0 3h-17a1.5 1.5 0 0 1-1.5-1.5ZM42.5 33a1.5 1.5 0 0 0 0 3h16a1.5 1.5 0 0 0 0-3h-16Z">
                                </path>
                            </svg>
                        </center>
                        <center>
                            <h1 class="fs-display1 p-ff-roboto-slab mb16">Support &amp; Feedback</h1>
                            <p>If you need help, please <a href="#contactForm">contact us</a> . To share product feedback on
                                <br>our
                                products, please <a href="about.php">visit our community here</a> .</p>
                        </center>
                    </div>
                </div>
            </div>
            <div class="cont">
                <footer class="row row-cols-1 row-cols-sm-1 row-cols-md-10 py-10 mt-10">
                    <div class="col mb-3">
                        <a>
                            <svg aria-hidden="true" class="svg-icon iconMail va-middle mr4 mtn2" width="70" height="70"
                                viewBox="0 0 18 18">
                                <path
                                    d="m1 6 8 5 8-5V4L9 9 1 4c0-1.1.9-2 2-2h12c1.09 0 2 .91 2 2v10c0 1.09-.91 2-2 2H3c-1.09 0-2-.91-2-2V6Z">
                                </path>
                            </svg><u>
                                <h4>Get in touch</h4>
                            </u></a>
                        <br>
                        <br>

                        <div class="flex--item">
                            <h1 class="fs-title p-ff-roboto-slab-bold mb16"></h1>
                            <?php
                            echo '<form id="contactForm" action="'. $_SERVER["REQUEST_URI"].'" method="post" >

                                <div class="mb-3">
                                    <label for="FirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="LastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="LastName" name="LastName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="EmailAddress" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="EmailAddress" name="EmailAddress"
                                        aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">We will never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="PhoneNumber" class="form-label">Phone number</label>
                                    <input type="tel" class="form-control" id="PhoneNumber" minlength="10" maxlength="11" name="PhoneNumber" required>
                                </div>

                                <p><label for="feedback">Feedback</label></p>

                                <textarea id="feedback" name="feedback" rows="5" cols="60"
                                    placeholder="Write for us...." required></textarea><br>

                                <button type="submit" class="btn btn-primary " style="float: right;">Submit</button>

                            </form>';
                            ?>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
        <?php include "partials/_footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="assests/app.js"></script>
</body>
</html>