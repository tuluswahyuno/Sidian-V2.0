<?php 

	
	/**
	 * 
	 */
	class Cuti extends CI_Controller
	{
		
		public function index()
    	{
	        check_not_login();

	        $data['cuti'] = $this->master_m->get_data_cuti(); 

	        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
	        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
	        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
	        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

	        $data['title'] = " Pengajuan Cuti ";

	        $this->load->view('template/header',$data);
	        $this->load->view('template/sidebar',$data);
	        $this->load->view('admin/v_data_cuti',$data);
	        $this->load->view('template/footer');
    	}



    	public function update_cuti()
    	{
	        $id                 = $this->input->post('id_cuti');
	        $jenis_cuti     	= $this->input->post('jenis_cuti');
	        $keperluan     		= $this->input->post('keperluan');
		    $tgl_mulai    		= $this->input->post('tgl_mulai');
		    $tgl_selesai    	= $this->input->post('tgl_selesai');
		    $alamat_cuti    	= $this->input->post('alamat_cuti');
		    $nama_atasan    	= $this->input->post('nama_atasan');
		    $status    			= $this->input->post('status');
	        $update_at          = date('Y-m-d H:i:s');

	        date_default_timezone_set('Asia/Jakarta');

	        $data = array(
	            'jenis_cuti'  	=> $jenis_cuti,
	            'keperluan'     => $keperluan,
	            'tgl_mulai'     => $tgl_mulai,
	            'tgl_selesai'   => $tgl_selesai,
	            'alamat_cuti'   => $alamat_cuti,
	            'nama_atasan'   => $nama_atasan,
	            'status'   		=> $status,
	            'update_at'     => $update_at,
	        );

	        $where = array(
	            'id_cuti' => $id
	        );


	        $this->master_m->update_data('data_cuti',$data,$where);

	        $this->session->set_flashdata('flash', 'Diupdate');
	        redirect('admin/Cuti');
	    }



	    public function Cetakcuti($id)
	    {
	    	$data['surat'] = $this->master_m->pengajuan_cuti($id); 
	    	$data['direktur'] = $this->master_m->direktur(); 
			$this->load->view('pns/cetak_formcuti',$data);
		}


    	public function delete_data($id)
	    {
	        $where = array('id_cuti' => $id);

	        $this->master_m->delete_data($where, 'data_cuti');
	        $this->session->set_flashdata('flash', 'Dihapus');
	        redirect('admin/Cuti'); 
	    }


	}


 ?>