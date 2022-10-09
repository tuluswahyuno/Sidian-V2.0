<?php 

	
	/**
	 * 
	 */
	class Surat extends CI_Controller
	{
		
		public function index()
    	{
	        check_not_login();

	        $nip = $this->session->userdata('nip');

	        $data['cuti'] = $this->master_m->get_data_surat($nip); 
	        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
	        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
	        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
	        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

	        $data['no_surat']=$this->master_m->get_no_surat();

	        $data['title'] = " Pengajuan Surat ";

	        $this->load->view('template/header_pns',$data);
	        $this->load->view('template/sidebar_pns',$data);
	        $this->load->view('pns/v_data_surat',$data);
	        $this->load->view('template/footer');
    	}


    	public function tambah_surat()
    	{
	        $nip           	= $this->session->userdata('nip');
	        $keperluan      = $this->input->post('keperluan');
	        $tgl_mulai     	= $this->input->post('tgl_mulai');
	        $tgl_selesai    = $this->input->post('tgl_selesai');
	        $jenis_cuti    	= $this->input->post('jenis_cuti');
	        $alamat_cuti    = $this->input->post('alamat_cuti');
	        $no_surat    	= $this->input->post('no_surat');

	        $data = array(
	            'nip'           => $nip,
	            'keperluan'     => $keperluan,
	            'tgl_mulai' 	=> $tgl_mulai,
	            'tgl_selesai' 	=> $tgl_selesai,
	            'jenis_cuti' 	=> $jenis_cuti,
	            'alamat_cuti' 	=> $alamat_cuti,
	            'status'      	=> "0",
	            'no_surat'      => $no_surat,
	        );

	        $this->master_m->insert_data($data,'data_cuti');

	        $this->session->set_flashdata('flash', 'Ditambahkan');
	        redirect('pns/Cuti'); 
	    }

	    
	    public function Cetakcuti($id)
	    {
	    	$data['surat'] = $this->master_m->pengajuan_cuti($id); 
	    	$data['direktur'] = $this->master_m->direktur(); 
			$this->load->view('pns/cetak_formcuti',$data);
		}


		// public function Cetakcuti($id)
	 //    {
	 //    	$data['surat'] = $this->master_m->pengajuan_surat($id); 
		// 	$this->load->view('pns/cetak_formcuti',$data);
		// }


		public function delete_data($id)
	    {
	        $where = array('id_cuti' => $id);

	        $this->master_m->delete_data($where, 'data_cuti');
	        $this->session->set_flashdata('flash', 'Dihapus');
	        redirect('pns/Cuti'); 
	    }

	}


 ?>