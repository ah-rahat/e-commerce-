<?php 
// namespace App\classes;
// use App\classes\database;
// class login{
// 	public function loginCheck($data)
// 	{
// 		$username=$data['username'];
// 		$password=md5($data['password']);
// 		$sql="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
// 		$result=mysqli_query(database::db_con(),$sql);
// 		if ($result) {
// 			if ( mysqli_num_rows($result)==1) {
// 				$row=mysqli_fetch_assoc($result);
// 				session_start();
// 				$_SESSION['user_id']=$row['id'];
// 				$_SESSION['username']=$row['username'];
// 				$_SESSION['name']=$row['name'];
// 				header('Location:index.php');
// 			}
// 			else {
// 				$login_error="username or password does not match";
// 				return $login_error;
// 			}
// 		}
// 		else
// 		{
// 			die();
// 		}

// 	}

// }

namespace App\classes;
use App\classes\database;
class login{
public function loginCheck($data)
{
	
	$username=$data['username'];
	$password=md5($data['password']);
	$sql="SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
	$result=mysqli_query(database::db_con(),$sql);
	if ($result) {
		if ( mysqli_num_rows($result)==1) {
			$row=mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['user_id']=$row['id'];
			$_SESSION['username']=$row['username'];
			$_SESSION['name']=$row['name'];

			header('Location:index.php');
		}
		else {
			$login_error="username & password doesn't match";
			return $login_error;
		}
		
	}
	else{
		die();
	}

}
public function Register($data1)
{

	$name=$data1['name'];
	$username=$data1['username'];
	$password=md5($data1['password']);
	// echo $password;
	// exit();
	if (empty($name)) {
		$empty_name="please enter a name";
		return $empty_name;
		
	}
	else if (strlen($name)<5) {
		$strlen_name="please enter a name above four charecter";
		return$strlen_name;
	}
	if (empty($username)) {
		$empty_username="Enter a username";
		return $empty_username;
		
	}
	elseif (strlen($username)<5) {
		$strlen_username="please enter a username above four charecter";
		return $strlen_username;
	}
	if (empty($password)) {
		$empty_password="Enter a password";
		return $empty_password;
		
	}
	elseif (strlen($password)<5) {
		$strlen_password="please enter a password above four charecter";
		return $strlen_password;
	}
	else{
	
	$sql="INSERT INTO `users`(`name`, `username`, `password`) VALUES ('$name','$username','$password')";
	$db=mysqli_query(database::db_con(), $sql);
	 header('Location:login.php');
	}
}

}

 ?>