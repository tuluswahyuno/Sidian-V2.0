<?php 

class Kompetensi extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');
        $data['kompetensi'] = $this->master_m->get_data_kompetensi_personal($nip); 
        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 
        $data['title'] = " Sertifikat Kompetensi ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_kompetensi',$data);
        $this->load->view('template/footer');
    }


    public function tambah_kompetensi()
    {
        $nip                    = $this->session->userdata('nip');
        $jenis_kompetensi       = $this->input->post('jenis_kompetensi');
        $profesi                = $this->input->post('profesi');
        $no_surat               = $this->input->post('no_surat');
        $tgl_terbit             = $this->input->post('tgl_terbit');
        $tgl_expired            = $this->input->post('tgl_expired');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/kompetensi';
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
            'jenis_kompetensi'  => $jenis_kompetensi,
            'profesi'           => $profesi,
            'no_surat'          => $no_surat,
            'tgl_terbit'        => $tgl_terbit,
            'tgl_expired'       => $tgl_expired,
            'file'              => $file,
        );



        $this->master_m->insert_data($data,'data_kompetensi');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pns/Kompetensi'); 
    }



    public function update_data()
    {
        $id                     = $this->input->post('id_kompetensi');
        $jenis_kompetensi       = $this->input->post('jenis_kompetensi');
        $profesi                = $this->input->post('profesi');
        $no_surat               = $this->input->post('no_surat');
        $tgl_terbit             = $this->input->post('tgl_terbit');
        $tgl_expired            = $this->input->post('tgl_expired');
        $update_at              = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/kompetensi';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get_file_kompetensi($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/kompetensi/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'jenis_kompetensi'  => $jenis_kompetensi,
            'profesi'           => $profesi,
            'no_surat'          => $no_surat,
            'tgl_terbit'        => $tgl_terbit,
            'tgl_expired'       => $tgl_expired,
            'update_at'         => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_kompetensi' => $id
        );


        $this->master_m->update_data('data_kompetensi',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('pns/Kompetensi');
    }



    public function kompetensi_expired()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
        $data['kompetensi'] = $this->master_m->get_data_kompetensi_pegawai($nip); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 
        $data['title'] = " Kompetensi Perlu Perpanjang ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_kompetensi_expired',$data);
        $this->load->view('template/footer');
    }



    public function delete_data($id)
    {

        $berkas = $this->master_m->get_file_kompetensi($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/kompetensi/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_kompetensi' => $id);

        $this->master_m->delete_data($where, 'data_kompetensi');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pns/Kompetensi');
    }

}