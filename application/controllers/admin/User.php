<?php 

/**
 * 
 */
class User extends CI_Controller
{
	
	public function index()
	{
		check_not_login();

		$data['user'] = $this->master_m->get_data_pegawai();
		$data['title'] = "Manajemen Data User";

		$data['jenispegawai'] = $this->master_m->get_jenispegawai();

		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 


        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_user',$data);
		$this->load->view('template/footer');
	}


	public function excel()
        {
            if(isset($_FILES["file"]["name"])){
                  // upload
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_type=$_FILES['file']['type'];
                // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
                
                $object = PHPExcel_IOFactory::load($file_tmp);
        
                foreach($object->getWorksheetIterator() as $worksheet){
        
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
        
                    for($row=8; $row<=$highestRow; $row++){
        
                    $nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nip = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $pangkat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $jabatan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $divisi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $profesi = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $hp = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $password = md5($worksheet->getCellByColumnAndRow(10, $row)->getValue());
                    $role = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        

                        $data[] = array(
                            'nama_lengkap'      => $nama,
                            'nip'               => $nip,
                            'pangkat'           => $pangkat,
                            'jabatan'           => $jabatan,
                            'divisi'            => $divisi,
                            'profesi'           => $profesi,
                            'status_pegawai'    => $status,
                            'email'             => $email,
                            'no_hp'             => $hp,
                            'alamat'             => $alamat,
                            'password'          => $password,
                            'role'              => $role,
                        );
        
                    } 
        
                }
        
                $this->db->insert_batch('data_pegawai', $data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                // $this->session->set_flashdata($message);
                // redirect('import');

                $this->session->set_flashdata('flash', 'Diimport');
				redirect('admin/User');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                // $this->session->set_flashdata($message);
                // redirect('import');

                $this->session->set_flashdata('flash', 'Diupdate');
				redirect('admin/User');
            }
        }


	public function ganti_password()
	{
		check_not_login();

		$data['user'] = $this->master_m->get_data_pegawai();
		$data['title'] = "Manajemen Data User";

		$data['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi();

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
		$this->load->view('admin/v_user_ganti_password',$data);
		$this->load->view('template/footer');
	}


	public function ganti_password_nonpns()
	{
		check_not_login();

		$nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal_nonpns($nip);

        $data2['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['title'] = " Data Non PNS ";

        $this->load->view('template/header');
        $this->load->view('template/sidebar_nonpns',$data2);
        $this->load->view('nonpns/v_user_ganti_password',$data);
        $this->load->view('template/footer');
	}


	public function ganti_password_pns()
	{
		check_not_login();

		$nip = $this->session->userdata('nip');

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip);

        $data['pegawai'] = $this->master_m->get_data_pegawai_personal($nip); 

        $data['belum_dibaca'] = $this->master_m->hitung_belum_dibaca($nip);

        $data['title'] = " Data PNS ";

        $this->load->view('template/header_pns',$data);
        $this->load->view('template/sidebar_pns',$data);
        $this->load->view('pns/v_user_ganti_password',$data);
        $this->load->view('template/footer');
	}

	public function update_password_nonpns()
	{
			$id					= $this->input->post('id_user');
			$password			= md5($this->input->post('password'));
			$update_at 			= date('Y-m-d H:i:s');

			date_default_timezone_set('Asia/Jakarta');

			$data = array(
				'password'		=> $password,
				'update_at' 	=> date('Y-m-d H:i:s')
			);

			$where = array(
				'id_user' => $id
			);


			$this->user_m->update_data('data_pegawai',$data,$where);

			$this->session->set_flashdata('flash', 'Diupdate');
			redirect('nonpns/Dashboard');
	}


	public function update_password_pns()
	{
			$id					= $this->input->post('id_user');
			$password			= md5($this->input->post('password'));
			$update_at 			= date('Y-m-d H:i:s');

			date_default_timezone_set('Asia/Jakarta');

			$data = array(
				'password'		=> $password,
				'update_at' 	=> date('Y-m-d H:i:s')
			);

			$where = array(
				'id_user' => $id
			);


			$this->user_m->update_data('data_pegawai',$data,$where);

			$this->session->set_flashdata('flash', 'Diupdate');
			redirect('pns/Dashboard');
	}



	public function tambah_user()
	{
			$nama_lengkap		= $this->input->post('nama_lengkap');
			$nip				= $this->input->post('nip');
			// $pangkat			= $this->input->post('pangkat');
			// $jabatan			= $this->input->post('jabatan');
			$status_pegawai		= $this->input->post('status_pegawai');
			$email				= $this->input->post('email');
			$password			= md5($this->input->post('password'));
			$role				= $this->input->post('role');
			$profesi			= $this->input->post('profesi');

			$data = array(
				'nama_lengkap' 		=> $nama_lengkap,
				'nip' 				=> $nip,
				'pangkat' 			=> "1",
				'jabatan' 			=> "1",
				'divisi' 			=> "1",
				'profesi' 			=> "1",
				'jenjang' 			=> "10",
				'status_pegawai' 	=> $status_pegawai,
				'email' 			=> $email,
				'password' 			=> $password,
				'role' 				=> $role,
			);

			$this->user_m->insert_data($data,'data_pegawai');
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin/User');	
	}


	public function update_user()
	{
			$id					= $this->input->post('id_user');
			$email				= $this->input->post('email');
			// $pangkat			= $this->input->post('pangkat');
			// $jabatan			= $this->input->post('jabatan');
			$role				= $this->input->post('role');
			$update_at 			= date('Y-m-d H:i:s');

			date_default_timezone_set('Asia/Jakarta');

			$data = array(
				'email' 		=> $email,
				// 'pangkat' 		=> $pangkat,
				// 'jabatan' 		=> $jabatan,
				'role'			=> $role,
				'update_at' 	=> date('Y-m-d H:i:s')
			);

			$where = array(
				'id_user' => $id
			);


			$this->user_m->update_data('data_pegawai',$data,$where);

			$this->session->set_flashdata('flash', 'Diupdate');
			redirect('admin/User');
	}


	public function update_password()
	{
			$id					= $this->input->post('id_user');
			$password			= md5($this->input->post('password'));
			$update_at 			= date('Y-m-d H:i:s');

			date_default_timezone_set('Asia/Jakarta');

			$data = array(
				'password'		=> $password,
				'update_at' 	=> date('Y-m-d H:i:s')
			);

			$where = array(
				'id_user' => $id
			);


			$this->user_m->update_data('data_pegawai',$data,$where);

			$this->session->set_flashdata('flash', 'Diupdate');
			redirect('admin/User/ganti_password');
	}


	


	public function delete_user($id){
		$where = array('id_user' => $id);

		$this->user_m->delete_data($where, 'data_pegawai');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/User');

	}


	public function select2pegawai()
    {
        $q = $this->input->post_get('q');
        $start = (int) $this->input->post_get('page');
        $start = $start ? $start - 1 : 0;
        $limit = (int) $this->input->post_get('limit');

        $count = $this->petugas_count($q);
        $data = $this->petugas_data($start, $limit, $q);

        $options = [];
        foreach ($data as $row) {
            $options[] = ['id' => $row->id_user, 'text' => $row->nama_lengkap];
        }

        exit(json_encode(['items' => $options, 'limit' => $limit, 'total_count' => $count]));
    }

    private function petugas_count($q = null)
    {
        return $this->db->like('nama_lengkap', $q)->get('data_pegawai')->num_rows();
    }

    private function petugas_data($start = 0, $limit = 10, $q = null)
    {
        $start = $start * $limit;
        return $this->db
            ->offset($start)
            ->limit($limit)
            ->like('nama_lengkap', $q)
            ->get('data_pegawai')
            ->result();
    }

}

?>