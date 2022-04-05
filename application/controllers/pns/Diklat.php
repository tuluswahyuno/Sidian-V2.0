<?php 

class Diklat extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['diklat'] = $this->master_m->get_data_diklat_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Diklat ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_diklat',$data);
        $this->load->view('template/footer');
    }

    public function diklat_perpanjang()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat'] = $this->master_m->get_data_diklat_pegawai($nip); 

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip);
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip);  

        $data['title'] = " Data Diklat Perlu Perpanjang ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_diklat_pns',$data);
        $this->load->view('template/footer');
    }


    public function update_diklat_expired()
    {
        $id_diklat            = $this->input->post('id_diklat');
        $berlaku_sampai     = $this->input->post('berlaku_sampai');
        $update_at          = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'berlaku_sampai'    => $berlaku_sampai,
            'update_at'         => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_diklat' => $id_diklat
        );

        $this->master_m->update_data('data_diklat',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('pns/Diklat/diklat_perpanjang'); 
    }

    public function tambah_diklat()
    {
        $nip            = $this->session->userdata('nip');
        $nama_diklat    = $this->input->post('nama_diklat');
        $institusi      = $this->input->post('institusi');
        $nomor          = $this->input->post('nomor');
        $tgl_mulai      = $this->input->post('tgl_mulai');
        $tgl_selesai    = $this->input->post('tgl_selesai');
        $durasi_jp      = $this->input->post('durasi_jp');
        $berlaku_sampai = $this->input->post('berlaku_sampai');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/diklat';
            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

            $this->load->library('upload', $config); 

            if (!$this->upload->do_upload('file')) {
                // echo "File Pendukung Gagal di upload";
            }else{
                $file=$this->upload->data('file_name');

            }
        }

        $data = array(
            'nip'               => $nip,
            'nama_diklat'       => $nama_diklat,
            'institusi'         => $institusi,
            'nomor'             => $nomor,
            'tgl_mulai'         => $tgl_mulai,
            'tgl_selesai'       => $tgl_selesai,
            'durasi_jp'         => $durasi_jp,
            'berlaku_sampai'    => $berlaku_sampai,
            'file'              => $file,
        );



        $this->master_m->insert_data($data,'data_diklat');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pns/Diklat'); 
    }

    public function update_diklat()
    {
        $id                 = $this->input->post('id_diklat');
        $nama_diklat        = $this->input->post('nama_diklat');
        $institusi          = $this->input->post('institusi');
        $nomor              = $this->input->post('nomor');
        $tgl_mulai          = $this->input->post('tgl_mulai');
        $tgl_selesai        = $this->input->post('tgl_selesai');
        $durasi_jp          = $this->input->post('durasi_jp');
        $berlaku_sampai     = $this->input->post('berlaku_sampai');
        $update_at          = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/diklat';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get7($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/diklat/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'nama_diklat'       => $nama_diklat,
            'institusi'         => $institusi,
            'nomor'             => $nomor,
            'tgl_mulai'         => $tgl_mulai,
            'tgl_selesai'       => $tgl_selesai,
            'durasi_jp'         => $durasi_jp,
            'berlaku_sampai'    => $berlaku_sampai,
            'update_at'         => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_diklat' => $id
        );


        $this->master_m->update_data('data_diklat',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('pns/Diklat');
    }

    public function delete_diklat($id)
    {

        $berkas = $this->master_m->get7($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/diklat/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_diklat' => $id);

        $this->master_m->delete_data($where, 'data_diklat');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pns/Diklat');
    }


    public function delete_diklat_detail($id)
    {
        $nip = $this->master_m->get_data_diklat_by_id($id)->nip;

        $berkas = $this->master_m->get7($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/diklat/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_diklat' => $id);

        $this->master_m->delete_data($where, 'data_diklat');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_diklat/'.$nip);
    }


    public function tambah_diklat_detail()
    {
        $nip         = $this->input->post('nip');
        $nama_diklat = $this->input->post('nama_diklat');
        $institusi   = $this->input->post('institusi');
        $nomor       = $this->input->post('nomor');
        $tgl_mulai   = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $durasi_jp   = $this->input->post('durasi_jp');
        $berlaku_sampai   = $this->input->post('berlaku_sampai');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/diklat';
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
            'nama_diklat'   => $nama_diklat,
            'institusi'     => $institusi,
            'nomor'         => $nomor,
            'tgl_mulai'     => $tgl_mulai,
            'tgl_selesai'   => $tgl_selesai,
            'durasi_jp'     => $durasi_jp,
            'berlaku_sampai'     => $berlaku_sampai,
            'file'        => $file,
        );

        $this->master_m->insert_data($data,'data_diklat');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/Datapegawai/detail_diklat/'.$nip); 
    }

    public function update_diklat_detail()
    {
        $id   = $this->input->post('id_diklat');
        $nip         = $this->input->post('nip');
        $nama_diklat = $this->input->post('nama_diklat');
        $institusi   = $this->input->post('institusi');
        $nomor       = $this->input->post('nomor');
        $tgl_mulai   = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $durasi_jp   = $this->input->post('durasi_jp');
        $berlaku_sampai   = $this->input->post('berlaku_sampai');
        $update_at   = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/diklat';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get7($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/diklat/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'nama_diklat'   => $nama_diklat,
            'institusi'     => $institusi,
            'nomor'         => $nomor,
            'tgl_mulai'     => $tgl_mulai,
            'tgl_selesai'   => $tgl_selesai,
            'durasi_jp'     => $durasi_jp,
            'berlaku_sampai'     => $berlaku_sampai,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_diklat' => $id
        );


        $this->master_m->update_data('data_diklat',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Datapegawai/detail_diklat/'.$nip);
    }

}