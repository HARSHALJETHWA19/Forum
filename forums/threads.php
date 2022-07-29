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
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories`WHERE category_id=$id";
        $result = mysqli_query($conn, $sql);
       
        while($row = mysqli_fetch_assoc($result)){
                $catname = $row['category_name'];
                $catdesc= $row['category_description'];
        }    
    ?>


     

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                       
                  </div>';
        } 
    }
?>
    <!-- Categories starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-6">Welcome to <?php echo $catname;?> Forums!</h1>
            <p class="lead"><?php echo $catdesc;   ?> </p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Remain respectful of other members at all times.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
  echo ' <div class="container">
        <h3 class="py-2"> Ask a Questions </h3>
        <form action= "' . $_SERVER["REQUEST_URI"] .'" method="post">
            <div class="form-group">
                <label for="exampleInputName1">Query<Title></Title></label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="nameHelp"
                    placeholder="Enter Your Query">
                <small id="nameHelp" class="form-text text-muted">Keep your title as short as possible
                    else.</small>
                    <input type="hidden" name="sno" value="' .  $_SESSION["sno"] . '">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Explain your query here.</label>
                    <textarea class="form-control" id="desc" name="desc" rows="10" ></textarea>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>';
}
else{
    echo '
    <div class="container">
    <h3 class="py-2"> Ask a Questions </h3>
       <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
    </div>
    ';
}
    ?>

    <div class="container my-4" id="ques">
        <h3 class="py-2"> Browse Questions </h3>

        <?php 
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `thread`WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc= $row['thread_desc'];         
            $thread_time= $row['timestamp'];
            $thread_user_id= $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `user` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
           
         
     
       echo' <div class="media my-3">
            <img class="mr-3" src="img/user.png" width="54px">
            <div class="media-body">
                <h6 class="mt-2"> <a href="threadque.php?threadid=' . $id . '">' . $title . '</a></h6>
                ' . $desc .  '
                <p class=""text-muted"><small><b>'.  $row2['user_email'] . ' </b> <br>  at ' . $thread_time .'</small></p>
        </div>
        </div>';
    }    

    // echo var_dump($noResult);
    if($noResult == true){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h4 class="display-7">No Result Found</h4>
          <p class="lead">Be the first person to ask.</p>
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