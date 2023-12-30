<?php
class M_berita extends CI_Model{

	function get_all_berita(){
		$hsl=$this->db->query("SELECT berita. *,admin.nama_admin, DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita JOIN admin ON admin.id_admin = berita.id_admin ORDER BY berita.id_berita DESC");
		return $hsl;
	}
	function simpan_berita($judul, $isi, $user_id, $gambar, $detail){
		$hsl = $this->db->query("INSERT INTO berita(judul_berita, isi_berita, id_admin, gambar_berita, detail_berita) VALUES ('$judul','$isi','$user_id','$gambar','$detail')");
		return $hsl;
	}

	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT berita. *,admin.nama_admin, DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita JOIN admin ON admin.id_admin = berita.id_admin WHERE berita.id_berita='$kode'");
		return $hsl;
	}
	function update_berita($id_berita,$judul,$isi,$user_id,$gambar,$detail){
		$hsl=$this->db->query("UPDATE berita SET judul_berita='$judul',isi_berita='$isi',gambar_berita='$gambar',id_admin='$user_id',detail_berita='$detail' WHERE id_berita='$id_berita'");
		return $hsl;
	}
	function update_berita_tanpa_img($id_berita,$judul,$isi, $user_id, $detail){
		$hsl=$this->db->query("UPDATE berita SET judul_berita='$judul',isi_berita='$isi',id_admin='$user_id',detail_berita='$detail' WHERE id_berita='$id_berita'");
		return $hsl;
	}
	function hapus_berita($kode){
		$hsl=$this->db->query("DELETE FROM berita WHERE id_berita='$kode'");
		return $hsl;
	}

	//Front-End
	function get_berita_home(){
		$hsl=$this->db->query("SELECT berita. *,admin.nama_admin, DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita JOIN admin ON admin.id_admin = berita.id_admin ORDER BY berita.id_berita DESC limit 4");
		return $hsl;
	}

	function berita_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT berita. *,admin.nama_admin, DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita JOIN admin ON admin.id_admin = berita.id_admin ORDER BY berita.id_berita DESC limit $offset,$limit");
		return $hsl;
	}

	function berita(){
		$hsl=$this->db->query("SELECT berita. *,admin.nama_admin, DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita JOIN admin ON admin.id_admin = berita.id_admin ORDER BY berita.id_berita DESC");
		return $hsl;
	}

	function cari_berita($keyword){
		$hsl=$this->db->query("SELECT berita. *,admin.nama_admin, DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita JOIN admin ON admin.id_admin = berita.id_admin WHERE judul_berita LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

}
