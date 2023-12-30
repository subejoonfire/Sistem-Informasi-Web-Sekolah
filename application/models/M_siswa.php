<?php 
class M_siswa extends CI_Model{

	function get_all_siswa(){
		$hsl=$this->db->query("SELECT * FROM siswa JOIN kelas ON kelas.id_kelas=siswa.id_kelas ORDER BY siswa.id_siswa DESC");
		return $hsl;
	}

	function simpan_siswa($nis,$nama,$jenkel,$kelas,$photo){
		$hsl=$this->db->query("INSERT INTO siswa (nis_siswa,nama_siswa,jenkel_siswa,id_kelas,foto_siswa) VALUES ('$nis','$nama','$jenkel','$kelas','$photo')");
		return $hsl;
	}
	function simpan_siswa_tanpa_img($nis,$nama,$jenkel,$kelas){
		$hsl=$this->db->query("INSERT INTO siswa (nis_siswa,nama_siswa,jenkel_siswa,id_kelas) VALUES ('$nis','$nama','$jenkel','$kelas')");
		return $hsl;
	}

	function update_siswa($kode,$nis,$nama,$jenkel,$kelas,$photo){
		$hsl=$this->db->query("UPDATE siswa SET nis_siswa='$nis',nama_siswa='$nama',jenkel_siswa='$jenkel',id_kelas='$kelas',foto_siswa='$photo' WHERE id_siswa='$kode'");
		return $hsl;
	}
	function update_siswa_tanpa_img($kode,$nis,$nama,$jenkel,$kelas){
		$hsl=$this->db->query("UPDATE siswa SET nis_siswa='$nis',nama_siswa='$nama',jenkel_siswa='$jenkel',id_kelas='$kelas' WHERE id_siswa='$kode'");
		return $hsl;
	}
	function hapus_siswa($kode){
		$hsl=$this->db->query("DELETE FROM siswa WHERE id_siswa='$kode'");
		return $hsl;
	}

	function siswa(){
		$hsl=$this->db->query("SELECT * FROM siswa join kelas on kelas.id_kelas=siswa.id_kelas ORDER BY siswa.id_siswa DESC");
		return $hsl;
	}
	function siswa_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM siswa join kelas on kelas.id_kelas=siswa.id_kelas ORDER BY siswa.id_siswa DESC limit $offset,$limit");
		return $hsl;
	}

}