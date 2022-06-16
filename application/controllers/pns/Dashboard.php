<?php 

class Dashboard extends CI_Controller
{

    public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Dashboard ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_pns_new',$data);
        $this->load->view('template/footer');
    }


    public function timeline()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['kompetensi'] = $this->master_m->get_data_kompetensi_personal($nip); 

       $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip);
        
       $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

       $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
       $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Dashboard ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_dashboard_pns',$data);
        $this->load->view('template/footer');
    }


    public function update_data()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 
        $data['jenispegawai'] = $this->master_m->get_jenispegawai();
        $data['jenisprofesi'] = $this->master_m->get_jenisprofesi(); 
        $data['jenjangpendidikan'] = $this->master_m->get_jenjangpendidikan(); 

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 

        $data['title'] = " Dashboard ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_data_pns_update',$data);
        $this->load->view('template/footer');
    }


    public function update_data_aksi()
    {
            $nip              = $this->input->post('nip');
            $nama_lengkap     = $this->input->post('nama_lengkap');
            $tempat_lahir     = $this->input->post('tempat_lahir');
            $tgl_lahir        = $this->input->post('tgl_lahir');
            $gender           = $this->input->post('gender');
            $agama            = $this->input->post('agama');
            $email            = $this->input->post('email');
            $no_hp            = $this->input->post('no_hp');
            $alamat           = $this->input->post('alamat');
            $pangkat          = $this->input->post('pangkat');
            $jabatan          = $this->input->post('jabatan');
            $jenis_jabatan    = $this->input->post('jenis_jabatan');
            $profesi          = $this->input->post('profesi');
            $divisi           = $this->input->post('divisi');
            $nik              = $this->input->post('nik');
            $npwp             = $this->input->post('npwp');
            $bpjs             = $this->input->post('bpjs');
            $jenjang          = $this->input->post('jenjang');
            $prodi            = $this->input->post('prodi');
            // $status_pegawai   = $this->input->post('status_pegawai');
            $kp_terakhir      = $this->input->post('kp_terakhir');
            $kp_mendatang     = $this->input->post('kp_mendatang');
            $kgb_terakhir     = $this->input->post('kgb_terakhir');
            $kgb_mendatang    = $this->input->post('kgb_mendatang');
            $tmt              = $this->input->post('tmt');
            $longitude        = $this->input->post('longitude');
            $latitude         = $this->input->post('latitude');
            $update_at        = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'nama_lengkap'      => $nama_lengkap,
                'tempat_lahir'      => $tempat_lahir,
                'tgl_lahir'         => $tgl_lahir,
                'gender'            => $gender,
                'agama'             => $agama,
                'email'             => $email,
                'no_hp'             => $no_hp,
                'alamat'            => $alamat,
                'pangkat'           => $pangkat,
                'jabatan'           => $jabatan,
                'jenis_jabatan'     => $jenis_jabatan,
                'profesi'           => $profesi,
                'divisi'            => $divisi,
                'nik'               => $nik,
                'npwp'              => $npwp,
                'bpjs'              => $bpjs,
                'jenjang'           => $jenjang,
                'prodi'             => $prodi,
                // 'status_pegawai'    => $status_pegawai,
                'kp_terakhir'       => $kp_terakhir,
                'kp_mendatang'      => $kp_mendatang,
                'kgb_terakhir'      => $kgb_terakhir,
                'kgb_mendatang'     => $kgb_mendatang,
                'tmt'               => $tmt,
                'longitude'         => $longitude,
                'latitude'          => $latitude,
                'update_at'         => date('Y-m-d H:i:s')
            );

            $where = array(
                'nip' => $nip
            );

            $this->master_m->update_data('data_pegawai',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('pns/Dashboard');
    }


    public function update_foto()
    {
            $id            = $this->input->post('nip');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $foto     = $_FILES['foto']['name'];
            if ($foto){
                $config ['upload_path']     =   './uploads/foto';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('foto')){

                    $uploadfile = $this->master_m->get10($id)->row();

                    if($uploadfile->foto != null)
                    {
                     $taget_file = './uploads/foto/'.$uploadfile->foto;
                     unlink($taget_file);
                    }
                    $foto=$this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                }else{
                    echo $this->upload->display_errors();
                }
            }


            $data = array(
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'nip' => $id
            );


            $this->master_m->update_data('data_pegawai',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');

            redirect('pns/Dashboard');
    }


    public function update_foto_detail()
    {
            $nip            = $this->input->post('nip');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $foto     = $_FILES['foto']['name'];
            if ($foto){
                $config ['upload_path']     =   './uploads/foto';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('foto')){

                    $uploadfile = $this->master_m->get10($nip)->row();

                    if($uploadfile->foto != null)
                    {
                     $taget_file = './uploads/foto/'.$uploadfile->foto;
                     unlink($taget_file);
                    }
                    $foto=$this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                }else{
                    echo $this->upload->display_errors();
                }
            }


            $data = array(
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'nip' => $nip
            );


            $this->master_m->update_data('data_pegawai',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');

            redirect('admin/Datapegawai/detail_pegawai/'.$nip);
    }


    

}