<?php 

class Pasangan extends CI_Controller
{

	public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pasangan'] = $this->master_m->get_data_pasangan_personal($nip); 

        $data2['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['title'] = " Keluarga ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar_nonpns',$data2);
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
            );

            $this->master_m->insert_data($data,'data_pasangan');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('nonpns/Pasangan'); 
    }

    public function update_pasangan()
    {
            $id_pasangan   = $this->input->post('id_pasangan');
            $nama_pasangan = $this->input->post('nama_pasangan');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $pekerjaan     = $this->input->post('pekerjaan');
            $tgl_nikah     = $this->input->post('tgl_nikah');
            $pasangan_ke   = $this->input->post('pasangan_ke');
            $agama         = $this->input->post('agama');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'nama_pasangan' => $nama_pasangan,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'pekerjaan'     => $pekerjaan,
                'tgl_nikah'     => $tgl_nikah,
                'pasangan_ke'   => $pasangan_ke,
                'agama'         => $agama,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_pasangan' => $id_pasangan
            );


            $this->master_m->update_data('data_pasangan',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('nonpns/Pasangan');
    }

    public function delete_pasangan($id)
    {

        $where = array('id_pasangan' => $id);

        $this->master_m->delete_data($where, 'data_pasangan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('nonpns/Pasangan');
    }


    public function delete_pasangan_detail($id)
    {
        $nip = $this->master_m->get_data_pasangan_by_id($id)->nip;

        $where = array('id_pasangan' => $id);

        $this->master_m->delete_data($where, 'data_pasangan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_pasangan/'.$nip);
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
            );

            $this->master_m->insert_data($data,'data_pasangan');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/Datapegawai/detail_pasangan/'.$nip); 
    }

    public function update_pasangan_detail()
    {
            $nip           = $this->input->post('nip');
            $id_pasangan   = $this->input->post('id_pasangan');
            $nama_pasangan = $this->input->post('nama_pasangan');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tgl_lahir     = $this->input->post('tgl_lahir');
            $nik           = $this->input->post('nik');
            $pekerjaan     = $this->input->post('pekerjaan');
            $tgl_nikah     = $this->input->post('tgl_nikah');
            $pasangan_ke   = $this->input->post('pasangan_ke');
            $agama         = $this->input->post('agama');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'nama_pasangan' => $nama_pasangan,
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir'     => $tgl_lahir,
                'nik'           => $nik,
                'pekerjaan'     => $pekerjaan,
                'tgl_nikah'     => $tgl_nikah,
                'pasangan_ke'   => $pasangan_ke,
                'agama'         => $agama,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_pasangan' => $id_pasangan
            );


            $this->master_m->update_data('data_pasangan',$data,$where);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('admin/Datapegawai/detail_pasangan/'.$nip);
    }

}