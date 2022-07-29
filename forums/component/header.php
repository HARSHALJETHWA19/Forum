<?php
 session_start();
 
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/Forums">ASK MEE</a>
  <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="/Forums">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="about.php">About </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link " href="contact.php" >Contact</a>
      </li>
    </ul>
    <div class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
        echo ' <form class="d-flex">
        <p class="text-light my-1 mx-2">Welcome '.$_SESSION['useremail']. ' </p>
        <a href="component/logout.php" class="btn btn-outline-success ml-2">Logout</a>
        </form>';
    }
    else {
 echo'<div class="d-flex">
      <button class="btn btn-outline-primary mx-1" data-bs-toggle="modal" data-bs-target="#loginmodal"> Login </button>
      <button class="btn btn-outline-primary mx-1" data-bs-toggle="modal" data-bs-target="#signupmodal"> Sign Up </button>
  </div>';
    }
    
      echo'</div>
        </div>
        </nav>';

include 'component/loginm.php';
include 'component/signupm.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show mx-0 my-0" role="alert">
            <strong>Success!</strong> You can now login.
        </div>';
}

?>