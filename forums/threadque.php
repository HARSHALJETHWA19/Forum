<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Ask Me!!</title>
</head>
<style>
#ques {
    min-height: 433px;
}
</style>

<body>

        <?php include 'component/dbconnect.php'; ?>
        <?php include 'component/header.php'; ?>

    <?php 
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `thread`WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
                $title = $row['thread_title'];
                $desc= $row['thread_desc'];
              
        }    
    ?>

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Insert into comment db
        $comment = $_POST['comment']; 
        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES ('$comment', '$id' ,current_timestamp(), '$sno');";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added!
                       
                  </div>';
        } 
    }
?>
       

    <!-- Categories starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h3 class="display-7"><?php echo $title;?> </h3>
            <p class="lead"><?php echo $desc;   ?> </p>
            <hr class="my-4">

            
        </div>
    </div>


    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
        <h3 class="py-2"> Write  a Comment</h1> 
        <form action= "'. $_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <br>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="' .  $_SESSION["sno"] . '">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form> 
    </div>';
    }
    else{
        echo '   
        <div class="container">
        <h3 class="py-2">Write a Comment</h1> 
           <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        </div>
        ';
    }
    ?>

    <div class="container my-4" id="ques">
        <h3 class="py-2"> Discussions </h3>

        <?php 
       $id = isset($_GET['threadid']) ? $_GET['threadid'] : '';
        $sql = "SELECT * FROM `comment` WHERE thread_id= $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $thread_user_id = $row['comment_by'];

                $sql2 = "SELECT user_email FROM `user` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
               
               
         
     
       echo' <div class="media my-3">
            <img class="my-3" src="img/user.png" width="54px">
            <div class="media-body">
            <p class=" my-2"> ' . $content .  ' <br><small><b>' .  $row2['user_email']  .'</b> at ' . $comment_time . '</p> </small>
               
            
        </div>
        </div>';
    }    

    if($noResult == true){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h4 class="display-7">No Result Found</h4>
          <p class="lead">Be the first person for this.</p>
        </div>
      </div>';
    }

    ?>
    </div>
        <?php include 'component/footer.php'; ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>