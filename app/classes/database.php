<?php
// namespace App\classes;
// class database{
// public function db_con()
// {
	// 	$link=mysqli_connect("localhost","root","","blog");
	// 	return $link;
// }
// }
namespace App\classes;
class database{
	public function db_con()
	{
		$link=mysqli_connect("localhost","root","","blog");
		return $link;
	}
}
?>