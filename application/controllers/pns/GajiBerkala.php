<?php 

	
	/**
	 * 
	 */
	class GajiBerkala extends CI_Controller
	{
		
		public function index()
    	{
	        check_not_login();

	        $nip = $this->session->userdata('nip');

	        $data['gajiberkala'] = $this->master_m->get_data_gaji_berkala($nip); 
	        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
	        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
	        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
	        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

	        $data['title'] = " Riwayat Gaji Berkala ";

	        $this->load->view('template/header_pns',$data);
	        $this->load->view('template/sidebar_pns',$data);
	        $this->load->view('pns/v_data_riwayatgajiberkala',$data);
	        $this->load->view('template/footer');
    	}


	}


 ?>