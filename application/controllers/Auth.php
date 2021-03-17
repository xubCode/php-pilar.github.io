<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
				'required' => 'Email wajib diisi!',
				'valid_email' => 'Email harus benar!'
			]);
		$this->form_validation->set_rules('pw', 'Password', 'trim|required|min_length[3]', [
				'required' => 'Password wajib diisi!',
				'min_length' => 'Password terlalu pendek!'
			]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'PILAR || Login';
			$this->load->view('template/authHeader', $data);
			$this->load->view('auth/login');
			$this->load->view('template/authFooter');
		} else {
			$this->_login();
		}
	}
	// login
	private function _login()
	{
		$post = $this->input->post();


		$user = $this->db->get_where('user', ['email' => $post['email']])->row_array();
		
		
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($post['pw'], $user['password'])) {
					if ($user['ver_email'] == 1) {
						$email = $user['email'];
						$data = [
							'email' => $email,
							'nama' => $user['nama'],
							'id_role' => $user['id_role'],
							'id' => $user['id']							
						];
						$this->session->set_userdata($data);

						if ($user['id_role'] == 1) {
							redirect('dashboard');
						} elseif ($user['id_role'] == 2) {
							echo "ini Administrator";
						} else {
							redirect('home');
						}
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun belum diverifikasi!</div>');
						redirect('auth');	
					}				
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun Belum diaktifasi!. Silahkan tunggu</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Akun ini belum terdaftar, Silahkan daftar!</div>');
			redirect('auth');
		}
	}
	
	// register
	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
			'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'valid_email' => 'Email harus benar!',
			'is_unique' => 'Email sudah digunakan!',
			'required' => 'Email wajib diisi!'
		]);
		$this->form_validation->set_rules('pw', 'Password', 'required|trim|min_length[6]|matches[pw2]',[
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek',
			'required' => 'Password wajib diisi'
		]);
		$this->form_validation->set_rules('pw2', 'Password', 'required|trim|matches[pw]',[
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Password wajib diisi'
		]);
		if( $this->form_validation->run() == false ) {
			$data['judul'] = 'PILAR || Registrasi';
			$this->load->view('template/authHeader', $data);
			$this->load->view('auth/register');
			$this->load->view('template/authFooter');
		}else{		    		   		    
			$email = $this->input->post('email', true);
			// siapkan id
			$string = 'AN';
			$id = $string . mt_rand(100000000, 999999999);
			
			
			$this->load->model('AdmModel');
			$aktivator = $this->AdmModel->get_random_limit_one();
	
			$data = [
				'id' => $id,
				'id_role' => 3,
				'nama' => htmlspecialchars($this->input->post('nama', true)),				
				'email' => htmlspecialchars($email),
				'password' => password_hash($this->input->post('pw'), PASSWORD_DEFAULT),					
				'is_active' => 1,
				'ver_email' => 1,
				'date_created' => date('Y-m-d'),				
				'aktivator' => $aktivator['id_adm']
			];
            
			// siapkan token
			// $token = base64_encode(random_bytes(32));
			// $user_token = [
			// 	'email' => $email,
			// 	'token' => $token,
			// 	'date_created' => time()
			// ];

			$this->db->insert('user', $data);
			// $this->db->insert('user_token', $user_token);
			// kirim email
			// $this->_sendEmail($token, 'verifikasi');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda telah dibuat. Silahkan tunggu untuk aktivasi dan silahkan verifikasi akun anda, paling lambat 1 x 24 jam.</div>');
			redirect('auth');
		}
	}
	// send email verifikasi

	private function _sendEmail($token, $type)
	{
		// buat konfigurasi
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'dummyakun0@gmail.com',
			'smtp_pass' => 'dummy#123',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];
		// panggil library email
		$this->load->library('email', $config);
		// proses kirim email
		$this->email->from('dummybass90@gmail.com', 'Dummy Bass');
		$this->email->to($this->input->post('email'));

		if ($type == 'verifikasi') {
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik Tautan ini untuk memverifikasi akun anda : <a href="'. base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');
		} else if ($type == 'lupa_pw') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik Tautan ini untuk reset password anda : <a href="'. base_url() . 'auth/resetpw?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		// jika email berhasil dikirim
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
	// verifikasi dari link email
	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		// ambil user berdasarkan data di atas
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('ver_email', 1);
					$this->db->where('email', $email);	
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .'sudah berhasil diverifikasi! Silahkan login.</div>');
					redirect('auth');
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi akun gagal! token hangus.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi akun gagal! salah token.</div>');
				redirect('auth');	
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi akun gagal! salah email.</div>');
			redirect('auth');
		}
	}

	public function lupaPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'valid_email' => 'Email harus benar!',			
			'required' => 'Email wajib diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'LPK MIM || Lupa Password';
			$this->load->view('template/authHeader', $data);
			$this->load->view('auth/lupa_pw');
			$this->load->view('template/authFooter');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', [
				'email' => $email,
				'aktif' => 1
			])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'lupa_pw');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password!</div>');
				redirect('auth/lupaPassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum diaktifasi atau belum diverifikasi</div>');
				redirect('auth/lupaPassword');
			}
		}
	}

	public function resetpw()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubahPassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password gagal! salah token.</div>');
				redirect('auth');	
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! salah email.</div>');
			redirect('auth');
		}
	}

	public function ubahPassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('pw1', 'Password', 'trim|required|min_length[6]|matches[pw2]', [
			'required' => 'Password wajib diisi!',
			'min_length' => 'Password terlalu pendek!',			
			'matches' => 'Password tidak cocok!'
		]);
		$this->form_validation->set_rules('pw2', 'Ulangi Password', 'trim|required|min_length[6]|matches[pw1]', [
			'required' => 'Password wajib diisi!',
			'min_length' => 'Password terlalu pendek!',			
			'matches' => 'Password tidak cocok!'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'LPK MIM || Ubah Password';
			$this->load->view('template/authHeader', $data);
			$this->load->view('auth/ubah_pw');
			$this->load->view('template/authFooter');
		} else {
			$pw = password_hash($this->input->post('pw1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('pw', $pw);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah berhasil diubah! Silahkan login.</div>');
			redirect('auth');
		}
	}

	// logout
	public function logout($id)
	{		
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id_role');
		$this->session->unset_userdata('id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
		redirect('auth');
	}

}
