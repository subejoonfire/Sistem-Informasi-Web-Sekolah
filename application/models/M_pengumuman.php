<?php
class M_pengumuman extends CI_Model{

	function get_all_pengumuman(){
		$hsl=$this->db->query("SELECT pengumuman. *,admin.nama_admin, DATE_FORMAT(tanggal_pengumuman,'%d/%m/%Y') AS tanggal FROM pengumuman JOIN admin ON admin.id_admin = pengumuman.id_admin ORDER BY pengumuman.id_pengumuman DESC");
		return $hsl;
	}
	function simpan_pengumuman($judul,$deskripsi,$user_id,$detail){
		$hsl=$this->db->query("INSERT INTO pengumuman(judul_pengumuman,deskripsi_pengumuman,id_admin,detail_pengumuman) VALUES ('$judul','$deskripsi','$user_id','$detail')");
		return $hsl;
	}
	function update_pengumuman($kode,$judul,$deskripsi,$user_id,$detail){
		$hsl=$this->db->query("UPDATE pengumuman SET judul_pengumuman='$judul',deskripsi_pengumuman='$deskripsi',id_admin='$user_id',detail_pengumuman='$detail' WHERE id_pengumuman='$kode'");
		return $hsl;
	}
	function hapus_pengumuman($kode){
		$hsl=$this->db->query("DELETE FROM pengumuman WHERE id_pengumuman='$kode'");
		return $hsl;
	}

	//Front-end
	function get_pengumuman_home(){
		$hsl=$this->db->query("SELECT pengumuman. *,admin.nama_admin, DATE_FORMAT(tanggal_pengumuman,'%d/%m/%Y') AS tanggal FROM pengumuman JOIN admin ON admin.id_admin = pengumuman.id_admin ORDER BY pengumuman.id_pengumuman DESC");
		return $hsl;
	}

	function pengumuman(){
		$hsl=$this->db->query("SELECT pengumuman. *,admin.nama_admin, DATE_FORMAT(tanggal_pengumuman,'%d/%m/%Y') AS tanggal FROM pengumuman JOIN admin ON admin.id_admin = pengumuman.id_admin ORDER BY pengumuman.id_pengumuman DESC");
		return $hsl;
	}

	function get_pengumuman_by_kode($kode){
		$hsl = $this->db->query("SELECT pengumuman. *,admin.nama_admin, DATE_FORMAT(tanggal_pengumuman,'%d/%m/%Y') AS tanggal FROM pengumuman JOIN admin ON admin.id_admin = pengumuman.id_admin WHERE pengumuman.id_pengumuman DESC='$kode'");
		return $hsl;
	}
	
	function pengumuman_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT pengumuman. *,admin.nama_admin, DATE_FORMAT(tanggal_pengumuman,'%d/%m/%Y') AS tanggal FROM pengumuman JOIN admin ON admin.id_admin = pengumuman.id_admin ORDER BY pengumuman.id_pengumuman DESC limit $offset,$limit");
		return $hsl;
	}


}
