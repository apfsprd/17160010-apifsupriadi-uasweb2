<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
            if($this->session->userdata('hak_akses')=="admin"){
                redirect('auth'); 
            }

	}

	public function index()
	{
        $data['titles'] = 'Beranda';
        $data['user'] = $this->db->get_where('tbl_user_17160010', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('user/index', $data);
	}
}
