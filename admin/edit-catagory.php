<?php require_once 'header.php' ?>
<?php
require_once"../vendor/autoload.php"; ;
// use App\classes\database();
$category=new App\classes\Category();
$id=$_GET['id'];
$result=$category->viewCategory($id);
$row=mysqli_fetch_assoc($result);
// print_r($row);
if (isset($_POST['updateCategory'])) {
  $insertMsg=$category->updateCategory($_POST);
  
  // $sql=
  // mysqlir_query(database::dbcon(), query)
}
?>
<div class="row" style="">
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <section class="card">
      <header class="card-header">
        Update Category
        
        
      </header>
      <div class="card-body">
        
        <form action="" method="POST">
          

         <div class="form-group row">
            <label for="Category_name"  class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
              <input type="hidden" name="id" value="<?=$row['id']?>">
              <input type="text" name="category_name" class="form-control" id="" placeholder="Category Name" value="<?=$row['catagory_name']?>">
            </div>
          </div>
          
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  
                  <input class="form-check-input" type="radio" name="status" id="active" value="1"<?=$row['status']=='1'?"checked":""?> >
                  <label class="form-check-label" for="active">
                    active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="inactive" value="0"<?=$row['status']=='0'?"checked":""?>>
                  <label class="form-check-label" for="inactive">
                    Inactive
                  </label>
                </div>
                
              </div>
            </div>
          </fieldset>
          
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" name="updateCategory" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
<?php require_once 'footer.php' ?>