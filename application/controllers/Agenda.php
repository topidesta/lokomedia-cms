<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda extends CI_Controller {
	public function index(){
		$data['title'] = 'Semua Agenda';
		$jumlah= $this->model_utama->hitungagenda()->num_rows();
		$config['base_url'] = base_url().'agenda/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 7; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['agenda'] = $this->model_utama->agenda($dari, $config['per_page']);
			}else{
				redirect('agenda');
			}
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/view_agenda',$data);
	}

	public function detail(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM agenda where tema_seo='$ids' OR id_agenda='$ids'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('utama');
	        }
		$data['title'] = $row->tema;
		$data['record'] = $this->model_utama->agenda_detail($ids)->row_array();
		$this->template->load(template().'/template',template().'/view_agenda_detail',$data);
	}
}
