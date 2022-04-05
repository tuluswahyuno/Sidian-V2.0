<?php 



class Cetak extends CI_Controller{



	public function index()

	{

		$data['title'] = "Cetak Berdasarkan Filter Data";

		$data['profesi'] = $this->db->get('profesi')->result(); 

		$data['status'] = $this->db->get('jenis_pegawai')->result(); 

		

		

		// $this->load->view('laporan/filter',$data);



        $data['pegawai'] = $this->master_m->get_data_pegawai();

        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();

        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 

        



        // $data['title'] = " Data Pegawai ";



        $this->load->view('template/header');

        $this->load->view('template/sidebar',$data);

        $this->load->view('laporan/filter',$data);

        $this->load->view('template/footer');

	}



	public function filter($id)

	{

		if($id == 0){

			// $data = $this->db->get('data_pegawai')->result();

			$data = $this->master_m->rumus_filter_full();

		}else{



		// $data = $this->db->get_where('data_pegawai',['profesi'=>$id])->result();



		$data = $this->master_m->rumus_filter($id);

		// $data['kp_bulan_ini'] = $this->master_m->hitung_kp();

		}



		$dt['pegawai'] = $data;

		$dt['profesi'] = $id;



		$this->load->view('laporan/result',$dt);

	}





	public function print($id)

	{

		if($id == 0){

			// $data = $this->db->get('data_pegawai')->result();

			$data = $this->master_m->rumus_filter_full();

		}else{



			// $data = $this->db->get_where('data_pegawai',['profesi'=>$id])->result();

			$data = $this->master_m->rumus_filter($id);

		}



		$dt['pegawai'] = $data;



  		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator

        $this->load->library('pdfgenerator');

        

        // title dari pdf

        // $this->data['title_pdf'] = 'Laporan';

        

        // filename dari pdf ketika didownload

        $file_pdf = 'data pegawai';

        // setting paper

        $paper = 'A4';

        //orientasi paper potrait / landscape

        $orientation = "landscape";

        

		$html = $this->load->view('laporan/cetakdata',$dt, true);	    

        

        // run dompdf

        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);



	}





	



}

?>