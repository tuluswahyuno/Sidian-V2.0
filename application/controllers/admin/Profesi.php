<?php 

/**
 * 
 */
class Profesi extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['profesi'] = $this->master_m->get_data('profesi')->result();
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 
        
		$data['title'] = "Data Profesi";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_profesi',$data);
		$this->load->view('template/footer');
	}

	public function tambah_profesi()
	{
		
		$profesi		= $this->input->post('profesi');
		
		$data = array(
			'nama_profesi' => $profesi,
		);

		$this->master_m->insert_data($data,'profesi');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Profesi');	
	}


	public function update_profesi()
	{
		$id					= $this->input->post('id_profesi');
		$profesi			= $this->input->post('nama_profesi');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'nama_profesi' 	=> $profesi,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_profesi' => $id
		);


		$this->master_m->update_data('profesi',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Profesi');
	}


	public function delete_profesi($id){
		$where = array('id_profesi' => $id);

		$this->master_m->delete_data($where, 'profesi');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Profesi');

		}

	}

 ?>