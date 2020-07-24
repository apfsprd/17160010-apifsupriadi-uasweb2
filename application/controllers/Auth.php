<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['titles'] = 'Login';

		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
        $this->load->view('template/header', $data);
        $this->load->view('loginpage/login');
		$this->load->view('template/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// var_dump($password);
			// var_dump($username);
			// die;

			$user = $this->db->get_where('tbl_user_17160010', ['username' => $username])->row_array();

			if ($user) {
				if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'hak_akses' => $user['hak_akses']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['hak_akses'] == "admin") {
                        redirect('admin');
                    } else {
                        redirect('user');
					}
				} else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            	redirect('auth');
			}
		}
	}
}