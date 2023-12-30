<?php
class M_admin extends CI_Model{

	function get_all_admin(){
		$hsl=$this->db->query("SELECT admin.*,IF(jenkel_admin='L','Laki-Laki','Perempuan') AS jenkel FROM admin");
		return $hsl;	
	}

	function simpan_admin($nama,$jenkel,$username,$password,$email,$nohp,$gambar){
		$hsl=$this->db->query("INSERT INTO admin (nama_admin,jenkel_admin,username_admin,password_admin,email_admin,nohp_admin,foto_admin) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$gambar')");
		return $hsl;
	}

	function simpan_admin_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp){
		$hsl=$this->db->query("INSERT INTO admin (nama_admin,jenkel_admin,username_admin,password_admin,email_admin,nohp_admin) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp')");
		return $hsl;
	}

	//UPDATE admin //
	function update_admin_tanpa_pass($kode,$nama,$jenkel,$username,$email,$nohp,$gambar){
		$hsl=$this->db->query("UPDATE admin set nama_admin='$nama',jenkel_admin='$jenkel',username_admin='$username',email_admin='$email',nohp_admin='$nohp',foto_admin='$gambar' where id_admin='$kode'");
		return $hsl;
	}
	function update_admin($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar){
		$hsl=$this->db->query("UPDATE admin set nama_admin='$nama',jenkel_admin='$jenkel',username_admin='$username',password_admin='$password',email_admin='$email',nohp_admin='$nohp',foto_admin='$gambar' where id_admin='$kode'");
		return $hsl;
	}

	function update_admin_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$email,$nohp){
		$hsl=$this->db->query("UPDATE admin set nama_admin='$nama',jenkel_admin='$jenkel',username_admin='$username',email_admin='$email',nohp_admin='$nohp', where id_admin='$kode'");
		return $hsl;
	}
	function update_admin_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp){
		$hsl=$this->db->query("UPDATE admin set nama_admin='$nama',jenkel_admin='$jenkel',username_admin='$username',password_admin='$password',email_admin='$email',nohp_admin='$nohp', where id_admin='$kode'");
		return $hsl;
	}
	//END UPDATE admin//

	function hapus_admin($kode){
		$hsl=$this->db->query("DELETE FROM admin where id_admin='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM admin where id_admin='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE admin set password_admin=md5('$pass') where id_admin='$id'");
		return $hsl;
	}

	function get_admin_login($kode){
		$hsl=$this->db->query("SELECT * FROM admin where id_admin='$kode'");
		return $hsl;
	}


}