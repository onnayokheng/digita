<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index() {
		$data = array();
		$this->db->join('user','mark.user_id = user.user_id');
		$data['q'] = $this->db->get('mark')->result_array();
		$data['page'] = 'index';
		$this->load->view('template',$data);
	}
	
	public function submit() {
		if ($this->session->userdata('user_id')=='') redirect('');
		$data = array();
		$data['q'] = $this->db->get('mark')->result_array();
		$data['page'] = 'submit';
		$this->load->view('template',$data);
	}
	
	public function process() {
		if ($this->session->userdata('user_id')=='') redirect('');
		
		//load config
		$fields = json_decode(file_get_contents('config.json'));
		
		$data = array();
		foreach ($fields as $field) {
			$data[] = array($field->name=>$this->input->post($field->name));
		}
		$this->db->insert('mark',array(
			'image_name'=>$this->input->post('image_name'),
			'user_id'=>$this->session->userdata('user_id'),
			'data'=>json_encode($data),
		));
		redirect('site/submit');
	}
	
	public function about() {
		$data = array();
		$data['page'] = 'about';
		$this->load->view('template',$data);
	}
	
	public function contact() {
		$data = array();
		$data['page'] = 'contact';
		$this->load->view('template',$data);
	}
}
