<?php 



class CetakNonASN extends CI_Controller{



	public function index()

	{
		check_not_login();

		$data['title'] = "Cetak Berdasarkan Filter Data";

		$data['profesi'] = $this->db->get('profesi')->result(); 		

		

		// $this->load->view('laporan/filter',$data);



        $data['pegawai'] = $this->master_m->get_data_pegawai();

        $data['kp_bulan_ini'] = $this->master_m->hitung_kp();

        $data['kgb_bulan_ini'] = $this->master_m->hitung_kgb(); 

        $data['diklat_bulan_ini'] = $this->master_m->hitung_diklat();
        $data['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 

        



        // $data['title'] = " Data Pegawai ";



        $this->load->view('template/header');

        $this->load->view('template/sidebar',$data);

        $this->load->view('laporan/filter_non_asn',$data);

        $this->load->view('template/footer');

	}



	public function filter($id)

	{

		if($id == 0){

			// $data = $this->db->get('data_pegawai')->result();

			$data = $this->master_m->rumus_filter_full_non_asn();

		}else{



		// $data = $this->db->get_where('data_pegawai',['profesi'=>$id])->result();



		$data = $this->master_m->rumus_filter_non_asn($id);

		// $data['kp_bulan_ini'] = $this->master_m->hitung_kp();

		}



		$dt['pegawai'] = $data;

		$dt['profesi'] = $id;



		$this->load->view('laporan/result_non_asn',$dt);

	}





	



	public function print($id)

	{

		if($id == 0){

			// $data = $this->db->get('data_pegawai')->result();

			$data = $this->master_m->rumus_filter_full_non_asn();

		}else{



			// $data = $this->db->get_where('data_pegawai',['profesi'=>$id])->result();

			$data = $this->master_m->rumus_filter_non_asn($id);

		}



		$dt['pegawai'] = $data;



		// $this->load->library('mypdf');

		// $this->load->library('pdfgenerator');

  // 		$this->pdfgenerator->generate('laporan/cetakdata', $dt, 'data-pegawai', 'A4', 'landscape');





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

        

		$html = $this->load->view('laporan/cetakdata_non_asn',$dt, true);	    

        

        // run dompdf

        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);



	}

}





?>