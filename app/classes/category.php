<?php
namespace App\classes;
use App\classes\database;
class Category{
	public function addCategory($data)
	{
		
		$category_name=$data['category_name'];
		$status=$data['status'];
		$sql="INSERT INTO `catagory`(`catagory_name`, `status`) VALUES ('$category_name','$status')";
		$result=mysqli_query(database::db_con(), $sql);
		if ($result) {
			$insertMsg="Category insert successfull";
			return $insertMsg;
		}
		else{
			$insertMsg="Category insert unsuccessfull";
			return $insertMsg;
		}
	}
	public function allCategory()
	{
		$sql="SELECT * FROM `catagory`";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	public function allactiveCategory()
	{
		$sql="SELECT * FROM `catagory` WHERE `status`=1";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	public function allactivepost()
	{
		$sql="SELECT * FROM `blog` WHERE `status`=1 order by `id` desc";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	public function searchPost($text)
	{
		$sql="SELECT * FROM `blog` WHERE `content` LIKE '%$text%' and `status`=1 order by `id` desc";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	public function singlecat($id)
	{
		$sql="SELECT * FROM `blog` WHERE `status`=1 and `cat_id`='$id' order by `id` desc";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}


	public function active($id)
	{
		$sql="UPDATE `catagory` SET `status`='1' WHERE `id`='$id'";
		mysqli_query(database::db_con(),$sql);
		header('Location:manage-catagory.php');
	}
	public function inactive($id)
	{
		$sql="UPDATE `catagory` SET `status`='0' WHERE `id`='$id'";
		mysqli_query(database::db_con(),$sql);
			header('Location:manage-catagory.php');
	}
	public function deleteCategory($cat_id)
	{
		$sql="DELETE FROM `catagory` WHERE `id`='$cat_id'";
		mysqli_query(database::db_con(),$sql);
		header('Location:manage-catagory.php');
	}
	public function viewCategory($id='')
	{
		$sql="SELECT * FROM `catagory` WHERE `id`='$id'";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	public function updateCategory($data1)
	{
		
		$category_name=$data1['category_name'];
		$status=$data1['status'];
		$id=$data1['id'];
		$sql="UPDATE `catagory` SET `catagory_name`='$category_name',`status`='$status' WHERE `id`='$id'";
		$result=mysqli_query(database::db_con(), $sql);
		if ($result) {
			
		
			header('Location:edit.php?id='.$id);
		}
		else{
		
						header('Location:edit.php?id='.$id);
		}
	}
	public function singlePost($id='')
	{
		$sql="SELECT * FROM `blog` WHERE `id`='$id'";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	}
?>