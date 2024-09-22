<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		$this->page_data = [];

		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->library('session');
		if ($this->session->userdata('userid')) {
			$cnt = $this->db->query('select p.*,u.fullname  from posts p join users u on p.userid = u.id ')->result();
			// var_dump($cnt);die;
			$this->page_data['list'] = $cnt;

			$cat = $this->db->query('select * from catagory')->result();
			$this->page_data['cat'] = $cat;
			$this->load->view('dashboard', $this->page_data);
		} else {
			redirect('login');
		}
	}

	public function view_data($id)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('id', $id);
		$res = $this->db->get()->row();
		$this->page_data['post'] = $res;

		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('post_id', $id);
		$res2 = $this->db->get()->result();
		$this->page_data['lst'] = $res2;
		$this->session->set_userdata('post_id', $id);
		// var_dump($res);die;
		// echo json_encode($res);
		$this->load->view('read_post', $this->page_data);


	}

	public function add_post()
	{

		$cnt = $this->db->query('select * from catagory')->result();
		$this->page_data['catagory'] = $cnt;
		$this->load->view('add_post', $this->page_data);
	}
	public function save_post()
	{
		$cnt = $this->db->query('select * from posts order by id desc limit 1')->result();
		print_r($cnt);
		die;

		$data = [
			"id" => $cnt + 1,
			"title" => $this->input->post('title'),
			"content" => $this->input->post('content'),
			"userid" => $this->session->userdata('userid'),
			"category" => $this->input->post('category')
		];
		// var_dump($data);die;	
		if ($this->db->insert('posts', $data)) {

			$this->session->set_flashdata('alert_type', 'success');
			$this->session->set_flashdata('alert', "Post added successfully!");
			redirect('dashboard');
		} else {
			redirect('dashboard');
		}



	}

	public function comment()
	{
		$adata = [
			"post_id" => $this->session->userdata('post_id'),
			"name" => $this->session->userdata('username'),
			"email" => $this->session->userdata('user_email'),
			"comment" => $this->input->post('comment'),
			"user_id" => $this->session->userdata('userid')
		];
		// var_dump($adata);die;
		if ($this->db->insert('comments', $adata)) {

			$this->session->set_flashdata('alert_type', 'success');
			$this->session->set_flashdata('alert', "Comment Added successfully!");
			redirect('dashboard');
		} else {
			redirect('dashboard/view_data/' . $this->session->userdata());
		}

	}

	public function delete_post($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('posts');
		$this->session->set_flashdata('alert_type', 'success');
		$this->session->set_flashdata('alert', "Post Deleted successfully!");
		redirect('dashboard');
	}

	public function update_post($id)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('id', $id);
		$res = $this->db->get()->row();
		$this->page_data['post'] = $res;
		$this->session->set_userdata('post_id', $id);
		// var_dump($res);die;
		// echo json_encode($res);
		$this->load->view('read_post', $this->page_data);
	}

	public function catagory($id)
	{

		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->library('session');

		$cnt = $this->db->query('select p.*,u.fullname  from posts p join users u on p.userid = u.id where p.category =' . $id)->result();
		$this->page_data['list'] = $cnt;
		$cat = $this->db->query('select * from catagory')->result();
		$this->page_data['cat'] = $cat;
		$this->load->view('dashboard', $this->page_data);
	}

	public function dashboard()
	{
		$this->load->view('dashboard_main');
	}

}