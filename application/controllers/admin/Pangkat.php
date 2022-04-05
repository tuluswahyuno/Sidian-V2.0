<?php 

/**
 * 
 */
class Pangkat extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['pangkat'] = $this->master_m->get_data('pangkat')->result();
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        
		$data['title'] = "Data Pangkat";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_pangkat',$data);
		$this->load->view('template/footer');
	}

	public function tambah_pangkat()
	{
		
		$pangkat		= $this->input->post('pangkat');
		
		$data = array(
			'nama_pangkat' => $pangkat,
		);

		$this->master_m->insert_data($data,'pangkat');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Pangkat');	
	}


	public function update_pangkat()
	{
		$id					= $this->input->post('id_masterpangkat');
		$pangkat			= $this->input->post('nama_pangkat');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'nama_pangkat' 	=> $pangkat,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_masterpangkat' => $id
		);


		$this->master_m->update_data('pangkat',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Pangkat');
	}


	public function delete_pangkat($id){
		$where = array('id_masterpangkat' => $id);
		$this->master_m->delete_data($where, 'pangkat');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Pangkat');

		}


	}

 ?>