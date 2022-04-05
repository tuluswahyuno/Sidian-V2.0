<?php 

	/**
	 * 
	 */
	class NotFound extends CI_Controller
	{
		
		function index()
		{
			// echo "Ini halaman eror";
			$this->load->view('errors/NotFound');
		}
	}

 ?>