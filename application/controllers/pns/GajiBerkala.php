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


    	public function tambah_gajiberkala()
	    {
	        $nip           	= $this->session->userdata('nip');
	        $pangkat       	= $this->input->post('pangkat');
	        $tmt  			= $this->input->post('tmt');
	        $no_surat  		= $this->input->post('no_surat');
	        $tgl_surat  	= $this->input->post('tgl_surat');
	        // $kgb_mendatang  = $this->input->post('kgb_mendatang');
	        $gaji_lama     	= $this->input->post('gaji_lama');
	        $gaji_baru    	= $this->input->post('gaji_baru');

	        $file        = $_FILES['file']['name'];
	        if ($file=''){}else{
	            $config ['upload_path']     =   './uploads/gajiberkala';
	            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

	            $this->load->library('upload', $config); 

	            if (!$this->upload->do_upload('file')) {
	                // echo "File Pendukung Gagal di upload";
	            }else{
	                $file=$this->upload->data('file_name');

	            }
	        }

	        $data = array(
	            'nip'           => $nip,
	            'pangkat'       => $pangkat,
	            'tmt' 			=> $tmt,
	            'no_surat' 		=> $no_surat,
	            'tgl_surat' 	=> $tgl_surat,
	            // 'kgb_mendatang' => $kgb_mendatang,
	            'gaji_lama'     => $gaji_lama,
	            'gaji_baru'   	=> $gaji_baru,
	            'file'          => $file,
	        );


	        // $data1 = array(
	        //     'jabatan'       => $jabatan,
	        //     'jenis_jabatan' => $jenis_jabatan,
	        //     'update_at'     => date('Y-m-d H:i:s')
	        // );

	        // $where1 = array(
	        //     'nip' => $nip
	        // );

	        $this->master_m->insert_data($data,'data_gajiberkala');

	        // $this->master_m->update_data('data_pegawai',$data1,$where1);

	        $this->session->set_flashdata('flash', 'Ditambahkan');
	        redirect('pns/GajiBerkala'); 
	    }



	    public function update_gajiberkala()
	    {
	        $id		        = $this->input->post('id_gajiberkala');
	        $nip            = $this->input->post('nip');
	        $pangkat       	= $this->input->post('pangkat');
	        $tmt  			= $this->input->post('tmt');
	        $no_surat  		= $this->input->post('no_surat');
	        $tgl_surat  	= $this->input->post('tgl_surat');
	        // $kgb_mendatang  = $this->input->post('kgb_mendatang');
	        $gaji_lama     	= $this->input->post('gaji_lama');
	        $gaji_baru    	= $this->input->post('gaji_baru');
	        $update_at      = date('Y-m-d H:i:s');

	        date_default_timezone_set('Asia/Jakarta');

	        $file     = $_FILES['file']['name'];
	            if ($file){
	                $config ['upload_path']     =   './uploads/gajiberkala';
	                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

	                $this->load->library('upload', $config); 

	                if($this->upload->do_upload('file')){

	                    $uploadfile = $this->master_m->get11($id)->row();

	                    if($uploadfile->file != null)
	                    {
	                     $taget_file = './uploads/gajiberkala/'.$uploadfile->file;
	                     unlink($taget_file);
	                    }
	                    $file=$this->upload->data('file_name');
	                    $this->db->set('file', $file);
	                }else{
	                    echo $this->upload->display_errors();
	                }
	            }


	        $data = array(
	            'nip'           => $nip,
	            'pangkat'       => $pangkat,
	            'tmt' 			=> $tmt,
	            'no_surat' 		=> $no_surat,
	            'tgl_surat' 	=> $tgl_surat,
	            // 'kgb_mendatang' => $kgb_mendatang,
	            'gaji_lama'     => $gaji_lama,
	            'gaji_baru'   	=> $gaji_baru,
	            'update_at'     => date('Y-m-d H:i:s')
	        );

	        $where = array(
	            'id_gajiberkala' => $id
	        );

	        // $data1 = array(
	        //     'pangkat'       => $pangkat,
	        //     'update_at'     => date('Y-m-d H:i:s')
	        // );

	        // $where1 = array(
	        //     'nip' => $nip
	        // );


	        $this->master_m->update_data('data_gajiberkala',$data,$where);

	        // $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

	        $this->session->set_flashdata('flash', 'Diupdate');
	        redirect('pns/GajiBerkala');
	    }

    	


	}


 ?>