<?php 

/**
 * 
 */
class Pendidikan extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['pendidikan'] = $this->master_m->get_data('pendidikan')->result();
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        
		$data['title'] = "Data Pendidikan";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_pendidikan',$data);
		$this->load->view('template/footer');
	}

	public function tambah_pendidikan()
	{
		
		$pendidikan		= $this->input->post('pendidikan');
		
		$data = array(
			'pendidikan' => $pendidikan,
		);

		$this->master_m->insert_data($data,'pendidikan');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Pendidikan');	
	}


	public function update_pendidikan()
	{
		$id					= $this->input->post('id_masterpendidikan');
		$pendidikan			= $this->input->post('pendidikan');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'pendidikan' 	=> $pendidikan,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_masterpendidikan' => $id
		);


		$this->master_m->update_data('pendidikan',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Pendidikan');
	}


	public function delete_pendidikan($id){
		$where = array('id_masterpendidikan' => $id);
		
		$this->master_m->delete_data($where, 'pendidikan');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Pendidikan');

		}


	}

 ?>