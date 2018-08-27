<?php
	include ('model/m_baiviet.php');
	include ('model/pager.php');
	 class C_baiviet
	 {
	 	function thembaiviet($tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin){
	 		$m_baiviet= new M_baiviet();
	 		$id_baiviet = $m_baiviet->thembaiviet($tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin);
	 		if($id_baiviet>0){
	 			$_SESSION['sucess']="Thêm bài thành công";
	 			header('location:index.php');
	 			if(isset($_SESSION['error'])){
	 				unset($_SESSION['error']);
	 			}
	 		}
	 		else{
	 			$_SESSION['error']='Thêm bài không thành công';
	 			header('location:admin.php');
	 		}
	 	}
	 	function suabaiviet($id,$tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin){
	 		$m_baiviet= new M_baiviet();
	 		$id_baiviet = $m_baiviet->suabaiviet($id,$tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin);
	 		if($id_baiviet>0){
	 			$_SESSION['sucess']="Sửa bài thành công";
	 			header('location:admin.php');
	 			if(isset($_SESSION['error'])){
	 				unset($_SESSION['error']);
	 			}
	 		}
	 		else{
	 			$_SESSION['error']='Sửa bài không thành công';
	 			header('location:admin.php');
	 		}
	 	}
	 	function xoabaiviet($id){
	 		$m_baiviet= new M_baiviet();
	 		$id_baiviet = $m_baiviet->xoabaiviet($id);
	 		if($id_baiviet>0){
	 			$_SESSION['sucess']="Xóa bài thành công";
	 			header('location:admin.php');
	 			if(isset($_SESSION['error'])){
	 				unset($_SESSION['error']);
	 			}
	 		}
	 		else{
	 			$_SESSION['error']='Xóa bài không thành công';
	 			header('location:admin.php');
	 		}
	 	}
	 	function loaitin(){
			$m_baiviet = new M_baiviet();
			$tatcatin = $m_baiviet -> getTintuc($sql);
			//thanh phân trang
			$trang_hientai = (isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($tatcatin),$trang_hientai,1,5);
			$paginationHTML = $pagination ->showPagination();
			$limit = $pagination ->get_nItemOnPage();
			$vitri=($trang_hientai-1)*$limit;
			$tatcatin = $m_baiviet ->getTintuc( $vitri, $limit);
			return array('tatcatin'=>$tatcatin,'thanh_phantrang'=>$paginationHTML);
		}
	 } 
?>