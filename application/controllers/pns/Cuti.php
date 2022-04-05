<?php 

	
	/**
	 * 
	 */
	class Cuti extends CI_Controller
	{
		
		public function index()
    	{
	        check_not_login();

	        $nip = $this->session->userdata('nip');

	        $data['cuti'] = $this->master_m->get_data_cuti_personal($nip); 
	        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
	        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
	        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
	        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

	        $data['title'] = " Cuti Tahunan ";

	        $this->load->view('template/header_pns',$data);
	        $this->load->view('template/sidebar_pns',$data);
	        $this->load->view('pns/v_data_cuti',$data);
	        $this->load->view('template/footer');
    	}


    	public function tambah_cuti()
    	{
	        $nip           	= $this->session->userdata('nip');
	        $keperluan      = $this->input->post('keperluan');
	        $tgl_mulai     	= $this->input->post('tgl_mulai');
	        $tgl_selesai    = $this->input->post('tgl_selesai');

	        $data = array(
	            'nip'           => $nip,
	            'keperluan'     => $keperluan,
	            'tgl_mulai' 	=> $tgl_mulai,
	            'tgl_selesai' 	=> $tgl_selesai,
	            'status'      => "0",
	        );

	        $this->master_m->insert_data($data,'data_cuti');

	        $this->session->set_flashdata('flash', 'Ditambahkan');
	        redirect('pns/Cuti'); 
	    }

	}


 ?>