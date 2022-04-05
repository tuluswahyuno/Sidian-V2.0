<?php 

class Jabatan extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['jabatan'] = $this->master_m->get_data_jabatan_personal($nip); 

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        // $data['max'] = $this->master_m->nilai_max();

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip);
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip);  

        $data['title'] = " Jabatan ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_jabatan',$data);
        $this->load->view('template/footer');
    }


    public function tambah_jabatan()
    {
        $nip           	= $this->session->userdata('nip');
        $jabatan       	= $this->input->post('jabatan');
        $jenis_jabatan  = $this->input->post('jenis_jabatan');
        $kelas_jabatan  = $this->input->post('kelas_jabatan');
        $no_surat       = $this->input->post('no_surat');
        $tgl_surat     	= $this->input->post('tgl_surat');
        $tmt_jabatan    = $this->input->post('tmt_jabatan');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/jabatan';
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
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'kelas_jabatan' => $kelas_jabatan,
            'no_surat'      => $no_surat,
            'tgl_surat'     => $tgl_surat,
            'tmt_jabatan'   => $tmt_jabatan,
            'file'          => $file,
        );


        $data1 = array(
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        $this->master_m->insert_data($data,'data_jabatan');

        $this->master_m->update_data('data_pegawai',$data1,$where1);

        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pns/Jabatan'); 
    }


    public function tambah_jabatan_detail()
    {
        $nip            = $this->input->post('nip');
        $jabatan        = $this->input->post('jabatan');
        $jenis_jabatan  = $this->input->post('jenis_jabatan');
        $kelas_jabatan  = $this->input->post('kelas_jabatan');
        $no_surat       = $this->input->post('no_surat');
        $tgl_surat      = $this->input->post('tgl_surat');
        $tmt_jabatan    = $this->input->post('tmt_jabatan');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/jabatan';
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
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'kelas_jabatan' => $kelas_jabatan,
            'no_surat'      => $no_surat,
            'tgl_surat'     => $tgl_surat,
            'tmt_jabatan'   => $tmt_jabatan,
            'file'          => $file,
        );


        $data1 = array(
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        $this->master_m->insert_data($data,'data_jabatan');

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

        $this->session->set_flashdata('flash', 'Ditambahkan');
        
        redirect('admin/Datapegawai/detail_jabatan/'.$nip);
    }

    public function update_jabatan()
    {
        $id		= $this->input->post('id_jabatan');
        $nip            = $this->input->post('nip');
        $jabatan        = $this->input->post('jabatan');
        $jenis_jabatan  = $this->input->post('jenis_jabatan');
        $kelas_jabatan  = $this->input->post('kelas_jabatan');
        $no_surat       = $this->input->post('no_surat');
        $tgl_surat      = $this->input->post('tgl_surat');
        $tmt_jabatan    = $this->input->post('tmt_jabatan');
        $update_at      = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/jabatan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get6($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/jabatan/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'kelas_jabatan' => $kelas_jabatan,
            'no_surat'      => $no_surat,
            'tgl_surat'     => $tgl_surat,
            'tmt_jabatan'   => $tmt_jabatan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_jabatan' => $id
        );


        $data1 = array(
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        // var_dump($where1);
        // die();


        
        $this->master_m->update_data('data_jabatan',$data,$where);

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);
        

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('pns/Jabatan');
    }


    public function update_jabatan_detail()
    {
        $id     = $this->input->post('id_jabatan');
        $nip            = $this->input->post('nip');
        $jabatan        = $this->input->post('jabatan');
        $jenis_jabatan  = $this->input->post('jenis_jabatan');
        $kelas_jabatan  = $this->input->post('kelas_jabatan');
        $no_surat       = $this->input->post('no_surat');
        $tgl_surat      = $this->input->post('tgl_surat');
        $tmt_jabatan    = $this->input->post('tmt_jabatan');
        $update_at      = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');


        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/jabatan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get6($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/jabatan/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'kelas_jabatan' => $kelas_jabatan,
            'no_surat'      => $no_surat,
            'tgl_surat'     => $tgl_surat,
            'tmt_jabatan'   => $tmt_jabatan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_jabatan' => $id
        );


        $data1 = array(
            'jabatan'       => $jabatan,
            'jenis_jabatan' => $jenis_jabatan,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where1 = array(
            'nip' => $nip
        );

        // var_dump($where1);
        // die();


        
        $this->master_m->update_data('data_jabatan',$data,$where);

        $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);
        

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Datapegawai/detail_jabatan/'.$nip);
    }


    public function delete_jabatan($id)
    {
        $berkas = $this->master_m->get6($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/jabatan/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_jabatan' => $id);

        $this->master_m->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pns/Jabatan');
    }


    public function delete_jabatan_detail($id)
    {
        $nip = $this->master_m->get_data_jabatan_by_id($id)->nip;

        $berkas = $this->master_m->get6($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/jabatan/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_jabatan' => $id);

        $this->master_m->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('flash', 'Dihapus');
        
        redirect('admin/Datapegawai/detail_jabatan/'.$nip);
    }


}