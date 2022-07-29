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
    #ques{
        min-height: 433px;
        
    }
</style>
<body>

    <?php include 'component/header.php'; ?>
    <?php include 'component/dbconnect.php'; ?>

    <!-- Categories starts here -->

    <div class="container my-3" id="ques">
        <h3 class="text-center my-3">ASK MEE - Browse Categories</h3>

        <div class="row">

            <!-- Fetch all the categories -->
             <?php
              $sql = "SELECT * FROM `categories`";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){
                  // echo $row['category_id'];
                  // echo $row['category_name'];
                  $id = $row['category_id'];
                  $cat = $row['category_name'];
                  $desc = $row['category_description'];
                  $c = $row['created'];
                  echo '<div class="col-md-4 my-1">
                  <div class="card " style="width: 18rem;">
                      <img src="https://source.unsplash.com/500x400/?' . $cat . ',coding" 
                      class="card-img-top" alt="..." >
                      <div class="card-body ">
                          <h5 class="card-title"><a href="Threads.php?catid=' .  $id . '">' .  $cat . '</a></h5>
                          <p class="card-text">' . substr($desc, 0,90). '... </p>
                        
                          <a href="Threads.php?catid=' .  $id . '" class="btn btn-primary"> View More </a>
                      </div>
                  </div>
              </div>';
              }
            ?>
            <!-- for loop to iterate categories -->

            
        </div>
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