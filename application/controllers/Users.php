<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['judul_web'] = "Dashboard";

			date_default_timezone_set('Asia/Singapore');
			$data['time_now'] = date('H:i');
			
			$data['hari_ini'] = date('Y-m-d');
			
			$data['agenda'] = $this->Guzzle_model->getAllAgenda();
			
			$data['agenda_today'] = $this->Guzzle_model->getAgendaByTanggal($data['hari_ini']);
			
			$clicked_date = $this->input->post('clicked_date');

			if ($clicked_date != null) {
				$data['clicked_date'] = $clicked_date;
				$data['agenda_selected'] = $this->Guzzle_model->getAgendaByTanggal($data['clicked_date']);
			}

			$this->load->view('header', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('footer');

					

		}
	}

	public function profile()
	{
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			= $this->Guzzle_model->getUserById($id_user);
			$data['level_users']  	= $level;
			$data['judul_web'] 		= "Profile";

			$this->load->view('header', $data);
			$this->load->view('profile', $data);
			$this->load->view('footer');
		}

		$user_list = $this->Guzzle_model->getAllUser();

		if (isset($_POST['btnupdate'])) {
			$username	 		= htmlentities(strip_tags($this->input->post('username')));
			$nama	= htmlentities(strip_tags($this->input->post('nama')));
			$whatsapp	= htmlentities(strip_tags($this->input->post('whatsapp')));
			$password  = htmlentities(strip_tags($this->input->post('password')));
			$password2 = htmlentities(strip_tags($this->input->post('password2')));

			if ($username != $ceks) {
				$cek_username = array_search($username, array_column($user_list, 'username', 'id'));
			}

			$pesan  = '';
			$update = 'yes';
			
			if ($cek_username != null) {
				$update = 'no';
				$pesan  = "Username '<b>$username</b>' sudah ada";
			} else {
				$pass_lama = $data['user']['password'];
				if ($password=='') {
					$password = $pass_lama;
				} else {
					if ($password!=$password2) {
						$update = 'no';
						$pesan  = "Password tidak cocok!";
					}
				}
			}
				

			if ($update == 'yes') {
				$data = array(
					'nama'			=> $nama,
					'whatsapp'		=> $whatsapp,
					'username' 		=> $username,
					'password' 		=> $password,
					'role' 			=> $level
				);
				$this->Guzzle_model->updateUser($id_user, $data);
					
				$this->session->has_userdata('username');
				$this->session->set_userdata('username', "$username");
				$this->session->has_userdata('nama');
				$this->session->set_userdata('nama', "$nama");

				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						 </button>
						 <strong>Sukses!</strong> Profile berhasil disimpan.
					</div>
				  <br>'
				);
				redirect('profile');
				
			}else {
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						 </button>
						 <strong>Gagal!</strong> '.$pesan.'.
					</div>
					<br>'
				);
				redirect('profile');
			}
		}
			
	}

}
