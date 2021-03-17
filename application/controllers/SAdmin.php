<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SAdmin extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    	cek();
    	$this->load->model('UserModel');
    }

	public function index()
	{
		
		$role_id = $this->session->userdata('id_role');
		if (_cekRoleSAdminAndAdm($role_id)) {
			$data['judul'] = 'PILAR || Dashboard';
								
			$this->load->view('template/userHeader', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('SAdmin/index');
			$this->load->view('template/userFooter');
		}
	}

	public function adm()
	{
		$role_id = $this->session->userdata('id_role');
		if (_cekRoleSAdmin($role_id)) {
			$data['judul'] = 'PILAR || Administrator';
			$data['adm'] = $this->UserModel->get_where_specific('id,nama,email,is_active', [
				'id_role' => 2,
				'is_active' => 1
			], 'user');

			$data['adm_non_aktif'] = $this->UserModel->get_where_specific('id,nama,email,is_active', [
				'id_role' => 2,
				'is_active' => 0
			], 'user');							

			$this->load->view('template/userHeader', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('SAdmin/adm', $data);
			$this->load->view('template/userFooter');
		}
	}

	public function add_adm()
	{
		$role_id = $this->session->userdata('id_role');
		if (_cekRoleSAdmin($role_id)) {
			// siapkan id
			$string = 'AD';
			$id = $string . mt_rand(100000000, 999999999);
			$data = [
				'id' => $id,
				'id_role' => 2,
				'nama' => htmlspecialchars(trim($this->input->post('nama', true))),				
				'email' => htmlspecialchars(trim($this->input->post('email', true))),
				'password' => password_hash(trim($this->input->post('pw')), PASSWORD_DEFAULT),			
				'is_active' => 1,
				'ver_email' => 1,
				'date_created' => date('Y')			
			];
            $adm = [
                    'id' => '',
                    'id_adm' => $id
                ];
            $this->db->insert('adm', $adm);
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Adm dengan nama '. $data['nama'] .' telah dibuat!.</div>');
			redirect('administrator');
		}
	}

	public function kill_adm()
	{
		$role_id = $this->session->userdata('id_role');
		if (_cekRoleSAdmin($role_id)) {
			$id_user = trim($this->input->post('id'));
			$nama_user = trim($this->input->post('nama'));

			$this->db->set('is_active', 0);
			$this->db->where('id',$id_user);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success">Adm dengan nama '. $nama_user .' telah dinonaktifkan!.</div>');
			redirect('administrator');
		}
	}

	public function heal_adm()
	{
		$role_id = $this->session->userdata('id_role');
		if (_cekRoleSAdmin($role_id)) {
			$id_user = trim($this->input->post('id'));
			$nama_user = trim($this->input->post('nama'));

			$this->db->set('is_active', 1);
			$this->db->where('id',$id_user);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success">Adm dengan nama '. $nama_user .' telah diaktifkan!.</div>');
			redirect('administrator');
		}
	}

}