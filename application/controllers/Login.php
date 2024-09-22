<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		$this->load->library('session');
		$this->load->view('login');
	}
	public function signin()
	{
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->helper('url');


		$uname = $this->input->post('email');
		$psd = $this->input->post('password');
		$result = $this->user_model->signin($uname, $psd);
		// var_dump($result);die;
		if ($result != "01") {
			$this->session->set_userdata('userid', $result->id);
			$this->session->set_userdata('username', $result->username);
			$this->session->set_userdata('user_email', $result->email);


			redirect('dashboard/dashboard');

		} else {
			$this->session->set_flashdata('alert_type', 'danger');
			$this->session->set_flashdata('alert', "Please try again");
			redirect("login");
		}
	}
	public function register()
	{
		$this->load->model('user_model');
		$this->load->library('session');

		if ($this->input->post('email')) {
			$cnt = $this->db->query('select count(*) cnt from users')->result()[0]->cnt;
			$arr = [
				'id' => $cnt + 1,
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password')),
				'fullname' => $this->input->post('name'),
				'username' => $this->input->post('uname'),

			];
			//  $this->input->post('password');
			$d = $this->user_model->register($arr);
			if ($d == '1') {
				$this->session->set_flashdata('alert_type', 'success');
				$this->session->set_flashdata('alert', 'User Added successfully');
				// $this->load->view('register');
				echo '00';
			} else {
				$this->session->set_flashdata('alert_type', 'danger');
				$this->session->set_flashdata('alert', $d);

				echo "Please Try Again";
				// $this->load->view('register');
			}
		} else {
			$this->load->view('register');
		}
	}

}
