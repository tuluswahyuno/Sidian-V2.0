<?php 

	
	/**
	 * 
	 */
	class Surat extends CI_Controller
	{
		
		public function index()
    	{
	        check_not_login();

	        $data['surat'] = $this->master_m->get_pengajuan_surat(); 
	        
	        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
	        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
	        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
	        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

	        $data['no_surat']=$this->master_m->get_no_surat();

	        $data['title'] = " Pengajuan Surat ";

	        $this->load->view('template/header',$data);
	        $this->load->view('template/sidebar',$data);
	        $this->load->view('admin/v_data_surat',$data);
	        $this->load->view('template/footer');
    	}


    	public function tambah_surat()
    	{
	        $nip           		= $this->session->userdata('nip');
	        $no_surat      		= $this->input->post('no_surat');
	        $tgl_surat     		= $this->input->post('tgl_surat');
	        $keperluan    		= $this->input->post('keperluan');
	        $display_nosurat    = $this->input->post('display_nosurat');

	        $data = array(
	            'nip'           	=> $nip,
	            'no_surat'     		=> $no_surat,
	            'tgl_surat' 		=> $tgl_surat,
	            'keperluan' 		=> $keperluan,
	            'display_nosurat' 	=> $display_nosurat,
	        );

	        $this->master_m->insert_data($data,'data_surat');

	        $this->session->set_flashdata('flash', 'Ditambahkan');
	        redirect('admin/Surat');
	    }

	    
	    public function Cetaksurat($id)
	    {
	    	$data['surat'] = $this->master_m->pengajuan_surat($id); 
	    	$data['direktur'] = $this->master_m->direktur(); 

			$this->load->view('pns/cetak_surat',$data);
		}


		public function update_data()
    	{
	        $id                 = $this->input->post('id_surat');
	        $tgl_surat     		= $this->input->post('tgl_surat');
		    $keperluan    		= $this->input->post('keperluan');
		    $status    			= $this->input->post('status');
	        $update_at          = date('Y-m-d H:i:s');

	        date_default_timezone_set('Asia/Jakarta');

	        $data = array(
	            'tgl_surat'  	=> $tgl_surat,
	            'keperluan'     => $keperluan,
	            'status'     	=> $status,
	            'update_at'     => $update_at,
	        );

	        $where = array(
	            'id_surat' => $id
	        );


	        $this->master_m->update_data('data_surat',$data,$where);

	        $this->session->set_flashdata('flash', 'Diupdate');
	        redirect('admin/Surat');
	    }


		public function delete_data($id)
	    {
	        $where = array('id_surat' => $id);

	        $this->master_m->delete_data($where, 'data_surat');
	        $this->session->set_flashdata('flash', 'Dihapus');
	        redirect('admin/Surat'); 
	    }

	}


 ?>