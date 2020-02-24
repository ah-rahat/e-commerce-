<?php 
require_once '../vendor/autoload.php';

$blog=new App\classes\Blog();
if (isset($_GET['active'])&&isset($_GET['blog'])) {
	$id=$_GET['id'];
	$blog->active($id);
	header('Location:manage-blog.php');
}
if (isset($_GET['inactive'])&&isset($_GET['blog'])) {
	$id=$_GET['id'];
	$blog->inactive($id);
	header('Location:manage-blog.php');
}

$obj=new App\classes\Category();
if (isset($_GET['active'])&&isset($_GET['cat'])) {
	$id=$_GET['id'];
	$obj->active($id);
	header('Location:manage-catagory.php');
}
if (isset($_GET['inactive'])&&isset($_GET['cat'])) {
	$id=$_GET['id'];
	$obj->inactive($id);
	header('Location:manage-catagory.php');
}

 ?>