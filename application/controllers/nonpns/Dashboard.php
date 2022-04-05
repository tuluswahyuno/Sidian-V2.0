<?php 

class Dashboard extends CI_Controller
{

    public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['title'] = " Dashboard ";

        $this->load->view('template/header_nonpns',$data);
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('nonpns/v_data_nonpns_new',$data);
        $this->load->view('template/footer');
    }

    public function timeline()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip); 

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['title'] = " Dashboard ";

        $this->load->view('template/header_nonpns',$data);
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('pns/v_dashboard_pns',$data);
        $this->load->view('template/footer');
    }


    public function update_data()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 
        $data['jenispegawai'] = $this->master_m->get_jenispegawai(); 

        $data['jenisprofesi'] = $this->master_m->get_jenisprofesi(); 
        $data['jenjangpendidikan'] = $this->master_m->get_jenjangpendidikan(); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['title'] = " Dashboard ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('nonpns/v_data_nonpns_update',$data);
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
            $profesi          = $this->input->post('profesi');
            $alamat           = $this->input->post('alamat');
            $jabatan          = $this->input->post('jabatan');
            $jenis_jabatan    = $this->input->post('jenis_jabatan');
            $divisi           = $this->input->post('divisi');
            $nik              = $this->input->post('nik');
            $npwp             = $this->input->post('npwp');
            $bpjs             = $this->input->post('bpjs');
            $jenjang             = $this->input->post('jenjang');
            $prodi             = $this->input->post('prodi');
            // $status_pegawai   = $this->input->post('status_pegawai');
            $tmt              = $this->input->post('tmt');
            $longitude        = $this->input->post('longitude');
            $latitude         = $this->input->post('latitude');
            $no_hp            = $this->input->post('no_hp');
            $update_at        = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'nama_lengkap'      => $nama_lengkap,
                'tempat_lahir'      => $tempat_lahir,
                'tgl_lahir'         => $tgl_lahir,
                'gender'            => $gender,
                'agama'             => $agama,
                'profesi'           => $profesi,
                'alamat'            => $alamat,
                'jabatan'           => $jabatan,
                'jenis_jabatan'     => $jenis_jabatan,
                'divisi'            => $divisi,
                'nik'               => $nik,
                'npwp'              => $npwp,
                'bpjs'              => $bpjs,
                'jenjang'              => $jenjang,
                'prodi'              => $prodi,
                // 'status_pegawai'    => $status_pegawai,
                'tmt'               => $tmt,
                'longitude'         => $longitude,
                'latitude'          => $latitude,
                'no_hp'             => $no_hp,
                'update_at'         => date('Y-m-d H:i:s')
            );

            $where = array(
                'nip' => $nip
            );

            $this->master_m->update_data('data_pegawai',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('nonpns/dashboard');
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

            redirect('nonpns/Dashboard');
    }


    

}