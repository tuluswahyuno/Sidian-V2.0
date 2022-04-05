<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Import extends CI_Controller {

        public function index()
        {
            $data['title'] = 'Import Excel';
            $data['pegawai'] = $this->db->get('data_pegawai')->result();
            $this->load->view('import/index', $data);
        }

        public function create()
        {
            $data['title'] = "Upload File Excel";
            $this->load->view('import/create', $data);
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
        
                    for($row=5; $row<=$highestRow; $row++){
        
                    $nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nip = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $pangkat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $jabatan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $divisi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $profesi = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $password = md5($worksheet->getCellByColumnAndRow(8, $row)->getValue());
                    $role = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        

                        $data[] = array(
                            // 'nim'          => $nim,
                            // 'nama'          =>$nama,
                            // 'angkatan'         =>$angkatan,
                            'nama_lengkap'      => $nama,
                            'nip'               => $nip,
                            'pangkat'           => $pangkat,
                            'jabatan'           => $jabatan,
                            'divisi'            => $divisi,
                            'profesi'           => $profesi,
                            'status_pegawai'    => $status,
                            'email'             => $email,
                            'password'          => $password,
                            'role'              => $role,
                        );
        
                    } 
        
                }
        
                $this->db->insert_batch('data_pegawai', $data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('import');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('import');
            }
        }

    }

    /* End of file Import.php */
    /* Location: ./application/controllers/Import.php */