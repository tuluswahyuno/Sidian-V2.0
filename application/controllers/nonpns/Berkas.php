<?php 

class Berkas extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['berkas'] = $this->master_m->get_data_berkas_personal($nip); 

        $data['jenisberkas'] = $this->master_m->get_jenisberkas(); 

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['title'] = " Berkas ";

        $this->load->view('template/header_nonpns',$data);
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('nonpns/v_data_berkas',$data);
        $this->load->view('template/footer');
    }

    public function tambah_berkas()
    {
        $nip         = $this->session->userdata('nip');
        $jberkas     = $this->input->post('jberkas');
        $nama_berkas = $this->input->post('nama_berkas');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/non-pns/berkas';
            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

            $this->load->library('upload', $config); 

            if (!$this->upload->do_upload('file')) {
                echo "File Pendukung Gagal di upload";
            }else{
                $file=$this->upload->data('file_name');

            }
        }
        

        $data = array(
            'nip'           => $nip,
            'jberkas'       => $jberkas,
            'nama_berkas'   => $nama_berkas,
            'file'          => $file,
        );

        $this->master_m->insert_data($data,'data_berkas');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('nonpns/Berkas'); 
    }

    public function update_berkas()
    {
        $id   = $this->input->post('id_berkas');
        $jberkas     = $this->input->post('jberkas');
        $nama_berkas = $this->input->post('nama_berkas');
        $update_at   = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/non-pns/berkas';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    // $surat = $this->master_m->get($post['$id'])->row();
                    $surat = $this->master_m->get($id)->row();
                    if($surat->file != null)
                    {
                     $taget_file = './uploads/non-pns/berkas/'.$surat->file;
                     unlink($taget_file);
                    }

                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'nama_berkas'   => $nama_berkas,
            'jberkas'       => $jberkas,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_berkas' => $id
        );


        $this->master_m->update_data('data_berkas',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('nonpns/Berkas');
    }

    public function delete_berkas($id)
    {
        $berkas = $this->master_m->get($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/non-pns/berkas/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_berkas' => $id);

        $this->master_m->delete_data($where, 'data_berkas');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('nonpns/Berkas');
    }


    public function delete_berkas_detail($id)
    {
        $berkas = $this->master_m->get($id)->row();

        $nip = $this->master_m->get_data_berkas_by_id($id)->nip;
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/non-pns/berkas/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_berkas' => $id);

        $this->master_m->delete_data($where, 'data_berkas');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_berkas_nonpns/'.$nip);
    }



    public function tambah_berkas_detail()
    {
        $nip         = $this->input->post('nip');
        $jberkas     = $this->input->post('jberkas');
        $nama_berkas = $this->input->post('nama_berkas');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/non-pns/berkas';
            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

            $this->load->library('upload', $config); 

            if (!$this->upload->do_upload('file')) {
                echo "File Pendukung Gagal di upload";
            }else{
                $file=$this->upload->data('file_name');

            }
        }
        

        $data = array(
            'nip'           => $nip,
            'jberkas'       => $jberkas,
            'nama_berkas'   => $nama_berkas,
            'file'          => $file,
        );

        $this->master_m->insert_data($data,'data_berkas');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/Datapegawai/detail_berkas_nonpns/'.$nip); 

    }

    public function update_berkas_detail()
    {
        $id   = $this->input->post('id_berkas');
        $nip         = $this->input->post('nip');
        $jberkas     = $this->input->post('jberkas');
        $nama_berkas = $this->input->post('nama_berkas');
        $update_at   = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/non-pns/berkas';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    // $surat = $this->master_m->get($post['$id'])->row();
                    $surat = $this->master_m->get($id)->row();
                    if($surat->file != null)
                    {
                     $taget_file = './uploads/non-pns/berkas/'.$surat->file;
                     unlink($taget_file);
                    }

                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'jberkas'       => $jberkas,
            'nama_berkas'   => $nama_berkas,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_berkas' => $id
        );


        $this->master_m->update_data('data_berkas',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
                redirect('admin/Datapegawai/detail_berkas_nonpns/'.$nip); 

    }

}