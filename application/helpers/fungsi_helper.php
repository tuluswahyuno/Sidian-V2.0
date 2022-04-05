<?php 

	function check_already_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		$role = $ci->session->userdata('role');
		if($user_session && $role == 1){
			redirect('admin/dashboard');
		}elseif($user_session && $role == 2){
			redirect('pns/Dashboard/timeline');
		}elseif($user_session && $role == 3){
			redirect('nonpns/Dashboard/timeline');
		}
	}


	function check_not_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		if(!$user_session)
		{
			redirect('auth/login');
		}
	}


 ?>