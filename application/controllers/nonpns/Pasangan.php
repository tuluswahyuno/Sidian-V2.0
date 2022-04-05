<?php 

class Pasangan extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pasangan'] = $this->master_m->get_data_pasangan_personal($nip); 

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['title'] = " Keluarga ";

        $this->load->view('template/header_nonpns',$data);
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('nonpns/v_data_pasangan',$data);
        $this->load->view('template/footer');
    }

    public function tambah_pasangan()
    {
            $nip           = $this->session->userdata('nip');
            $nama_pasangan = $this->input->post('nama_pasangan');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $pekerjaan     = $this->input->post('pekerjaan');
            $tgl_nikah     = $this->input->post('tgl_nikah');
            $pasangan_ke   = $this->input->post('pasangan_ke');
            $agama         = $this->input->post('agama');
            $pasangan      = $this->input->post('pasangan');
            $no_hp         = $this->input->post('no_hp');
            $status_hidup  = $this->input->post('status_hidup');
            $tgl_cerai     = $this->input->post('tgl_cerai');
            $tunjangan     = $this->input->post('tunjangan');
            $status_pernikahan     = $this->input->post('status_pernikahan');

            $akta_nikah        = $_FILES['akta_nikah']['name'];
            if ($akta_nikah=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('akta_nikah')) {
                    // echo "File Pendukung Gagal di upload";
                }else{
                    $akta_nikah=$this->upload->data('file_name');

                }
            }

            $akta_cerai        = $_FILES['akta_cerai']['name'];
            if ($akta_cerai=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('akta_cerai')) {
                    // echo "File Pendukung Gagal di upload";
                }else{
                    $akta_cerai=$this->upload->data('file_name');

                }
            }

            $data = array(
                'nip'           => $nip,
                'nama_pasangan' => $nama_pasangan,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'pekerjaan'     => $pekerjaan,
                'tgl_nikah'     => $tgl_nikah,
                'pasangan_ke'   => $pasangan_ke,
                'agama'         => $agama,
                'pasangan'      => $pasangan,
                'no_hp'         => $no_hp,
                'status_hidup'  => $status_hidup,
                'tgl_cerai'     => $tgl_cerai,
                'tunjangan'     => $tunjangan,
                'akta_nikah'    => $akta_nikah,
                'akta_cerai'    => $akta_cerai,
                'status_pernikahan'     => $status_pernikahan,
            );

            $this->master_m->insert_data($data,'data_pasangan');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('nonpns/Pasangan'); 
    }

    public function update_pasangan()
    {
            $id   = $this->input->post('id_pasangan');
            $nama_pasangan = $this->input->post('nama_pasangan');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $pekerjaan     = $this->input->post('pekerjaan');
            $tgl_nikah     = $this->input->post('tgl_nikah');
            $pasangan_ke   = $this->input->post('pasangan_ke');
            $agama         = $this->input->post('agama');
            $pasangan      = $this->input->post('pasangan');
            $no_hp         = $this->input->post('no_hp');
            $status_hidup  = $this->input->post('status_hidup');
            $tgl_cerai     = $this->input->post('tgl_cerai');
            $tunjangan     = $this->input->post('tunjangan');
            $status_pernikahan     = $this->input->post('status_pernikahan');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $akta_nikah     = $_FILES['akta_nikah']['name'];
            if ($akta_nikah){
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('akta_nikah')){

                    $uploadfile = $this->master_m->get9($id)->row();

                    if($uploadfile->akta_nikah != null)
                    {
                     $taget_file = './uploads/non-pns/pasangan/'.$uploadfile->akta_nikah;
                     unlink($taget_file);
                    }
                    $akta_nikah=$this->upload->data('file_name');
                    $this->db->set('akta_nikah', $akta_nikah);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $akta_cerai     = $_FILES['akta_cerai']['name'];
            if ($akta_cerai){
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('akta_cerai')){

                    $uploadfile = $this->master_m->get9($id)->row();

                    if($uploadfile->akta_cerai != null)
                    {
                     $taget_file = './uploads/non-pns/pasangan/'.$uploadfile->akta_cerai;
                     unlink($taget_file);
                    }
                    $akta_cerai=$this->upload->data('file_name');
                    $this->db->set('akta_cerai', $akta_cerai);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_pasangan' => $nama_pasangan,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'pekerjaan'     => $pekerjaan,
                'tgl_nikah'     => $tgl_nikah,
                'pasangan_ke'   => $pasangan_ke,
                'agama'         => $agama,
                'pasangan'      => $pasangan,
                'no_hp'         => $no_hp,
                'status_hidup'  => $status_hidup,
                'tgl_cerai'     => $tgl_cerai,
                'tunjangan'     => $tunjangan,
                'status_pernikahan'     => $status_pernikahan,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_pasangan' => $id
            );


            $this->master_m->update_data('data_pasangan',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('nonpns/Pasangan');
    }

    public function delete_pasangan($id)
    {
        $berkas = $this->master_m->get9($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/non-pns/pasangan/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_pasangan' => $id);

        $this->master_m->delete_data($where, 'data_pasangan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('nonpns/Pasangan');
    }


    public function delete_pasangan_detail($id)
    {
        $nip = $this->master_m->get_data_pasangan_by_id($id)->nip;

        $berkas = $this->master_m->get9($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/non-pns/pasangan/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_pasangan' => $id);

        $this->master_m->delete_data($where, 'data_pasangan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_pasangan_nonpns/'.$nip);
    }


    public function tambah_pasangan_detail()
    {
            $nip           = $this->input->post('nip');
            $nama_pasangan = $this->input->post('nama_pasangan');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $pekerjaan     = $this->input->post('pekerjaan');
            $tgl_nikah     = $this->input->post('tgl_nikah');
            $pasangan_ke   = $this->input->post('pasangan_ke');
            $agama         = $this->input->post('agama');
            $pasangan      = $this->input->post('pasangan');
            $no_hp         = $this->input->post('no_hp');
            $status_hidup  = $this->input->post('status_hidup');
            $tgl_cerai     = $this->input->post('tgl_cerai');
            $tunjangan     = $this->input->post('tunjangan');
            $status_pernikahan     = $this->input->post('status_pernikahan');
            
            $akta_nikah    = $_FILES['akta_nikah']['name'];
            if ($akta_nikah=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('akta_nikah')) {
                    echo "File Pendukung Gagal di upload";
                }else{
                    $akta_nikah=$this->upload->data('file_name');

                }
            }

            $akta_cerai        = $_FILES['akta_cerai']['name'];
            if ($akta_cerai=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('akta_cerai')) {
                    echo "File Pendukung Gagal di upload";
                }else{
                    $akta_cerai=$this->upload->data('file_name');

                }
            }

            $data = array(
                'nip'           => $nip,
                'nama_pasangan' => $nama_pasangan,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'pekerjaan'     => $pekerjaan,
                'tgl_nikah'     => $tgl_nikah,
                'pasangan_ke'   => $pasangan_ke,
                'agama'         => $agama,
                'pasangan'      => $pasangan,
                'no_hp'         => $no_hp,
                'status_hidup'  => $status_hidup,
                'tgl_cerai'     => $tgl_cerai,
                'tunjangan'     => $tunjangan,
                'akta_nikah'    => $akta_nikah,
                'akta_cerai'    => $akta_cerai,
                'status_pernikahan'     => $status_pernikahan,
            );

            $this->master_m->insert_data($data,'data_pasangan');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/Datapegawai/detail_pasangan_nonpns/'.$nip); 
    }

    public function update_pasangan_detail()
    {
            $id             = $this->input->post('id_pasangan');
            $nip           = $this->input->post('nip');
            $nama_pasangan = $this->input->post('nama_pasangan');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $pekerjaan     = $this->input->post('pekerjaan');
            $tgl_nikah     = $this->input->post('tgl_nikah');
            $pasangan_ke   = $this->input->post('pasangan_ke');
            $agama         = $this->input->post('agama');
            $pasangan      = $this->input->post('pasangan');
            $no_hp         = $this->input->post('no_hp');
            $status_hidup  = $this->input->post('status_hidup');
            $tgl_cerai     = $this->input->post('tgl_cerai');
            $tunjangan     = $this->input->post('tunjangan');
            $status_pernikahan     = $this->input->post('status_pernikahan');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $akta_nikah     = $_FILES['akta_nikah']['name'];
            if ($akta_nikah){
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('akta_nikah')){

                    $uploadfile = $this->master_m->get9($id)->row();

                    if($uploadfile->akta_nikah != null)
                    {
                     $taget_file = './uploads/non-pns/pasangan/'.$uploadfile->akta_nikah;
                     unlink($taget_file);
                    }
                    $akta_nikah=$this->upload->data('file_name');
                    $this->db->set('akta_nikah', $akta_nikah);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $akta_cerai     = $_FILES['akta_cerai']['name'];
            if ($akta_cerai){
                $config ['upload_path']     =   './uploads/non-pns/pasangan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('akta_cerai')){

                    $uploadfile = $this->master_m->get9($id)->row();

                    if($uploadfile->akta_cerai != null)
                    {
                     $taget_file = './uploads/non-pns/pasangan/'.$uploadfile->akta_cerai;
                     unlink($taget_file);
                    }
                    $akta_cerai=$this->upload->data('file_name');
                    $this->db->set('akta_cerai', $akta_cerai);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_pasangan' => $nama_pasangan,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'pekerjaan'     => $pekerjaan,
                'tgl_nikah'     => $tgl_nikah,
                'pasangan_ke'   => $pasangan_ke,
                'agama'         => $agama,
                'pasangan'      => $pasangan,
                'no_hp'         => $no_hp,
                'status_hidup'  => $status_hidup,
                'tgl_cerai'     => $tgl_cerai,
                'tunjangan'     => $tunjangan,
                'status_pernikahan'     => $status_pernikahan,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_pasangan' => $id
            );


            $this->master_m->update_data('data_pasangan',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('admin/Datapegawai/detail_pasangan_nonpns/'.$nip);
    }

}