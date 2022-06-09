<?php 

/**
 * 
 */
class Mutasi extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 

		$data['mutasi'] = $this->master_m->get_data_mutasi();

		$data['title'] = "Data Mutasi Ruang Pegawai";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_mutasi_ruang',$data);
		$this->load->view('template/footer');
	}

    public function mutasiruang()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');
        $data['mutasi'] = $this->master_m->get_data_mutasi_personal($nip); 
        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Mutasi ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_mutasi',$data);
        $this->load->view('template/footer');
    }


    public function mutasiruang_nonpns()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['mutasi'] = $this->master_m->get_data_mutasi_personal($nip); 
        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 
        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['title'] = " Mutasi ";

        $this->load->view('template/header_nonpns',$data);
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('nonpns/v_data_mutasi_nonpns',$data);
        $this->load->view('template/footer');
    }


	public function tambah_data()
    {
        $nip 		= $this->input->post('nip');
        $asal 		= $this->input->post('asal');
        $tujuan 	= $this->input->post('tujuan');
        $no_surat 	= $this->input->post('no_surat');
        $tmt 		= $this->input->post('tmt');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/mutasi';
            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

            $this->load->library('upload', $config); 

            if (!$this->upload->do_upload('file')) {
                echo "File Pendukung Gagal di upload";
            }else{
                $file=$this->upload->data('file_name');

            }
        }
        
        $data = array(
            'nip'   	=> $nip,
            'asal'   	=> $asal,
            'tujuan'   	=> $tujuan,
            'no_surat'  => $no_surat,
            'tmt_mutasi'=> $tmt,
            'file'      => $file,
        );


        $data1 = array(
            'divisi'       => $tujuan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

        $this->master_m->insert_data($data,'data_mutasi');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/Mutasi'); 
    }


    public function update_data()
    {
        $id         = $this->input->post('id_mutasi');
        $nip        = $this->input->post('nip');
        $asal       = $this->input->post('asal');
        $tujuan     = $this->input->post('tujuan');
        $no_surat   = $this->input->post('no_surat');
        $tmt        = $this->input->post('tmt');
        $update_at      = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/mutasi';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get3($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/mutasi/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'nip'       => $nip,
            'asal'      => $asal,
            'tujuan'    => $tujuan,
            'no_surat'  => $no_surat,
            'tmt_mutasi'=> $tmt,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_mutasi' => $id
        );


        $data1 = array(
            'divisi'       => $tujuan,
            'update_at'    => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

        $this->master_m->update_data('data_mutasi',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Mutasi');
    }


     public function delete_data($id)
    {
        $berkas = $this->master_m->get3($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/mutasi/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_mutasi' => $id);

        $this->master_m->delete_data($where, 'data_mutasi');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Mutasi');
    }


    public function sudah_baca($id)
    {

        $this->master_m->sudah_baca($id);

        $this->session->set_flashdata('flash', 'Sudah Dibaca');
        redirect('admin/Mutasi/mutasiruang');
    }

    public function sudah_baca_nonpns($id)
    {

        $this->master_m->sudah_baca($id);

        $this->session->set_flashdata('flash', 'Sudah Dibaca');
        redirect('admin/Mutasi/mutasiruang_nonpns');
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
            $options[] = ['id' => $row->nama_unitkerja, 'text' => $row->nama_unitkerja];
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


    public function select2unitkerjatujuan()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count2($q);
        $data = $this->petugas_data2($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_unitkerja, 'text' => $row->nama_unitkerja];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count2($q = null)
    {
        return $this->db->like('nama_unitkerja', $q)->get('unitkerja')->num_rows();
    }

    private function petugas_data2($start = 0, $limit = 10, $q = null)
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