<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if ($this->session->userdata('user_id')!='') redirect('');
		if ($this->input->post('username')=='') {
			$data = array();
			$data['page'] = 'login';
			$this->load->view('template',$data);
		} else {
			$this->db->where('username',$this->input->post('username'));
			$this->db->where('password',md5($this->input->post('password')));
			$res = $this->db->get('user')->row();
			if ($res!=null) {
				$this->session->set_userdata('user_id',$res->user_id);
				$this->session->set_userdata('username',$res->username);
				redirect('');
			} else {
				$this->session->set_flashdata('msg','Wrong username or password');
				redirect('auth');
			}
		}
	}
	
	public function register() {
		if ($this->session->userdata('user_id')!='') redirect('');
		if ($this->input->post('username')=='') {
			$data = array();
			$data['page'] = 'register';
			$this->load->view('template',$data);
		} else {
			$this->db->where('username',$this->input->post('username'));
			$res = $this->db->get('user')->row();
			if ($res==null) {
				$this->db->insert('user',array(
					'user_id'=>md5($this->input->post('username')),
					'username'=>$this->input->post('username'),
					'password'=>md5($this->input->post('password')),
					'role'=>'member'
				));
				$msg = 'Registration success';
			} else $msg = 'Email/Username exists';
			$this->session->set_flashdata('msg',$msg);
			redirect('auth/register');
		}
	}
	
	public function reset() {
		if ($this->session->userdata('user_id')!='') redirect('');
		if ($this->input->post('username')=='') {
			$data = array();
			$data['page'] = 'reset';
			$this->load->view('template',$data);
		} else {
			$this->db->where('username',$this->input->post('username'));
			$res = $this->db->get('user')->row();
			if ($res!=null) {
				if (md5($this->input->post('oldpassword'))==$res->password) {
					$this->db->where('username',$this->input->post('username'));
					$this->db->update('user',array(
						'password'=>md5($this->input->post('password'))
					));
					$msg = 'Password reset success';
				} else $msg = 'Wrong password';
			} else $msg = 'Email/Username not found';
			$this->session->set_flashdata('msg',$msg);
			redirect('auth/reset');
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}

}
