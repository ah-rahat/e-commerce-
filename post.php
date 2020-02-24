<?php
require_once 'vendor/autoload.php';
 
$ob=new App\classes\Category();
$category=$ob->allactiveCategory();
$getid=$_GET['id'];
$singlepost=$ob->singlePost($getid);
$showpost=mysqli_fetch_assoc($singlepost);



 ?>
<?php require_once 'header.php';?>


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">
      
        </h1>

        <!-- Blog Post -->
       <div class="card mb-4">
          <img class="card-img-top" src="uploads/<?=$showpost['photo'] ?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?=$showpost['title'] ?></h2>
            <p class="card-text"><?=$showpost['content']?>....</p>
          </div>
          <div class="card-footer text-muted">
           Posted on <?= date('d M Y',strtotime($showpost['createtime'])) ?>
            by <a href="#"><?=$showpost['name'] ?></a>
          </div>
        </div>


      </div>

      <!-- Sidebar Widgets Column -->
     <?php require_once 'widget.php' ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php require_once 'footer.php' ?>