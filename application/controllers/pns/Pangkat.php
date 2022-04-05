<?php 

class Pangkat extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pangkat'] = $this->master_m->get_data_pangkat_personal($nip); 

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Pangkat & Golongan ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_pangkat',$data);
        $this->load->view('template/footer');
    }


    public function tambah_pangkat()
    {
        $nip           	= $this->session->userdata('nip');
        $pangkat       	= $this->input->post('pangkat');
        $tmt  			= $this->input->post('tmt');
        $tahun       	= $this->input->post('tahun');
        $bulan     		= $this->input->post('bulan');
        $no_surat     	= $this->input->post('no_surat');
        $tgl_surat     	= $this->input->post('tgl_surat');
        $no_bkn     	= $this->input->post('no_bkn');
        $tgl_bkn     	= $this->input->post('tgl_bkn');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/pangkat';
            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

            $this->load->library('upload', $config); 

            if (!$this->upload->do_upload('file')) {
                // echo "File Pendukung Gagal di upload";
            }else{
                $file=$this->upload->data('file_name');

            }
        }

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nip'           => $nip,
            'pangkat'       => $pangkat,
            'tmt'  			=> $tmt,
            'tahun'       	=> $tahun,
            'bulan'     	=> $bulan,
            'no_surat'     	=> $no_surat,
            'tgl_surat'     => $tgl_surat,
            'no_bkn'     	=> $no_bkn,
            'tgl_bkn'     	=> $tgl_bkn,
            'file'          => $file,
        );

        $data1 = array(
            'pangkat'       => $pangkat,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        $this->master_m->insert_data($data,'data_pangkat');

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pns/pangkat'); 
    }

    public function update_pangkat()
    {
        $id		        = $this->input->post('id_pangkat');
        $nip            = $this->input->post('nip');
        $pangkat       	= $this->input->post('pangkat');
        $tmt  			= $this->input->post('tmt');
        $tahun       	= $this->input->post('tahun');
        $bulan     		= $this->input->post('bulan');
        $no_surat     	= $this->input->post('no_surat');
        $tgl_surat     	= $this->input->post('tgl_surat');
        $no_bkn     	= $this->input->post('no_bkn');
        $tgl_bkn     	= $this->input->post('tgl_bkn');
        $update_at          = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/pangkat';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get5($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/pangkat/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }


        $data = array(
            'pangkat'       => $pangkat,
            'tmt'  			=> $tmt,
            'tahun'       	=> $tahun,
            'bulan'     	=> $bulan,
            'no_surat'     	=> $no_surat,
            'tgl_surat'     => $tgl_surat,
            'no_bkn'     	=> $no_bkn,
            'tgl_bkn'     	=> $tgl_bkn,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_pangkat' => $id
        );

        $data1 = array(
            'pangkat'       => $pangkat,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );


        $this->master_m->update_data('data_pangkat',$data,$where);

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('pns/pangkat');
    }


    public function tambah_pangkat_detail()
    {
        $nip            = $this->input->post('nip');
        $pangkat        = $this->input->post('pangkat');
        $tmt            = $this->input->post('tmt');
        $tahun          = $this->input->post('tahun');
        $bulan          = $this->input->post('bulan');
        $no_surat       = $this->input->post('no_surat');
        $tgl_surat      = $this->input->post('tgl_surat');
        $no_bkn         = $this->input->post('no_bkn');
        $tgl_bkn        = $this->input->post('tgl_bkn');


        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/pangkat';
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
            'tmt'           => $tmt,
            'tahun'         => $tahun,
            'bulan'         => $bulan,
            'no_surat'      => $no_surat,
            'tgl_surat'     => $tgl_surat,
            'no_bkn'        => $no_bkn,
            'tgl_bkn'       => $tgl_bkn,
            'file'       => $file,
        );


        $data1 = array(
            'pangkat'       => $pangkat,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );


        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

        $this->master_m->insert_data($data,'data_pangkat');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/Datapegawai/detail_pangkat/'.$nip);
    }



    public function update_pangkat_detail()
    {
        $id    = $this->input->post('id_pangkat');
        $nip            = $this->input->post('nip');
        $pangkat        = $this->input->post('pangkat');
        $tmt            = $this->input->post('tmt');
        $tahun          = $this->input->post('tahun');
        $bulan          = $this->input->post('bulan');
        $no_surat       = $this->input->post('no_surat');
        $tgl_surat      = $this->input->post('tgl_surat');
        $no_bkn         = $this->input->post('no_bkn');
        $tgl_bkn        = $this->input->post('tgl_bkn');
        $update_at          = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/pangkat';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get5($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/pangkat/'.$uploadfile->file;
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
            'tmt'           => $tmt,
            'tahun'         => $tahun,
            'bulan'         => $bulan,
            'no_surat'      => $no_surat,
            'tgl_surat'     => $tgl_surat,
            'no_bkn'        => $no_bkn,
            'tgl_bkn'       => $tgl_bkn,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_pangkat' => $id
        );


        $data1 = array(
            'pangkat'       => $pangkat,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );


        $this->master_m->update_data('data_pangkat',$data,$where);
        
        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);



        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Datapegawai/detail_pangkat/'.$nip);
        
    }

    public function delete_pangkat_detail($id)
    {
        // $nip = $this->input->post('nip');
        $nip = $this->master_m->get_data_pangkat_by_id($id)->nip;

        $berkas = $this->master_m->get5($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/pangkat/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_pangkat' => $id);

        $this->master_m->delete_data($where, 'data_pangkat');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_pangkat/'.$nip);
    }

    public function delete_pangkat($id)
    {
        $nip = $this->master_m->get_data_pangkat_by_id($id)->nip;

        $berkas = $this->master_m->get5($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/pangkat/'.$berkas->file;
            unlink($taget_file);
        }

    	$where = array('id_pangkat' => $id);

		$this->master_m->delete_data($where, 'data_pangkat');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pns/pangkat');
    }


    public function select2pangkat()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count($q);
        $data = $this->petugas_data($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_masterpangkat, 'text' => $row->nama_pangkat];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count($q = null)
    {
        return $this->db->like('nama_pangkat', $q)->get('pangkat')->num_rows();
    }

    private function petugas_data($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('nama_pangkat', $q)
            ->get('pangkat')
            ->result();
    }


}