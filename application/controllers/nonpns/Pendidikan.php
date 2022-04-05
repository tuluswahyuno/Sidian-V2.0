<?php 

class Pendidikan extends CI_Controller
{

    public function index()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['pendidikan'] = $this->master_m->get_data_pendidikan_personal($nip); 

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 

        $data['title'] = " Pendidikan ";

        $this->load->view('template/header_nonpns',$data);
        $this->load->view('template/sidebar_nonpns',$data);
        $this->load->view('nonpns/v_data_pendidikan',$data);
        $this->load->view('template/footer');
    }


    public function tambah_pendidikan()
    {
            $nip            = $this->session->userdata('nip');
            $jenjang       = $this->input->post('jenjang');
            $nama_sekolah  = $this->input->post('nama_sekolah');
            $jurusan       = $this->input->post('jurusan');
            $tgl_lulus     = $this->input->post('tgl_lulus');

            $ijazah        = $_FILES['ijazah']['name'];
            if ($ijazah=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('ijazah')) {
                    echo "File Pendukung Gagal di upload";
                }else{
                    $ijazah=$this->upload->data('file_name');

                }
            }


            $transkrip        = $_FILES['transkrip']['name'];
            if ($transkrip=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('transkrip')) {
                    echo "File Pendukung Gagal di upload";
                }else{
                    $transkrip=$this->upload->data('file_name');

                }
            }

            $data = array(
                'nip'           => $nip,
                'jenjang'       => $jenjang,
                'nama_sekolah'  => $nama_sekolah,
                'jurusan'       => $jurusan,
                'tgl_lulus'     => $tgl_lulus,
                'ijazah'        => $ijazah,
                'transkrip'     => $transkrip,
            );

            $data1 = array(
            'jenjang'       => $jenjang,
            'prodi'         => $jurusan,
            'update_at'     => date('Y-m-d H:i:s')
            );

            $where1 = array(
                'nip' => $nip
            );

            $this->master_m->insert_data($data,'data_pendidikan');

            $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('nonpns/Pendidikan'); 
    }

    public function update_pendidikan()
    {
            $id = $this->input->post('id_pendidikan');
            $nip        = $this->input->post('nip');
            $jenjang       = $this->input->post('jenjang');
            $nama_sekolah  = $this->input->post('nama_sekolah');
            $jurusan       = $this->input->post('jurusan');
            $tgl_lulus     = $this->input->post('tgl_lulus');
            $update_at     = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');

            $ijazah     = $_FILES['ijazah']['name'];
            if ($ijazah){
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('ijazah')){

                    $uploadfile = $this->master_m->get4($id)->row();

                    if($uploadfile->ijazah != null)
                    {
                     $taget_file = './uploads/non-pns/pendidikan/'.$uploadfile->ijazah;
                     unlink($taget_file);
                    }
                    $ijazah=$this->upload->data('file_name');
                    $this->db->set('ijazah', $ijazah);
                }else{
                    echo $this->upload->display_errors();
                }
            }


            $transkrip     = $_FILES['transkrip']['name'];
            if ($transkrip){
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('transkrip')){

                    $uploadfile = $this->master_m->get4($id)->row();

                    if($uploadfile->transkrip != null)
                    {
                     $taget_file = './uploads/non-pns/pendidikan/'.$uploadfile->transkrip;
                     unlink($taget_file);
                    }
                    $transkrip=$this->upload->data('file_name');
                    $this->db->set('transkrip', $transkrip);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'jenjang'       => $jenjang,
                'nama_sekolah'  => $nama_sekolah,
                'jurusan'       => $jurusan,
                'tgl_lulus'     => $tgl_lulus,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_pendidikan' => $id
            );


            $data1 = array(
            'jenjang'       => $jenjang,
            'prodi'         => $jurusan,
            'update_at'     => date('Y-m-d H:i:s')
            );

            $where1 = array(
                'nip' => $nip
            );


            $this->master_m->update_data('data_pendidikan',$data,$where);

            $this->master_m->update_data('data_pegawai',$data1,$where1);

            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('nonpns/Pendidikan');
    }

    public function tambah_pendidikan_detail()
    {
            $nip           = $this->input->post('nip');
            $jenjang       = $this->input->post('jenjang');
            $nama_sekolah  = $this->input->post('nama_sekolah');
            $jurusan       = $this->input->post('jurusan');
            $tgl_lulus     = $this->input->post('tgl_lulus');

            $ijazah        = $_FILES['ijazah']['name'];
            if ($ijazah=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('ijazah')) {
                    echo "File Pendukung Gagal di upload";
                }else{
                    $ijazah=$this->upload->data('file_name');

                }
            }


            $transkrip        = $_FILES['transkrip']['name'];
            if ($transkrip=''){}else{
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if (!$this->upload->do_upload('transkrip')) {
                    echo "File Pendukung Gagal di upload";
                }else{
                    $transkrip=$this->upload->data('file_name');

                }
            }

            $data = array(
                'nip'           => $nip,
                'jenjang'       => $jenjang,
                'nama_sekolah'  => $nama_sekolah,
                'jurusan'       => $jurusan,
                'tgl_lulus'     => $tgl_lulus,
                'ijazah'        => $ijazah,
                'transkrip'     => $transkrip,
            );

            $data1 = array(
            'jenjang'       => $jenjang,
            'prodi'         => $jurusan,
            'update_at'     => date('Y-m-d H:i:s')
            );

            $where1 = array(
                'nip' => $nip
            );

            $this->master_m->insert_data($data,'data_pendidikan');

            $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);
            
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/Datapegawai/detail_pendidikan_nonpns/'.$nip);
    }



    public function update_pendidikan_detail()
    {
            $id = $this->input->post('id_pendidikan');
            $nip           = $this->input->post('nip');
            $jenjang       = $this->input->post('jenjang');
            $nama_sekolah  = $this->input->post('nama_sekolah');
            $jurusan       = $this->input->post('jurusan');
            $tgl_lulus     = $this->input->post('tgl_lulus');
            $update_at          = date('Y-m-d H:i:s');

            date_default_timezone_set('Asia/Jakarta');


            $ijazah     = $_FILES['ijazah']['name'];
            if ($ijazah){
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('ijazah')){

                    $uploadfile = $this->master_m->get4($id)->row();

                    if($uploadfile->ijazah != null)
                    {
                     $taget_file = './uploads/non-pns/pendidikan/'.$uploadfile->ijazah;
                     unlink($taget_file);
                    }
                    $ijazah=$this->upload->data('file_name');
                    $this->db->set('ijazah', $ijazah);
                }else{
                    echo $this->upload->display_errors();
                }
            }


            $transkrip     = $_FILES['transkrip']['name'];
            if ($transkrip){
                $config ['upload_path']     =   './uploads/non-pns/pendidikan';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('transkrip')){

                    $uploadfile = $this->master_m->get4($id)->row();

                    if($uploadfile->transkrip != null)
                    {
                     $taget_file = './uploads/non-pns/pendidikan/'.$uploadfile->transkrip;
                     unlink($taget_file);
                    }
                    $transkrip=$this->upload->data('file_name');
                    $this->db->set('transkrip', $transkrip);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'jenjang'       => $jenjang,
                'nama_sekolah'  => $nama_sekolah,
                'jurusan'       => $jurusan,
                'tgl_lulus'     => $tgl_lulus,
                'update_at'     => date('Y-m-d H:i:s')
            );

            $where = array(
                'id_pendidikan' => $id
            );

            $data1 = array(
            'jenjang'       => $jenjang,
            'prodi'         => $jurusan,
            'update_at'     => date('Y-m-d H:i:s')
            );

            $where1 = array(
                'nip' => $nip
            );


            $this->master_m->update_data('data_pendidikan',$data,$where);

            $this->master_m->update_data_jabatan('data_pegawai',$data1,$where1);

            $this->session->set_flashdata('flash', 'Diupdate');
            // redirect('admin/datapegawai/detail_pendidikan/'.$nip);
            redirect('admin/Datapegawai/detail_pendidikan_nonpns/'.$nip);
    }


    public function delete_pendidikan($id)
    {

        $berkas = $this->master_m->get4($id)->row();
            
        if($berkas->ijazah != null)
        {
            $taget_file = './uploads/non-pns/pendidikan/'.$berkas->ijazah;
            unlink($taget_file);
        }

        if($berkas->transkrip != null)
        {
            $taget_file = './uploads/non-pns/pendidikan/'.$berkas->transkrip;
            unlink($taget_file);
        }


        $where = array('id_pendidikan' => $id);

        $this->master_m->delete_data($where, 'data_pendidikan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('nonpns/Pendidikan'); 
    }


    public function delete_pendidikan_detail($id)
    {
        $nip = $this->master_m->get_data_pendidikan_by_id($id)->nip;

        $berkas = $this->master_m->get4($id)->row();
            
        if($berkas->ijazah != null)
        {
            $taget_file = './uploads/non-pns/pendidikan/'.$berkas->ijazah;
            unlink($taget_file);
        }

        if($berkas->transkrip != null)
        {
            $taget_file = './uploads/non-pns/pendidikan/'.$berkas->transkrip;
            unlink($taget_file);
        }

        $where = array('id_pendidikan' => $id);

        $this->master_m->delete_data($where, 'data_pendidikan');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Datapegawai/detail_pendidikan_nonpns/'.$nip);
    }


    public function select2pendidikan()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count($q);
        $data = $this->petugas_data($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_masterpendidikan, 'text' => $row->pendidikan];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count($q = null)
    {
        return $this->db->like('pendidikan', $q)->get('pendidikan')->num_rows();
    }

    private function petugas_data($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('pendidikan', $q)
            ->get('pendidikan')
            ->result();
    }




}