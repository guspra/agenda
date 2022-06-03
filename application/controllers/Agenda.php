<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	public function index()
	{
		$ceks 	 = $this->session->userdata('username');

		if(!isset($ceks)) {
			redirect('web/login');
		} else {
			redirect('dashboard');
		}

	}

	public function v($aksi='',$id='')
	{
		$id = hashids_decrypt($id);
		$ceks 	 = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('level');

		if(!isset($ceks)) {
			redirect('web/login');
		}

		date_default_timezone_set('Asia/Singapore');
		$today = date('Y-m-d');

		$data['agenda'] = $this->Guzzle_model->getAllAgenda;
		
		if ($aksi == 't') {
			$nama = $this->input->post('nama');
			$tanggal = $this->input->post('tanggal');
			$waktu = $this->input->post('waktu');
			$tempat = $this->input->post('tempat');
			$peserta = $this->input->post('peserta');
			$pakaian = $this->input->post('pakaian');
			$deskripsi = $this->input->post('deskripsi');

			
			$tanggal_convert = date('Y-m-d', strtotime($tanggal));
			
			$pesan = '';
			$simpan = 'y';

			if ($simpan == 'y') {
			$data = array(
				'nama'		=> $nama,
				'tanggal'	=> $tanggal_convert,
				'waktu'		=> $waktu,
				'tempat'	=> $tempat,
				'peserta'	=> $peserta,
				'pakaian'	=> $pakaian,
				'deskripsi'	=> $deskripsi
			);

			$this->Guzzle_model->createAgenda($data);
				
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Sukses!</strong> Berhasil disimpan.
					</div>
				<br>'
				);
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
			}
			redirect('dashboard');

		} elseif ($aksi == 'd') {
		} elseif ($aksi == 'e') {
			$id_agenda = $this->input->post('id_agenda');
			$nama = $this->input->post('nama');
			$tanggal = $this->input->post('tanggal');
			$waktu = $this->input->post('waktu');
			$tempat = $this->input->post('tempat');
			$peserta = $this->input->post('peserta');
			$pakaian = $this->input->post('pakaian');
			$deskripsi = $this->input->post('deskripsi');

			
			$tanggal_convert = date('Y-m-d', strtotime($tanggal));
			
			$pesan = '';
			$simpan = 'y';
			
			if ($simpan == 'y') {
			$data = array(
				'nama'		=> $nama,
				'tanggal'	=> $tanggal_convert,
				'waktu'		=> $waktu,
				'tempat'	=> $tempat,
				'peserta'	=> $peserta,
				'pakaian'	=> $pakaian,
				'deskripsi'	=> $deskripsi
			);


			$this->Guzzle_model->updateAgenda($id_agenda, $data);
				
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Sukses!</strong> Berhasil disimpan.
					</div>
				<br>'
				);
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
			}
			redirect('dashboard');
		} elseif ($aksi == 'h') {
			$id_agenda = $this->input->post('id_agenda');
			$cek_data = $this->Guzzle_model->getAgendaById($id_agenda);

			if ($cek_data == null) {redirect('404');} else {
				$this->Guzzle_model->deleteAgenda($id_agenda);
			}
			

			$this->session->set_flashdata('msg',
				'
				<div class="alert alert-success alert-dismissible" role="alert">
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						 <span aria-hidden="true">&times;</span>
					 </button>
					 <strong>Sukses!</strong> Berhasil dihapus.
				</div>
				<br>'
			);
			redirect('dashboard');
		}else{
			$p = "index";
			$data['judul_web'] 	  = "CHECKLIST KEBERSIHAN RUANGAN";
		}

		$this->load->view('header', $data);
		$this->load->view("agenda/$p", $data);
		$this->load->view('footer');

		
			
	}

}