<?php
session_start();
include "./database/env.php";
$query = "SELECT * FROM posts " ;
$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, 1);

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
      


<!---------------------------table start ------------------------------->  
<div class = "col-lg-8 mx-auto my-5"> 
     <table class = " table">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Detail</th>
            <th>Author</th>
        </tr>
        <?php
        if(count($posts)>0){
           foreach($posts as $key=>$post){
        ?>
            <tr>
               <td><?=++$key?></td>
               <td><?=$post['title']?></td>
               <td><?=strlen($post['detail']) > 50 ? substr($post['detail'], 0, 50). '...' : $post['detail'] ?></td>
               <td><?=$post['author']?></td>
            </tr>
        <?php
           }
          }
          else{
        ?>
          <tr>
          <td colspan="4" class="text-center">
             <h2>No Data Found💩</h2>
          </td>
          </tr>
        <?php
          }
        ?>
        
        
     </table>
</div>


<!---------------------------table ends--------------------------->

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