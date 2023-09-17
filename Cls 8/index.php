<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset ="UTF-8">
    <meta name="viewpoint" content = "width= device-width , initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="./index.php">POST SYSTEM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php   ">Add Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./allPosts.php">All Post</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>


<!---------------------------form start ------------------------------->  

  <div class ="card col-lg-4 mx-auto mt-3">
    <div class ="card-header">
     <center><h3>Create Post</h3></center>
    </div>
  <div class = "card-body">
    <form action= "./controller/storePost.php" method="POST">
      <input name="title"
      value= "<?= isset($_SESSION['old']['title']) ? $_SESSION ['old']['title'] : ''?>"
      class = "form-control my-3" type = "text" placeholder="Post Title">
      <?php
          if(isset($_SESSION['form_errors']['title_error'])){
      ?>
          <span class ="text-danger"> <?= $_SESSION['form_errors']['title_error'] ?></span>
      <?php     
          }  
      ?>
      <textarea name ="detail" class= "form-control my-3" placeholder="Write Something"><?= isset ($_SESSION['old']['detail']) ? $_SESSION['old']['detail'] : '' ?></textarea>
      <?php
          if(isset($_SESSION['form_errors']['detail_error'])){
      ?>
          <span class ="text-danger"> <?= $_SESSION['form_errors']['detail_error'] ?></span>
      <?php     
          }  
      ?>
      <input 
      value="<?= (isset($session['old']['author'])) ? $session['old']['author'] :''?>"
      name= "author" class= "form-control my-3" type = "text" placeholder ="Author Name">
      <button class="btn btn-success" style="font-size: 20px; font-weight:700; margin-top:20px;">Submit</button>
    </form>
  </div>
</div>

<!---------------------------form ends--------------------------->

<div class="toast <?= isset($_SESSION['msg']) ? "show" : " " ?>" style="position: absolute; bottom: 50px ; right: 50px " role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="me-auto">POST SYSTEM</strong>
    <small>11 sec ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
      <?= isset($_SESSION['msg']) ? $_SESSION['msg'] : " " ?>
  </div>
</div>

</body>
</html>

<?php
session_unset();
?>