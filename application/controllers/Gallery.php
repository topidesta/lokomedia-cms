<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends CI_Controller {
	public function index(){
		$data['title'] = 'Album Foto';
		$jumlah= $this->model_utama->hitungalbum()->num_rows();
		$config['base_url'] = base_url().'gallery/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 21; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}
			if (is_numeric($dari)) {
				$data['album'] = $this->model_utama->album($dari, $config['per_page']);
			}else{
				redirect('gallery');
			}
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/view_gallery',$data);
	}

	public function detail(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM album where album_seo='".$this->db->escape_str($ids)."'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('gallery');
	        }

		$data['title'] = "Gallery : ".$row->jdl_album;
		$jumlah= $this->model_utama->hitungfoto($row->id_album)->num_rows();
		$config['base_url'] = base_url().'gallery/detail/'.$row->album_seo;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 21; 	
			if ($this->uri->segment('4')!=''){
				$dari = $this->uri->segment('4');
			}else{
				$dari = 0;
			}
			if (is_numeric($dari)) {
				$data['gallery'] = $this->model_utama->gallery($row->id_album, $dari, $config['per_page']);
			}else{
				redirect('gallery');
			}
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/view_gallery_detail',$data);
	}
}
