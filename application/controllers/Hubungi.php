<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi extends CI_Controller {
	public function index(){
		if (isset($_POST['submit'])){
			if ($this->input->post() && (strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))) {
				$this->model_utama->kirim_Pesan();
				echo $this->session->set_flashdata('message', '<div class="alert alert-info">Pesan anda berhasil terkirim, dan akan segera kami respon...!</div>');
				redirect('Hubungi');
			}
		}else{
			$data['title'] = 'Hubungi Kami';
			$this->load->helper('captcha');
			$vals = array(
	            'img_path'	 => './captcha/',
	            'img_url'	 => base_url().'captcha/',
	            'font_path' => 'asset/Tahoma.ttf',
	            'font_size'     => 16,
	            'img_width'	 => '100',
	            'img_height' => 30,
	            'border' => 0, 
	            'word_length'   => 5,
	            'expiration' => 7200
	        );

	        $cap = create_captcha($vals);
	        $data['image'] = $cap['image'];
	        $this->session->set_userdata('mycaptcha', $cap['word']);
			$this->template->load(template().'/template',template().'/view_hubungi',$data);
		}
	}
}
