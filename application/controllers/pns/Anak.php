<?php 

class Anak extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['anak'] = $this->master_m->get_data_anak_personal($nip); 

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Keluarga ";

        $this->load->view('template/header_pns', $data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_anak',$data);
        $this->load->view('template/footer');
    }

    public function tambah_anak()
    {
            $nip           = $this->session->userdata('nip');
            $nama_anak     = $this->input->post('nama_anak');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $anak_ke       = $this->input->post('anak_ke');
            $pekerjaan     = $this->input->post('pekerjaan');
            $agama         = $this->input->post('agama');
            $status        = $this->input->post('status');
            $tunjangan     = $this->input->post('tunjangan');

            $file        = $_FILES['file']['name'];
            if ($file=''){}else{
                $config ['upload_path']     =   './uploads/anak';
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
                'nama_anak'     => $nama_anak,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'anak_ke'       => $anak_ke,
                'pekerjaan'     => $pekerjaan,
                'agama'         => $agama,
                'status'        => $status,
                'tunjangan'     => $tunjangan,
                'file'          => $file,
            );

            $this->master_m->insert_data($data,'data_anak');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pns/Anak'); 
    }

    public function update_anak()
    {
            $id       = $this->input->post('id_anak');
            $nama_anak     = $this->input->post('nama_anak');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $anak_ke       = $this->input->post('anak_ke');
            $pekerjaan     = $this->input->post('pekerjaan');
            $agama         = $this->input->post('agama');
            $status        = $this->input->post('status');
            $tunjangan     = $this->input->post('tunjangan');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/anak';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get8($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/anak/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_anak'     => $nama_anak,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'anak_ke'       => $anak_ke,
                'pekerjaan'     => $pekerjaan,
                'agama'         => $agama,
                'status'        => $status,
                'tunjangan'     => $tunjangan,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_anak' => $id
            );


            $this->master_m->update_data('data_anak',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('pns/Anak');
    }

    public function delete_anak($id)
    {
        $berkas = $this->master_m->get8($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/anak/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_anak' => $id);

        $this->master_m->delete_data($where, 'data_anak');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pns/Anak');
    }


    public function delete_anak_detail($id)
    {
        $nip = $this->master_m->get_data_anak_by_id($id)->nip;

        $berkas = $this->master_m->get8($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/anak/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_anak' => $id);

        $this->master_m->delete_data($where, 'data_anak');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_anak/'.$nip);
    }

    public function tambah_anak_detail()
    {
            $nip           = $this->input->post('nip');
            $nama_anak     = $this->input->post('nama_anak');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $anak_ke       = $this->input->post('anak_ke');
            $pekerjaan     = $this->input->post('pekerjaan');
            $agama         = $this->input->post('agama');
            $status        = $this->input->post('status');
            $tunjangan     = $this->input->post('tunjangan');

            $file        = $_FILES['file']['name'];
            if ($file=''){}else{
                $config ['upload_path']     =   './uploads/anak';
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
                'nama_anak'     => $nama_anak,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'anak_ke'       => $anak_ke,
                'pekerjaan'     => $pekerjaan,
                'agama'         => $agama,
                'status'        => $status,
                'tunjangan'     => $tunjangan,
                'file'          => $file,
            );

            $this->master_m->insert_data($data,'data_anak');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/Datapegawai/detail_anak/'.$nip);
 
    }

    public function update_anak_detail()
    {
            $id       = $this->input->post('id_anak');
            $nip           = $this->input->post('nip');
            $nama_anak     = $this->input->post('nama_anak');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $anak_ke       = $this->input->post('anak_ke');
            $pekerjaan     = $this->input->post('pekerjaan');
            $agama         = $this->input->post('agama');
            $status        = $this->input->post('status');
            $tunjangan     = $this->input->post('tunjangan');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/anak';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get8($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/anak/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_anak'     => $nama_anak,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'anak_ke'       => $anak_ke,
                'pekerjaan'     => $pekerjaan,
                'agama'         => $agama,
                'status'        => $status,
                'tunjangan'     => $tunjangan,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_anak' => $id
            );


            $this->master_m->update_data('data_anak',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('admin/Datapegawai/detail_anak/'.$nip);
    }

}