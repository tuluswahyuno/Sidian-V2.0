<?php 

/**
 * 
 */
class Jenisberkas extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['jenisberkas'] = $this->master_m->get_data('jenis_berkas')->result();
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();
        
		$data['title'] = "Data Jenis Berkas";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_jenisberkas',$data);
		$this->load->view('template/footer');
	}

	public function tambah_jenisberkas()
	{
		
		$jenis_berkas		= $this->input->post('jenis_berkas');
		
		$data = array(
			'jenis_berkas' => $jenis_berkas,
		);

		$this->master_m->insert_data($data,'jenis_berkas');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Jenisberkas');	
	}


	public function update_jenisberkas()
	{
		$id					= $this->input->post('id_jenisberkas');
		$jenis_berkas		= $this->input->post('jenis_berkas');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'jenis_berkas' 	=> $jenis_berkas,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_jenisberkas' => $id
		);


		$this->master_m->update_data('jenis_berkas',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Jenisberkas');
	}


	public function delete_jenisberkas($id){
		$where = array('id_jenisberkas' => $id);

		$this->master_m->delete_data($where, 'jenis_berkas');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Jenisberkas');

		}

	}

 ?>