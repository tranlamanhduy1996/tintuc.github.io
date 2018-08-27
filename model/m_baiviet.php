<?php
	include ('database.php');
	class M_baiviet extends database
	{
		
		function getid($id) {
    		$sql = "SELECT * FROM tintuc WHERE id='$id'";
    		$result=$this->setQuery($sql);
    		return $result;
}
		function thembaiviet($tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin){
			$sql="INSERT INTO `tintuc`(`TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `idLoaiTin`) VALUES (?,?,?,?,?,?)";
			$this->setQuery($sql);
			$result = $this->execute(array($tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin));
			if($result){
				return $this->getLastId();
			}
			else{
				return false;
			}
		}
		function suabaiviet($id,$tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin){
			$sql="UPDATE tintuc SET TieuDe = '$tieude',TieuDeKhongDau='$tieudekhongdau',TomTat='$tomtat',NoiDung='$noidung',Hinh='$hinh',idLoaiTin='$idloaitin' WHERE id='$id'";
			$this->setQuery($sql);
			$result = $this->execute(array($tieude,$tieudekhongdau,$tomtat,$noidung,$hinh,$idloaitin));
			
		}
		function xoabaiviet($id){
		    $sql = 
		    $sql1 = "DELETE tintuc,comments FROM tintuc,comments WHERE tintuc.id = comments.idTinTuc  AND tintuc.id = '$id'";
		    $this->setQuery($sql1,$sql);
		    $result = $this->execute($sql1,$sql);
		}
		function getTintuc( $vitri=-1, $limit=-1){
			$sql="SELECT * FROM tintuc";
			if ($vitri>-1 && $limit>1) {
				$sql.="   limit $vitri,$limit";
			}

			$this->setQuery($sql);
			return $this->loadAllRows(array($sql));
		}
    }
 ?>