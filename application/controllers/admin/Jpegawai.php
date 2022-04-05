<?php 

/**
 * 
 */
class Jpegawai extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['jpegawai'] = $this->master_m->get_data('jenis_pegawai')->result();
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        
		$data['title'] = "Data Jenis Pegawai";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_jpegawai',$data);
		$this->load->view('template/footer');
	}

	public function tambah_jpegawai()
	{
		
		$jpegawai		= $this->input->post('jpegawai');
		
		$data = array(
			'jpegawai' => $jpegawai,
		);

		$this->master_m->insert_data($data,'jenis_pegawai');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Jpegawai');	
	}


	public function update_jpegawai()
	{
		$id					= $this->input->post('id_jenispegawai');
		$jpegawai			= $this->input->post('jpegawai');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'jpegawai' 	=> $jpegawai,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_jenispegawai' => $id
		);


		$this->master_m->update_data('jenis_pegawai',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Jpegawai');
	}


	public function delete_jpegawai($id){
		$where = array('id_jenispegawai' => $id);
		$this->master_m->delete_data($where, 'jenis_pegawai');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Jpegawai');

		}


	}

 ?>