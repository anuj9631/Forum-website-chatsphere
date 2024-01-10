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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 

    <title>ChatSphere Forum Community</title>
</head>

<body>
<?php include 'partials/_header.php';
        include 'partials/_dbconnect.php';
?>
   
<!-- Search results starts here-->
    
       <div class="searchResults" style="position:absolute; top:80px; left:10px; max-height:100px;">
            <h1>Search results for <em> "<?php echo $_GET['search']?>" </em></h1>
            <?php 
                $query=$_GET["search"];
                $noResult=true;
                $sql="select * from `threadlist` where match (thread_title, thread_desc) against('$query')";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                            $noResult=false;
                            $title=$row['thread_title'];
                            $desc=$row['thread_desc'];
                            $thread_id=$row['thread_id'];
                            $url="comments.php?threadid=".$thread_id;
                            echo '<div class="result">
                            <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                            <p>'.$desc.'</p>
                            </div>';

                }
                if($noResult){
                    echo '<h1>No results found</h1>
                            <p>Suggestions:
                            <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            </ul>';
                }
        
    ?>
     </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <script src="assests/app.js"></script>
</body>

</html>