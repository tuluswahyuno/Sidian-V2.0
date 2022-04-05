<?php 

/**
 * 
 */
class Bankdata extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        

		$data['bankdata'] = $this->master_m->get_data('bankdata')->result();
		
		$data['title'] = "Data Bank Data";

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_master_bankdata',$data);
		$this->load->view('template/footer');
	}


    public function datapns()
    {
        check_not_login();

        $nip = $this->session->userdata('nip');

        $data['bankdata'] = $this->master_m->get_data('bankdata')->result();

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat_pegawai($nip); 
        $data['kompetensi_bulan_ini'] = $this->master_m->hitung_komepetensi_expired_pegawai($nip); 
        
        $data['title'] = "Data Bank Data";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('admin/v_master_bankdata_user',$data);
        $this->load->view('template/footer');
    }


	public function tambah_data()
    {
        $nama_file = $this->input->post('nama_file');

        $file        = $_FILES['file']['name'];
        if ($file=''){}else{
            $config ['upload_path']     =   './uploads/bankdata';
            $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

            $this->load->library('upload', $config); 

            if (!$this->upload->do_upload('file')) {
                echo "File Pendukung Gagal di upload";
            }else{
                $file=$this->upload->data('file_name');

            }
        }
        

        $data = array(
            'nama_file'   	=> $nama_file,
            'file'          => $file,
        );

        $this->master_m->insert_data($data,'bankdata');
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/Bankdata'); 
    }


    public function update_data()
    {
        $id   	        = $this->input->post('id_bankdata');
        $nama_file 		= $this->input->post('nama_file');
        $update_at   	= date('Y-m-d H:i:s');

        date_default_timezone_set('Asia/Jakarta');

        $file     = $_FILES['file']['name'];
            if ($file){
                $config ['upload_path']     =   './uploads/bankdata';
                $config ['allowed_types']   =   'jpg|jpeg|png|pdf|doc|docx|xls|xlsx';

                $this->load->library('upload', $config); 

                if($this->upload->do_upload('file')){

                    $uploadfile = $this->master_m->get2($id)->row();

                    if($uploadfile->file != null)
                    {
                     $taget_file = './uploads/bankdata/'.$uploadfile->file;
                     unlink($taget_file);
                    }
                    $file=$this->upload->data('file_name');
                    $this->db->set('file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'nama_file'   	=> $nama_file,
            'update_at'     => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_bankdata' => $id
        );


        $this->master_m->update_data('bankdata',$data,$where);

        $this->session->set_flashdata('flash', 'Diupdate');
        redirect('admin/Bankdata');
    }



    public function delete_data($id)
    {
        $berkas = $this->master_m->get2($id)->row();
            
        if($berkas->file != null)
        {
            $taget_file = './uploads/bankdata/'.$berkas->file;
            unlink($taget_file);
        }

        $where = array('id_bankdata' => $id);

        $this->master_m->delete_data($where, 'bankdata');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/Bankdata');
    }


}

 ?>