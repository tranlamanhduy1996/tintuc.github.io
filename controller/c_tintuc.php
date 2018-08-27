<?php
include ('model/m_tintuc.php');
include ("model/pager.php");
	class C_tintuc
	{
		
		public function index()
		{
			$m_tintuc = new M_tintuc();
			$slide = $m_tintuc->getSlide();
			$menu=$m_tintuc->getMenu();

			return array('slide'=>$slide,'menu'=>$menu);
		}
		function loaitin(){
			$id_loai= $_GET["id_loai"];
			$m_tintuc = new M_tintuc();
			$alias = $m_tintuc ->getAliasLoaitin($id_loai);
			$danhmuctin = $m_tintuc -> getTintucByIdLoai($id_loai);
			//thanh phân trang
			$trang_hientai = (isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($danhmuctin),$trang_hientai,5,5);
			$paginationHTML = $pagination ->showPagination();
			$limit = $pagination ->get_nItemOnPage();
			$vitri=($trang_hientai-1)*$limit;
			$danhmuctin = $m_tintuc ->getTintucByIdLoai($id_loai, $vitri, $limit);

			$menu=$m_tintuc->getMenu();
			$title = $m_tintuc ->getTitlebyId($id_loai);
			return array('danhmuctin'=>$danhmuctin,'menu'=>$menu,'title'=>$title,'thanh_phantrang'=>$paginationHTML,'alias'=>$alias);
		}
		function chitietTin(){
			$id_tin = $_GET["id_tin"];
			$alias = $_GET["loai_tin"];
			$m_tintuc = new M_tintuc();
			$chitietTin = $m_tintuc ->getChitietTin($id_tin);
			$comments = $m_tintuc ->getComments($id_tin);
			$relatednews = $m_tintuc->getRelatedNews($alias);

			return array('chitietTin'=>$chitietTin,'comments'=>$comments,"relatednews"=>$relatednews);
		}
		function themBinhluan($id_user,$id_tin,$noidung){
			$m_tintuc = new M_tintuc();
			$binhluan = $m_tintuc ->addComments($id_user,$id_tin,$noidung);
			header('Location'.$_SERVER['HTTP_REFERER']);
			
		}
		function timkiem($key){
			$m_tintuc = new M_tintuc();
			$tin = $m_tintuc->search($key);
			return $tin;
		}
	}
 ?>