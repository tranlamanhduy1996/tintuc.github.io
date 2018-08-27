<?php
	session_start();
	include ('model/m_user.php');
	 class C_user
	 {
	 	function dangkiTk($name,$email,$password){
	 		$m_user= new M_user();
	 		$id_user = $m_user->dangki($name,$email,$password);
	 		if($id_user>0){
	 			$_SESSION['sucess']="Đăng kí thành công";
	 			header('location:dangnhap.php');
	 			if(isset($_SESSION['error'])){
	 				unset($_SESSION['error']);
	 			}
	 		}
	 		else{
	 			$_SESSION['error']='Đăng kí không thành công';
	 			header('location:dangky.php');
	 		}
	 	}
	  	function dangnhap($email,$password){
	 		$m_user = new M_user();
	 		$user = $m_user ->dangnhap($email,$password);
	 		if ($user == true) {
	 			if($user->role==1){
		 			$_SESSION['user_name'] = $user->name;
		 			$_SESSION['id_user'] = $user->id;
		 			header('location:admin.php');
		 			if (isset($_SESSION['user_error'])) {
		 				unset($_SESSION['user_error']);
		 			}
		 			if(isset($_SESSION['chua_dang_nhap'])){
		 				unset($_SESSION['chua_dang_nhap']);
		 			}
	 			}
	 			else{
	 				$_SESSION['user_name'] = $user->name;
		 			$_SESSION['id_user'] = $user->id;
		 			header('location:index.php');
		 			if (isset($_SESSION['user_error'])) {
		 				unset($_SESSION['user_error']);
		 			}
		 			if(isset($_SESSION['chua_dang_nhap'])){
		 				unset($_SESSION['chua_dang_nhap']);
		 			}

	 			}
	 			
	 		}
	 		else{
	 			$_SESSION['user_error'] = 'Sai thông tin';
	 			header('location:dangnhap.php');
	 		}
	 	}
	 	function dangxuat(){
			session_destroy();
			header("location:index.php");
		}
	 } 
?>