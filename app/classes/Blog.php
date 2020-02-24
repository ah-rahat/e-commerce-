<?php
namespace App\classes;
use App\classes\database;
class Blog{
	public function addBlog($data)
	{
		
		
		$file_name=$_FILES['photo']['name'];
		
		$file_ext=explode('.', $file_name);
		$file_ext=end($file_ext);
		$file_name=time('Ymdhis').'.'.$file_ext;
		$title=mysqli_real_escape_string(database::db_con(),$data['title']);
		$content=mysqli_real_escape_string(database::db_con(),$data['content']);
		$status=mysqli_real_escape_string(database::db_con(),$data['status']);
		$cat_id=mysqli_real_escape_string(database::db_con(),$data['cat_id']);
		$name=$_SESSION['name'];
		$sql="INSERT INTO `blog`(`cat_id`, `title`, `content`, `photo`, `status`, `name`) VALUES ('$cat_id','$title','$content','$file_name','$status','$name')";
		$result=mysqli_query(database::db_con(), $sql);
		if ($result) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$file_name);
			$insertMsg="save blog successfull";
			return $insertMsg;
		}
		else{
			$insertMsg="save blog unsuccessfull";
			return $insertMsg;
		}
	}
	public function allBlog()
	{
		$sql="SELECT `blog` . *,`catagory`.`catagory_name` FROM `blog` INNER JOIN `catagory` ON `blog`.`cat_id`=`catagory`.`id` ORDER BY `id` DESC";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
	public function active($id)
	{
		$sql="UPDATE `blog` SET `status`='1' WHERE `id`='$id'";
		mysqli_query(database::db_con(),$sql);
	}
	public function inactive($id)
	{
		$sql="UPDATE `blog` SET `status`='0' WHERE `id`='$id'";
		mysqli_query(database::db_con(),$sql);
	}
	public function deleteCategory($id)
	{
		$sql="DELETE FROM `blog` WHERE `id`='$id'";
		mysqli_query(database::db_con(),$sql);
		header('Location:manage-blog.php');
	}
		public function viewCategory($id='')
	{
		$sql="SELECT * FROM `blog` WHERE `id`='$id'";
		$view=mysqli_query(database::db_con(),$sql);
		return $view;
	}
		public function updateBlog($data)
	{
		
		$title=mysqli_real_escape_string(database::db_con(),$data['title']);
		$content=mysqli_real_escape_string(database::db_con(),$data['content']);
		$status=$data['status'];
		$cat_id=mysqli_real_escape_string(database::db_con(),$data['cat_id']);
		$name=$_SESSION['name'];
		$id=$data['id'];
		if ($_FILES['photo']['name']==NULL) {
				$sql="UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`status`='$status',`name`='$name' WHERE `id`='$id'";
		}
		else{

		$file_name=$_FILES['photo']['name'];
		
		$file_ext=explode('.', $file_name);
		$file_ext=end($file_ext);
		$file_name=time('Ymdhis').'.'.$file_ext;
			$sql="UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`photo`='$file_name',`status`='$status',`name`='$name' WHERE `id`='$id'";
		}
	
		$result=mysqli_query(database::db_con(), $sql);
		if ($result) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$file_name);
		
			header('Location:edit-blog.php?id='.$id);
		}
		else{
		
						header('Location:edit-blog.php?id='.$id);
		}
	}
}
?>