<?php 

/**
 * 
 */
class Unitkerja extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['unitkerja'] = $this->master_m->get_data('unitkerja')->result();
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 
        
		
		$data['title'] = "Data Unit Kerja";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_unitkerja',$data);
		$this->load->view('template/footer');
	}

	public function tambah_unitkerja()
	{
		
		$nama_unitkerja		= $this->input->post('nama_unitkerja');
		
		$data = array(
			'nama_unitkerja' => $nama_unitkerja,
		);

		$this->master_m->insert_data($data,'unitkerja');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Unitkerja');	
	}


	public function update_unitkerja()
	{
		$id					= $this->input->post('id_unitkerja');
		$nama_unitkerja		= $this->input->post('nama_unitkerja');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'nama_unitkerja' 	=> $nama_unitkerja,
			'update_at' 		=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_unitkerja' => $id
		);


		$this->master_m->update_data('unitkerja',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Unitkerja');
	}


	public function delete_unitkerja($id){
		$where = array('id_unitkerja' => $id);

		$this->master_m->delete_data($where, 'unitkerja');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Unitkerja');

		}


	public function select2unitkerja()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count($q);
        $data = $this->petugas_data($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_unitkerja, 'text' => $row->nama_unitkerja];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count($q = null)
    {
        return $this->db->like('nama_unitkerja', $q)->get('unitkerja')->num_rows();
    }

    private function petugas_data($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('nama_unitkerja', $q)
            ->get('unitkerja')
            ->result();
    }


	}

 ?>