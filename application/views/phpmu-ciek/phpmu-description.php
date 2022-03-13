<?php
if ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail'){
	$row = $this->db->query("SELECT isi_berita FROM berita where judul_seo='".$this->uri->segment(3)."'")->row_array();
	$isi_berita = strip_tags($row['isi_berita']); 
    $description = substr($isi_berita,0,360); 
    $description = substr($isi_berita,0,strrpos($description," "));
	echo "$description";
}else{
	$row = $this->db->query("SELECT meta_deskripsi FROM identitas")->row_array();
	echo "$row[meta_deskripsi]";
}