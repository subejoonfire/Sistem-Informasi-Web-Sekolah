<?php
class M_galeri extends CI_Model{

	function get_all_galeri(){
		$hsl = $this->db->query("SELECT galeri. *,admin.nama_admin, DATE_FORMAT(tanggal_galeri,'%d/%m/%Y') AS tanggal FROM galeri JOIN admin ON admin.id_admin = galeri.id_admin ORDER BY galeri.id_galeri DESC");
		return $hsl;
	}
	function simpan_galeri($judul,$user_id,$gambar){
		$hsl = $this->db->query("INSERT INTO galeri(judul_galeri, id_admin, gambar_galeri) VALUES ('$judul', '$user_id', '$gambar')");
		return $hsl;
	}

	function update_galeri($kode,$judul, $user_id, $gambar){
		$hsl=$this->db->query("UPDATE galeri SET judul_galeri='$judul', id_admin='$user_id',gambar_galeri='$gambar' WHERE id_galeri='$kode'");
		return $hsl;
	}
	function update_galeri_tanpa_img($kode,$judul, $user_id){
		$hsl=$this->db->query("UPDATE galeri SET judul_galeri='$judul',id_admin='$user_id' WHERE id_galeri='$kode'");
		return $hsl;
	}
	function hapus_galeri($kode){
		$hsl=$this->db->query("DELETE from galeri WHERE id_galeri='$kode'");
		return $hsl;
	}

	//Front-End
	function get_galeri_home(){
		$hsl = $this->db->query("SELECT galeri. *,DATE_FORMAT(tanggal_galeri,'%d/%m/%Y') AS tanggal FROM galeri JOIN admin ON admin.id_admin = galeri.id_admin ORDER BY galeri.id_galeri DESC LIMIT 4");
		return $hsl;
	}
	
}