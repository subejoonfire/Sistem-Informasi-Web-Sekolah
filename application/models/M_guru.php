<?php 
class M_guru extends CI_Model{

	function get_all_guru(){
		$hsl = $this->db->query("SELECT * FROM guru JOIN kelas ON kelas.id_kelas=guru.id_kelas ORDER BY guru.id_guru DESC");
		return $hsl;
	}

	function simpan_guru($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $jabatan, $kelas, $photo){
		$hsl = $this->db->query("INSERT INTO guru (nip_guru, nama_guru, jenkel_guru, tmp_lahir_guru, tgl_lahir_guru, jabatan_guru, id_kelas, foto_guru) VALUES ('$nip', '$nama', '$jenkel', '$tmp_lahir', '$tgl_lahir', '$jabatan', 25, '$photo')");
		return $hsl;
	}
	function simpan_guru_tanpa_img($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $jabatan, $kelas){
		$hsl = $this->db->query("INSERT INTO guru (nip_guru, nama_guru, jenkel_guru, tmp_lahir_guru, tgl_lahir_guru, jabatan_guru, id_kelas) VALUES ('$nip', '$nama', '$jenkel', '$tmp_lahir', '$tgl_lahir', '$jabatan', '$kelas')");
		return $hsl;
	}


	function update_guru($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $jabatan, $kelas, $photo){
		$hsl = $this->db->query("UPDATE guru SET nip_guru='$nip', nama_guru='$nama', jenkel_guru='$jenkel', tmp_lahir_guru='$tmp_lahir', tgl_lahir_guru='$tgl_lahir', jabatan_guru='$jabatan', id_kelas='$kelas', foto_guru='$photo' WHERE id_guru='$kode'");
		return $hsl;
	}
	function update_guru_tanpa_img($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$jabatan,$kelas){
		$hsl=$this->db->query("UPDATE guru SET nip_guru='$nip',nama_guru='$nama',jenkel_guru='$jenkel',tmp_lahir_guru='$tmp_lahir',tgl_lahir_guru='$tgl_lahir',jabatan_guru='$jabatan',id_kelas='$kelas' WHERE id_guru='$kode'");
		return $hsl;
	}
	function hapus_guru($kode){
		$hsl=$this->db->query("DELETE FROM guru WHERE id_guru='$kode'");
		return $hsl;
	}

	function getJumlahData()
	{
		return $this->db->count_all('guru');
	}


	//front-end
	function guru(){
		$hsl=$this->db->query("SELECT * FROM guru JOIN kelas ON kelas.id_kelas=guru.id_kelas ORDER BY guru.id_guru DESC");
		return $hsl;
	}
	function guru_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM guru JOIN kelas ON kelas.id_kelas=guru.id_kelas ORDER BY guru.id_guru DESC limit $offset,$limit");
		return $hsl;
	}

}