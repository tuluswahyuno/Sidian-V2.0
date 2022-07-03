<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        check_not_login();
        
        $data['title'] = " Dashboard ";

        $data['kp_bulan_ini']   = $this->master_m->hitung_kp();
        $data['kgb_bulan_ini']  = $this->master_m->hitung_kgb();
        
        $data['total_pns']      = $this->master_m->hitung_total_pns();
        $data['total_pppk']      = $this->master_m->hitung_total_pppk();
        $data['total_non_pns']  = $this->master_m->hitung_total_non_pns();

        $data['total_pegawai']  = $data['total_pns'] + $data['total_non_pns'] + $data['total_pppk'];

        $data3['diklat_bulan_ini'] = $this->master_m->hitung_diklat(); 
        $data3['kp_bulan_ini'] = $this->master_m->hitung_kp();
        $data3['kgb_bulan_ini'] = $this->master_m->hitung_kgb();
        $data3['kompetensi_expired'] = $this->master_m->hitung_kompetensi(); 
        

        foreach($this->model_grafik->statistik_surat()->result_array() as $row)
         {
          $data2['grafik'][]=(float)$row['II/a'];
          $data2['grafik'][]=(float)$row['II/b'];
          $data2['grafik'][]=(float)$row['II/c'];
          $data2['grafik'][]=(float)$row['II/d'];
          $data2['grafik'][]=(float)$row['III/a'];
          $data2['grafik'][]=(float)$row['III/b'];
          $data2['grafik'][]=(float)$row['III/c'];
          $data2['grafik'][]=(float)$row['III/d'];
          $data2['grafik'][]=(float)$row['IV/a'];
          $data2['grafik'][]=(float)$row['IV/b'];
          $data2['grafik'][]=(float)$row['IV/c'];
          $data2['grafik'][]=(float)$row['IV/d'];
          $data2['grafik'][]=(float)$row['IV/e'];
         }


        foreach($this->model_grafik->statistik_jenis()->result_array() as $row)
         {
          $data2['grafik1'][]=(float)$row['Laki-laki'];
          $data2['grafik1'][]=(float)$row['Perempuan'];
         }

        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data3);
        $this->load->view('admin/v_dashboard_admin',$data);
        $this->load->view('template/footer',$data2);
    }
}

?>