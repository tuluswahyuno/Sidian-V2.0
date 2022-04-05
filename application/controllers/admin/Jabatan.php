<?php 

/**
 * 
 */
class Jabatan extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        

		$data['jabatan'] = $this->master_m->get_data('jabatan')->result();
		$data['title'] = "Data Jabatan PNS";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_jabatan',$data);
		$this->load->view('template/footer');
	}


	public function jabatan_nonpns()
	{
		check_not_login();

		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();

		$data['jabatan'] = $this->master_m->get_data('jabatan_nonpns')->result();
		$data['title'] = "Data Jabatan Non PNS";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_jabatan_nonpns',$data);
		$this->load->view('template/footer');
	}

	public function tambah_jabatan()
	{
		
		$jabatan		= $this->input->post('nama_jabatan');
		
		$data = array(
			'nama_jabatan' => $jabatan,
		);

		$this->master_m->insert_data($data,'jabatan');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Jabatan');	
	}

	public function tambah_jabatan_nonpns()
	{
		
		$jabatan		= $this->input->post('nama_jabatan');
		
		$data = array(
			'nama_jabatan' => $jabatan,
		);

		$this->master_m->insert_data($data,'jabatan_nonpns');
		$this->session->set_flashdata('flash', 'Ditambahkan');
		redirect('admin/Jabatan/jabatan_nonpns');	
	}


	public function update_jabatan()
	{
		$id					= $this->input->post('id_masterjabatan');
		$jabatan			= $this->input->post('nama_jabatan');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'nama_jabatan' 	=> $jabatan,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_masterjabatan' => $id
		);


		$this->master_m->update_data('jabatan',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Jabatan');
	}


	public function update_jabatan_nonpns()
	{
		$id					= $this->input->post('id_jabatannonpns');
		$jabatan			= $this->input->post('nama_jabatan');
		$update_at 			= date('Y-m-d H:i:s');

		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'nama_jabatan' 	=> $jabatan,
			'update_at' 	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_jabatannonpns' => $id
		);


		$this->master_m->update_data('jabatan_nonpns',$data,$where);
		$this->session->set_flashdata('flash', 'Diupdate');
		redirect('admin/Jabatan/jabatan_nonpns');
	}


	public function delete_jabatan($id){
		$where = array('id_masterjabatan' => $id);
		$this->master_m->delete_data($where, 'jabatan');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/Jabatan');

		}



	public function select2jabatan()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count($q);
        $data = $this->petugas_data($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_masterjabatan, 'text' => $row->nama_jabatan];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count($q = null)
    {
        return $this->db->like('nama_jabatan', $q)->get('jabatan')->num_rows();
    }

    private function petugas_data($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('nama_jabatan', $q)
            ->get('jabatan')
            ->result();
    }


    public function select2jabatan2()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count2($q);
        $data = $this->petugas_data2($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_jabatannonpns, 'text' => $row->nama_jabatan];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count2($q = null)
    {
        return $this->db->like('nama_jabatan', $q)->get('jabatan')->num_rows();
    }

    private function petugas_data2($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('nama_jabatan', $q)
            ->get('jabatan_nonpns')
            ->result();
    }


	}

 ?>