<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function detail(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM `halamanstatis` where lower(replace(judul,' ','-'))='$ids'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('main');
	        }
		$data['title'] = $row->judul;
		$data['record'] = $this->model_utama->page_detail($ids)->row_array();
		$this->template->load(template().'/template',template().'/view_page',$data);
	}
}
