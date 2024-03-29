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

	        $data['surat'] = $this->master_m->get_data_surat($nip); 
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
	        redirect('pns/Surat');
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
	        $update_at          = date('Y-m-d H:i:s');

	        date_default_timezone_set('Asia/Jakarta');

	        $data = array(
	            'tgl_surat'  	=> $tgl_surat,
	            'keperluan'     => $keperluan,
	            'update_at'     => $update_at,
	        );

	        $where = array(
	            'id_surat' => $id
	        );


	        $this->master_m->update_data('data_surat',$data,$where);

	        $this->session->set_flashdata('flash', 'Diupdate');
	        redirect('pns/Surat');
	    }


		public function delete_data($id)
	    {
	        $where = array('id_surat' => $id);

	        $this->master_m->delete_data($where, 'data_surat');
	        $this->session->set_flashdata('flash', 'Dihapus');
	        redirect('pns/Surat'); 
	    }

	}


 ?>