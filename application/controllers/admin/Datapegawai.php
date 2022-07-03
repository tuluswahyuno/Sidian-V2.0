<?php

class Datapegawai extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_pegawai();
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();
        

        $data['title'] = " Data Pegawai ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pegawai_all',$data);
        $this->load->view('template/footer');
    }


    public function pns()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_pegawai_pns();
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

        $data['title'] = " Data PNS ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pegawai_all',$data);
        $this->load->view('template/footer');
    }


    public function pppk()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_pegawai_pppk();
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

        $data['title'] = " Data PPPK ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pegawai_all_pppk',$data);
        $this->load->view('template/footer');
    }

    public function nonpns()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_pegawai_nonpns();

        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
         $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

        $data['title'] = " Data Non ASN ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pegawai_all_nonpns',$data);
        $this->load->view('template/footer');
    }


    public function tidakaktif()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_pegawai_tidakaktif();
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

        $data['title'] = " Data Pegawai Tidak Aktif ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pegawai_tidak_aktif',$data);
        $this->load->view('template/footer');
    }


    public function diklat()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_diklat(); 
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();


        $data['title'] = " Data Diklat Perlu Perpanjang ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_diklat_all',$data);
        $this->load->view('template/footer');
    }


    public function kompetensi()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_kompetensi(); 
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 


        $data['title'] = " SIP/STR Perlu Diperpanjang ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_kompetensi_all',$data);
        $this->load->view('template/footer');
    }


    public function update_kompetensi()
    {
        $id_kompetensi          = $this->input->post('id_kompetensi');
        $tgl_expired     = $this->input->post('tgl_expired');
        $update_at          = date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'tgl_expired'    => $tgl_expired,
            'update_at'         => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_kompetensi' => $id_kompetensi
        );

        $this->master_m->update_data('data_kompetensi',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Datapegawai/kompetensi');
    }

    public function update_diklat()
    {
        $id_diklat          = $this->input->post('id_diklat');
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
        redirect('admin/Datapegawai/diklat');
    }

    public function kp()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_kp(); 
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['title'] = " Data Kenaikan Pangkat ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_kp_all',$data);
        $this->load->view('template/footer');
    }

    public function update_kp()
    {
        $id_user   		= $this->input->post('id_user');
        $kp_terakhir 	= $this->input->post('kp_terakhir');
        $kp_mendatang 	= $this->input->post('kp_mendatang');
        $update_at   	= date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'kp_terakhir'  	=> $kp_terakhir,
            'kp_mendatang'  => $kp_mendatang,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_user' => $id_user
        );


        $this->master_m->update_data('data_pegawai',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Datapegawai/kp');
    }

    public function kgb()
    {
        check_not_login();

        $data['pegawai'] = $this->master_m->get_data_kgb();
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp(); 
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['title'] = " Data Kenaikan Gaji Berkala ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_kgb_all',$data);
        $this->load->view('template/footer');
    }

    public function update_kgb()
    {
        $id_user   		= $this->input->post('id_user');
        $kgb_terakhir 	= $this->input->post('kgb_terakhir');
        $kgb_mendatang 	= $this->input->post('kgb_mendatang');
        $update_at   	= date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'kgb_terakhir'  => $kgb_terakhir,
            'kgb_mendatang' => $kgb_mendatang,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_user' => $id_user
        );


        $this->master_m->update_data('data_pegawai',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Datapegawai/kgb');
    }

    public function detail_pegawai($id)
	{
        check_not_login();

		$data['detail'] = $this->master_m->get_id_pegawai_admin($id);
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['title'] = " Detail Pegawai ";

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_pegawai_detail',$data);
		$this->load->view('template/footer');
	}


    public function detail_pegawai_nonpns($id)
    {

        check_not_login();

        $data['detail'] = $this->master_m->get_id_pegawai_adminnonpns($id);
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['title'] = " Detail Pegawai ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_nonpns',$data);
        $this->load->view('template/footer');
    }

    public function detail_pegawai_update_nonpns($id)
    {
        check_not_login();

        $data['detail'] = $this->master_m->get_id_pegawai_adminnonpns($id);
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['jenispegawai'] = $this->master_m->get_jenispegawai();
        $data['jenisprofesi'] = $this->master_m->get_jenisprofesi();
        $data['jenjangpendidikan'] = $this->master_m->get_jenjangpendidikan();  

        $data['title'] = " Detail Pegawai ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_nonpns_update',$data);
        $this->load->view('template/footer');
    }


	public function detail_pegawai_update($id)
	{
        check_not_login();

		$data['detail'] = $this->master_m->get_id_pegawai_admin($id);
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['jenispegawai'] = $this->master_m->get_jenispegawai();
        $data['jenisprofesi'] = $this->master_m->get_jenisprofesi(); 
        $data['jenjangpendidikan'] = $this->master_m->get_jenjangpendidikan(); 

		$data['title'] = " Detail Pegawai ";

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_pegawai_detail_update',$data);
		$this->load->view('template/footer');
	}

    public function detail_pegawai_nonpns_update_aksi()
    {
            $nip              = $this->input->post('nip');
            $nama_lengkap     = $this->input->post('nama_lengkap');
            $tempat_lahir     = $this->input->post('tempat_lahir');
            $tgl_lahir        = $this->input->post('tgl_lahir');
            $gender           = $this->input->post('gender');
            $agama            = $this->input->post('agama');
            $alamat           = $this->input->post('alamat');
            $pangkat          = $this->input->post('pangkat');
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
            $takehomepay      = $this->input->post('takehomepay');
            $referensi        = $this->input->post('referensi');
            $update_at        = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'nama_lengkap'      => $nama_lengkap,
                'tempat_lahir'      => $tempat_lahir,
                'tgl_lahir'         => $tgl_lahir,
                'gender'            => $gender,
                'agama'             => $agama,
                'alamat'            => $alamat,
                'pangkat'           => $pangkat,
                'jabatan'           => $jabatan,
                'jenis_jabatan'     => $jenis_jabatan,
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
                'takehomepay'       => $takehomepay,
                'referensi'         => $referensi,
                'update_at'         => date('Y-m-d H:i:s')
            );

            $where = array(
                'nip' => $nip
            );

            $this->master_m->update_data('data_pegawai',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('admin/Datapegawai/detail_pegawai_nonpns/'.$nip);
    }

	public function detail_pegawai_update_aksi()
    {
            $nip              = $this->input->post('nip');
            $nama_lengkap     = $this->input->post('nama_lengkap');
            $tempat_lahir     = $this->input->post('tempat_lahir');
            $tgl_lahir        = $this->input->post('tgl_lahir');
            $gender           = $this->input->post('gender');
            $agama            = $this->input->post('agama');
            $email            = $this->input->post('email');
            $no_hp            = $this->input->post('no_hp');
            $profesi          = $this->input->post('profesi');
            $alamat           = $this->input->post('alamat');
            $pangkat          = $this->input->post('pangkat');
            $jabatan          = $this->input->post('jabatan');
            $jenis_jabatan    = $this->input->post('jenis_jabatan');
            $divisi           = $this->input->post('divisi');
            $nik              = $this->input->post('nik');
            $npwp             = $this->input->post('npwp');
            $bpjs             = $this->input->post('bpjs');
            $jenjang          = $this->input->post('jenjang');
            $prodi            = $this->input->post('prodi');
            $status_aktif     = $this->input->post('status_aktif');
            $kp_terakhir      = $this->input->post('kp_terakhir');
            $kp_mendatang     = $this->input->post('kp_mendatang');
            $kgb_terakhir     = $this->input->post('kgb_terakhir');
            $kgb_mendatang    = $this->input->post('kgb_mendatang');
            $tmt              = $this->input->post('tmt');
            $longitude        = $this->input->post('longitude');
            $latitude         = $this->input->post('latitude');
            $takehomepay      = $this->input->post('takehomepay');
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
                'profesi'           => $profesi,
                'alamat'            => $alamat,
                'pangkat'           => $pangkat,
                'jabatan'           => $jabatan,
                'jenis_jabatan'     => $jenis_jabatan,
                'divisi'            => $divisi,
                'nik'               => $nik,
                'npwp'              => $npwp,
                'bpjs'              => $bpjs,
                'jenjang'           => $jenjang,
                'prodi'             => $prodi,
                'status_aktif'      => $status_aktif,
                'kp_terakhir'       => $kp_terakhir,
                'kp_mendatang'      => $kp_mendatang,
                'kgb_terakhir'      => $kgb_terakhir,
                'kgb_mendatang'     => $kgb_mendatang,
                'tmt'               => $tmt,
                'longitude'         => $longitude,
                'latitude'          => $latitude,
                'takehomepay'       => $takehomepay,
                'update_at'         => date('Y-m-d H:i:s')
            );

            $where = array(
                'nip' => $nip
            );

            $this->master_m->update_data('data_pegawai',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('admin/Datapegawai/detail_pegawai/'.$nip);
    }


	public function detail_pendidikan($id)
	{

		$data['title'] = " Detail Pendidikan ";
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['detail'] = $this->master_m->get_id_pegawai($id);
		$data['pendidikan'] = $this->master_m->get_data_pendidikan_personal2($id);

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_pendidikan_detail',$data);
		$this->load->view('template/footer');
	}


    public function detail_pendidikan_nonpns($id)
    {

        $data['title'] = " Detail Pendidikan ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['pendidikan'] = $this->master_m->get_data_pendidikan_personal2($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pendidikan_detail_nonpns',$data);
        $this->load->view('template/footer');
    }

	public function detail_pangkat($id)
	{

		$data['title'] = " Detail Pangkat ";
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['detail'] = $this->master_m->get_id_pegawai($id);
		$data['pangkat'] = $this->master_m->get_data_pangkat_personal($id);

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_pangkat_detail',$data);
		$this->load->view('template/footer');
	}


    public function detail_jabatan($id)
    {

        $data['title'] = " Data Riwayat Jabatan ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['jabatan'] = $this->master_m->get_data_jabatan_personal($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_jabatan_detail',$data);
        $this->load->view('template/footer');
    }


    public function detail_kgb($id)
    {
        check_not_login();

        $data['title'] = " Riwayat Gaji Berkala ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['gajiberkala'] = $this->master_m->get_data_gaji_berkala($id); 

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_kgb_detail',$data);
        $this->load->view('template/footer');
    }


    public function detail_mutasi($id)
    {

        $data['title'] = " Data Riwayat Mutasi Ruang ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['mutasi'] = $this->master_m->get_data_mutasi_personal($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_mutasi_detail',$data);
        $this->load->view('template/footer');
    }


	public function detail_pasangan($id)
	{

		$data['title'] = " Detail Pasangan ";
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['detail'] = $this->master_m->get_id_pegawai($id);
		$data['pasangan'] = $this->master_m->get_data_pasangan_personal2($id);

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_pasangan_detail',$data);
		$this->load->view('template/footer');
	}


    public function detail_pasangan_nonpns($id)
    {

        $data['title'] = " Detail Pasangan ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['pasangan'] = $this->master_m->get_data_pasangan_personal2($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_pasangan_detail_nonpns',$data);
        $this->load->view('template/footer');
    }


	public function detail_anak($id)
	{

		$data['title'] = " Detail Anak ";
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['detail'] = $this->master_m->get_id_pegawai($id);
		$data['anak'] = $this->master_m->get_data_anak_personal2($id);

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_anak_detail',$data);
		$this->load->view('template/footer');
	}

    public function detail_anak_nonpns($id)
    {

        $data['title'] = " Detail Anak ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['anak'] = $this->master_m->get_data_anak_personal2($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_anak_detail_nonpns',$data);
        $this->load->view('template/footer');
    }


	public function detail_diklat($id)
	{

		$data['title'] = " Detail Diklat ";
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['detail'] = $this->master_m->get_id_pegawai($id);
		$data['diklat'] = $this->master_m->get_data_diklat_personal2($id);

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_diklat_detail',$data);
		$this->load->view('template/footer');
	}

    public function detail_diklat_nonpns($id)
    {

        $data['title'] = " Detail Diklat ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['diklat'] = $this->master_m->get_data_diklat_personal2($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_diklat_detail_nonpns',$data);
        $this->load->view('template/footer');
    }


	public function detail_berkas($id)
	{

		$data['title'] = " Detail Berkas ";
		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

		$data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['jenisberkas'] = $this->master_m->get_jenisberkas(); 
		$data['berkas'] = $this->master_m->get_data_berkas_personal2($id);

		$this->load->view('template/header');
    	$this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_data_berkas_detail',$data);
		$this->load->view('template/footer');
	}

    public function detail_berkas_nonpns($id)
    {

        $data['title'] = " Detail Berkas ";
        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        $data['detail'] = $this->master_m->get_id_pegawai($id);
        $data['berkas'] = $this->master_m->get_data_berkas_personal2($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('admin/v_data_berkas_detail_nonpns',$data);
        $this->load->view('template/footer');
    }


    public function select2nip()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count($q);
        $data = $this->petugas_data($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->nip, 'text' => $row->nip];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count($q = null)
    {
        return $this->db->like('nip', $q)->get('data_pegawai')->num_rows();
    }

    private function petugas_data($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('nip', $q)
            ->get('data_pegawai')
            ->result();
    }

}