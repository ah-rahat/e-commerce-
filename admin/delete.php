<?php 
require_once '../vendor/autoload.php';
$obj=new App\classes\Category();

if (isset($_GET['cat_id'])) {
	$cat_id=$_GET['cat_id'];
	$obj->deleteCategory($cat_id);
		header('Location:manage-catagory.php');



}
$blog=new App\classes\Blog();
if (isset($_GET['blog'])) {
	$id=$_GET['id'];
	$blog->deleteCategory($id);

	$file=$_GET['filename'];
	unlink('../uploads/'.$file);
	
		header('Location:manage-blog.php');



}

 ?>