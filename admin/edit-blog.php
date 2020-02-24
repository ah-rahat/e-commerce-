<?php require_once 'header.php' ?>
<?php 
require_once"../vendor/autoload.php"; ;
// use App\classes\database();
$category=new App\classes\Category();
$Blog=new App\classes\Blog();
$alldata=$category->allactiveCategory();
$id=$_GET['id'];
$result=$Blog->viewCategory($id);
$row1=mysqli_fetch_assoc($result);

if (isset($_POST['update_blog'])) {
	$Blog->updateBlog($_POST); 
	



	// $sql=
	// mysqlir_query(database::dbcon(), query)
}

?>
<div class="row" style="">
	
	<div class="col-lg-12">
                      <section class="card">
                          <header class="card-header">
                              blog update
                          </header>
                          <div class="card-body">
                          	<?php 
                          	if (isset($insertMsg)) {
                          		?>
                          		<h4><?=isset($insertMsg)?$insertMsg:"" ?></h4>
                          		
                          	
                          	<?php } ?>
                          	
                              <form action="" method="POST" enctype="multipart/form-data">
                              	
                                  <div class="form-group row">
                                      <label for="Category_name"  class="col-sm-2 col-form-label">Category</label>
                                      <div class="col-sm-10">
                                        <select name="cat_id" id="cat_id" class="form-control">
                                          <option value="">select category</option>
                                          <<?php foreach ($alldata as $data) 
                                            
                                           { ?>
                                            <option <?=$data['id']==$row1['cat_id']?'selected':""?> value="<?=$data['id']?>"><?=$data['catagory_name']?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="title"  class="col-sm-2 col-form-label">blog title</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="title" class="form-control" id="" placeholder="blog title " value="<?=$row1['title']?>">
                                          <input type="hidden" name="id" value="<?=$row1['id']?>">
                                      </div>
                                  </div>

                                     <div class="form-group row">
                                      <label for="content"  class="col-sm-2 col-form-label">blog content</label>
                                      <div class="col-sm-10">
                                         <textarea name="content" id=""  class="summernote" ><?=$row1['content']?></textarea>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="photo"  class="col-sm-2 col-form-label">Photo</label>
                                      <div class="col-sm-10">
                                          <input type="file" name="photo" id="photo" value="" >
                                          <img style="width: 100px" src="../uploads/<?=$row1['photo']?>" alt="">
                                      </div>
                                  </div>

                                 
                             
                                  <fieldset class="form-group">
                                      <div class="row">
                                          <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                          <div class="col-sm-10">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="status" id="active" value="1" <?=$row1['status']==1?'checked':""?> >
                                                  <label class="form-check-label" for="active">
                                                   active
                                                  </label>
                                              </div>
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="status" id="inactive" value="0"<?=$row1['status']==0?'checked':""?> >
                                                  <label class="form-check-label" for="inactive">
                                                     Inactive
                                                  </label>
                                              </div>
                                            
                                          </div>
                                      </div>
                                  </fieldset>
                               
                                  <div class="form-group row">
                                      <div class="col-sm-10">
                                          <button type="submit" name="update_blog" class="btn btn-primary">Update</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>

                  </div>
</div>
<?php require_once 'footer.php' ?>