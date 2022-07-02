<?php 

class Master_m extends CI_Model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($table,$data,$where)
	{
		$this->db->update($table,$data,$where);
	}

    public function update_data_jabatan($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }

	public function delete_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

    public function nilai_max($nip)
    {
        $query = $this->db->query("SELECT * FROM data_jabatan WHERE nip='$nip' ORDER BY id_jabatan DESC LIMIT 1;");
        return $query->row();
    }


    public function sudah_baca($id)
    {
        $query = $this->db->query("UPDATE data_mutasi SET status_baca = '1' where id_mutasi = '$id';");
        return true;
    }


    public function hitung_belum_dibaca($nip)
    {   
        $query = $this->db->query("SELECT * FROM data_mutasi WHERE nip='$nip' and status_baca='0' ORDER BY id_mutasi DESC;");
        return $query->num_rows();
    }

	public function get($id)
    {
        $query = $this->db->get_where('data_berkas', array('id_berkas' => $id), null, null);
        return $query;
    }

    public function get2($id)
    {
        $query = $this->db->get_where('bankdata', array('id_bankdata' => $id), null, null);
        return $query;
    }


    public function get3($id)
    {
        $query = $this->db->get_where('data_mutasi', array('id_mutasi' => $id), null, null);
        return $query;
    }


    public function get4($id)
    {
        $query = $this->db->get_where('data_pendidikan', array('id_pendidikan' => $id), null, null);
        return $query;
    }

    public function get5($id)
    {
        $query = $this->db->get_where('data_pangkat', array('id_pangkat' => $id), null, null);
        return $query;
    }


    public function get6($id)
    {
        $query = $this->db->get_where('data_jabatan', array('id_jabatan' => $id), null, null);
        return $query;
    }


    public function get7($id)
    {
        $query = $this->db->get_where('data_diklat', array('id_diklat' => $id), null, null);
        return $query;
    }


    public function get8($id)
    {
        $query = $this->db->get_where('data_anak', array('id_anak' => $id), null, null);
        return $query;
    }

    public function get9($id)
    {
        $query = $this->db->get_where('data_pasangan', array('id_pasangan' => $id), null, null);
        return $query;
    }


    public function get10($id)
    {
        $query = $this->db->get_where('data_pegawai', array('nip' => $id), null, null);
        return $query;
    }

    public function get11($id)
    {
        $query = $this->db->get_where('data_gajiberkala', array('id_gajiberkala' => $id), null, null);
        return $query;
    }


    public function get_file_kompetensi($id)
    {
        $query = $this->db->get_where('data_kompetensi', array('id_kompetensi' => $id), null, null);
        return $query;
    }

	public function get_data_pegawai_personal($nip)
    {
        
        $query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, unitkerja u,jabatan j, profesi pr, jenis_pegawai jp, pendidikan pd WHERE dp.pangkat = p.id_masterpangkat and dp.jabatan = j.id_masterjabatan and dp.divisi = u.id_unitkerja and dp.profesi = pr.id_profesi and dp.status_pegawai = jp.id_jenispegawai and dp.jenjang = pd.id_masterpendidikan and nip='$nip';");
        return $query->row();
    }


    public function rumus_filter($id)
    {
        
        $query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, unitkerja u,jabatan j, profesi pr, jenis_pegawai jp WHERE dp.pangkat = p.id_masterpangkat and dp.jabatan = j.id_masterjabatan and dp.divisi = u.id_unitkerja and dp.profesi = pr.id_profesi and dp.status_pegawai = jp.id_jenispegawai and dp.profesi='$id' AND status_pegawai = '1' AND status_aktif='1';");
        return $query->result();
    }


    public function rumus_filter_full()
    {
         $query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, unitkerja u,jabatan j, profesi pr, jenis_pegawai jp WHERE dp.pangkat = p.id_masterpangkat and dp.jabatan = j.id_masterjabatan and dp.divisi = u.id_unitkerja and dp.profesi = pr.id_profesi and dp.status_pegawai = jp.id_jenispegawai AND status_pegawai = '1' AND status_aktif='1';");
        return $query->result();
    }


    public function rumus_filter_non_asn($id)
    {
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan_nonpns j, profesi pr, jenis_pegawai jp WHERE dp.jabatan = j.id_jabatannonpns and dp.divisi = u.id_unitkerja and dp.profesi = pr.id_profesi and dp.status_pegawai = jp.id_jenispegawai and dp.profesi=pr.id_profesi and dp.profesi='$id' AND status_pegawai = '3' AND status_aktif='1';");
        return $query->result();
    }


    public function rumus_filter_full_non_asn()
    {
        
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan_nonpns j, profesi pr, jenis_pegawai jp WHERE dp.jabatan = j.id_jabatannonpns and dp.divisi = u.id_unitkerja and dp.profesi = pr.id_profesi and dp.status_pegawai = jp.id_jenispegawai and dp.profesi=pr.id_profesi AND status_pegawai = '3';");
        return $query->result();
    }

    public function get_data_pegawai_personal_nonpns($nip)
    {
        //$query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, jabatan j WHERE dp.pangkat = p.id_masterpangkat and nip='$nip';");
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan_nonpns jp, profesi pr, jenis_pegawai jpeg, pendidikan pd WHERE u.id_unitkerja = dp.divisi AND dp.jabatan = jp.id_jabatannonpns AND dp.profesi = pr.id_profesi AND dp.status_pegawai = jpeg.id_jenispegawai AND dp.jenjang = pd.id_masterpendidikan AND nip='$nip';");
        return $query->row();
    }

    public function get_data_pendidikan_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM pendidikan p, data_pendidikan dp where p.id_masterpendidikan = dp.jenjang and dp.nip = $nip;");
        return $query->result();
    }

    public function get_data_pendidikan_personal2($id)
    {
        $query = $this->db->query("SELECT * FROM pendidikan p, data_pendidikan dp where p.id_masterpendidikan = dp.jenjang and dp.nip = $id;");
        return $query->result();
    }

    public function get_data_mutasi()
    {
        $query = $this->db->query("SELECT * FROM data_mutasi dm, data_pegawai dp, unitkerja uk WHERE dm.nip = dp.nip AND dm.tujuan = uk.id_unitkerja order by id_mutasi;");
        return $query->result();
    }

    public function get_data_mutasi_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_mutasi dm, data_pegawai dp, unitkerja uk WHERE dm.nip = dp.nip AND dm.tujuan = uk.id_unitkerja AND dm.nip = '$nip' order by id_mutasi;");
        return $query->result();
    }

    public function get_data_pegawai()
    {
        $query = $this->db->query("SELECT * FROM data_pegawai order by id_user;");
        return $query->result();
    }

    public function get_data_pegawai_pns()
    {
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan jp, pangkat p WHERE u.id_unitkerja = dp.divisi AND jp.id_masterjabatan = dp.jabatan AND dp.pangkat = p.id_masterpangkat AND status_pegawai = '1' AND status_aktif ='1' order by id_user;");
        return $query->result();
    }

    public function get_data_pegawai_nonpns()
    {
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan_nonpns jp WHERE u.id_unitkerja = dp.divisi AND jp.id_jabatannonpns = dp.jabatan AND status_pegawai = '3' AND status_aktif ='1' order by id_user;");
        return $query->result();
    }


    public function get_data_pegawai_pppk()
    {
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan jp, pangkat p WHERE u.id_unitkerja = dp.divisi AND jp.id_masterjabatan = dp.jabatan AND dp.pangkat = p.id_masterpangkat AND status_pegawai = '2' AND status_aktif ='1' order by id_user;");
        return $query->result();
    }

    public function get_data_pegawai_tidakaktif()
    {
        $query = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u WHERE u.id_unitkerja = dp.divisi AND status_aktif ='2' order by id_user;");
        return $query->result();
    }

    public function get_data_kp()
    {
        //$query = $this->db->query("SELECT * FROM data_pegawai WHERE MONTH(kp_mendatang) = MONTH(CURDATE());");
        // $query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, jabatan j, unitkerja u WHERE MONTH(kp_mendatang) = MONTH(CURDATE()) and dp.pangkat = p.id_masterpangkat and dp.divisi=u.id_unitkerja and dp.jabatan = j.id_masterjabatan;");

        $query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, jabatan j, unitkerja u where kp_mendatang between date(now()) and date(date_add(now(), interval +3 month)) and dp.pangkat = p.id_masterpangkat and dp.divisi=u.id_unitkerja and dp.jabatan = j.id_masterjabatan order by kp_mendatang asc;");
        return $query->result();
    }


    public function get_data_kgb()
    {
        //$query = $this->db->query("SELECT * FROM data_pegawai WHERE MONTH(kgb_mendatang) = MONTH(CURDATE());");

        $query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, jabatan j, unitkerja u where kgb_mendatang between date(now()) and date(date_add(now(), interval +3 month)) and dp.pangkat = p.id_masterpangkat and dp.divisi=u.id_unitkerja and dp.jabatan = j.id_masterjabatan order by kgb_mendatang asc;");
        return $query->result();
    }


    public function get_data_diklat()
    {
        // $query = $this->db->query("SELECT * FROM data_pegawai dp, data_diklat d WHERE MONTH(berlaku_sampai) = MONTH(CURDATE()) and YEAR(berlaku_sampai) = YEAR(CURDATE()) and dp.nip = d.nip;");

        $query = $this->db->query("SELECT * from data_diklat dd, data_pegawai dp where dd.berlaku_sampai between date(now()) and date(date_add(now(), interval +3 MONTH)) AND dd.nip = dp.nip ORDER BY berlaku_sampai DESC;");

        // Select * from data_diklat where berlaku_sampai between date(now()) and date(date_add(now(), interval +3 month))
        return $query->result();
    }

    public function get_data_diklat_pegawai($nip)
    {
        // $query = $this->db->query("SELECT * FROM data_pegawai dp, data_diklat d WHERE MONTH(berlaku_sampai) = MONTH(CURDATE()) and YEAR(berlaku_sampai) = YEAR(CURDATE()) and dp.nip = d.nip;");

        $query = $this->db->query("SELECT * from data_diklat dd, data_pegawai dp where dd.berlaku_sampai between date(now()) and date(date_add(now(), interval +3 MONTH)) AND dd.nip = dp.nip AND dd.nip = '$nip' ORDER BY berlaku_sampai DESC;");

        // Select * from data_diklat where berlaku_sampai between date(now()) and date(date_add(now(), interval +3 month))
        return $query->result();
    }


    public function get_data_kompetensi_pegawai($nip)
    {

        $query = $this->db->query("SELECT * from data_kompetensi where tgl_expired between date(now()) and date(date_add(now(), interval +3 month)) AND nip = '$nip' ORDER BY tgl_expired DESC;");

        return $query->result();
    }

    public function notif_diklat($where)
    {
        $query = $this->db->query("UPDATE data_diklat SET notif = DATE_ADD(berlaku_sampai, INTERVAL -6 MONTH) where diklat ='$where';");
        return true;
    }

    public function get_id_pegawai($id)
	{
		$hasil = $this->db->where('nip', $id)->get('data_pegawai');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return false;
		}
	}


    public function get_id_pegawai_admin($id)
    {
        // $hasil = $this->db->where('nip', $id)->get('data_pegawai');
        // $hasil = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, jabatan j, unitkerja u WHERE dp.pangkat = p.id_masterpangkat and dp.divisi = u.id_unitkerja and dp.jabatan = j.id_masterjabatan and nip='$id';");

        $hasil = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p, unitkerja u,jabatan j, profesi pr, jenis_pegawai jp, pendidikan pd WHERE dp.pangkat = p.id_masterpangkat and dp.jabatan = j.id_masterjabatan and dp.divisi = u.id_unitkerja and dp.profesi = pr.id_profesi and dp.status_pegawai = jp.id_jenispegawai and dp.jenjang = pd.id_masterpendidikan and nip='$id';");

        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return false;
        }
    }


    public function get_id_pegawai_adminnonpns($id)
    {
        // $hasil = $this->db->where('nip', $id)->get('data_pegawai');
        $hasil = $this->db->query("SELECT * FROM data_pegawai dp, unitkerja u, jabatan_nonpns jp, jenis_pegawai j, pendidikan pd, profesi pr WHERE dp.divisi = u.id_unitkerja AND dp.jabatan = jp.id_jabatannonpns AND dp.status_pegawai = j.id_jenispegawai and dp.jenjang = pd.id_masterpendidikan AND dp.profesi = pr.id_profesi AND nip='$id';");
        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return false;
        }
    }

	public function get_id_pendidikan($id)
	{
		$hasil = $this->db->where('nip', $id)->get('data_pendidikan');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}


	public function get_data_pangkat_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM pangkat p, data_pangkat dp where p.id_masterpangkat = dp.pangkat and dp.nip = $nip;");
        return $query->result();
    }

    public function get_data_jabatan_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM jabatan j, data_jabatan dj where j.id_masterjabatan = dj.jabatan and dj.nip = $nip;");
        return $query->result();
    }

    public function get_data_pendidikan_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_pendidikan p where p.id_pendidikan = $id;");
        return $query->row();
    }

    public function get_data_pangkat_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_pangkat p where p.id_pangkat = $id;");
        return $query->row();
    }


    public function get_data_jabatan_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_jabatan p where p.id_jabatan = $id;");
        return $query->row();
    }

    public function get_data_pasangan_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_pasangan p where p.id_pasangan = $id;");
        return $query->row();
    }


    public function get_data_anak_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_anak p where p.id_anak = $id;");
        return $query->row();
    }


    public function get_data_diklat_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_diklat p where p.id_diklat = $id;");
        return $query->row();
    }


    public function get_data_berkas_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM data_berkas p where p.id_berkas = $id;");
        return $query->row();
    }


    public function get_data_anak_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_anak WHERE nip='$nip';");
        return $query->result();
    }

    public function get_data_anak_personal2($id)
    {
        $query = $this->db->query("SELECT * FROM data_anak WHERE nip='$id';");
        return $query->result();
    }


    public function get_data_pasangan_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_pasangan WHERE nip='$nip';");
        return $query->result();
    }


    public function get_data_pasangan_personal2($id)
    {
        $query = $this->db->query("SELECT * FROM data_pasangan WHERE nip='$id';");
        return $query->result();
    }


    
     public function get_data_gaji_berkala($nip)
    {
        // $query = $this->db->query("SELECT * FROM data_gajiberkala WHERE nip='$nip';");
        $query = $this->db->query("SELECT * FROM pangkat p, data_gajiberkala dp where p.id_masterpangkat = dp.pangkat and dp.nip = $nip;");
        return $query->result();
    }


    public function get_data_diklat_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_diklat WHERE nip='$nip';");
        return $query->result();
    }


    public function get_data_diklat_personal2($id)
    {
        $query = $this->db->query("SELECT * FROM data_diklat WHERE nip='$id';");
        return $query->result();
    }


    public function get_data_kompetensi_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_kompetensi WHERE nip='$nip';");
        return $query->result();
    }

    public function get_data_berkas_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_berkas db, jenis_berkas jb WHERE db.jberkas = jb.id_jenisberkas and nip='$nip';");
        return $query->result();
    }

    public function get_data_berkas_personal2($id)
    {
        $query = $this->db->query("SELECT * FROM data_berkas db, jenis_berkas jb WHERE db.jberkas = jb.id_jenisberkas and nip='$id';");
        return $query->result();
    }


    public function get_data_cuti_personal($nip)
    {
        $query = $this->db->query("SELECT * FROM data_cuti where nip = $nip;");
        return $query->result();
    }


    public function get_jenispegawai(){
     $query = $this->db->get('jenis_pegawai')->result();
     return $query;
    }


    public function get_jenisprofesi(){
     $query = $this->db->get('profesi')->result();
     return $query;
    }


    public function get_jenisberkas(){
     $query = $this->db->get('jenis_berkas')->result();
     return $query;
    }


    public function get_jenjangpendidikan(){
     $query = $this->db->get('pendidikan')->result();
     return $query;
    }


    public function hitung_kp()
    {   
        $nilaiawal = 0;

        // $query = $this->db->query("SELECT * FROM data_pegawai data_pegawai dp, pangkat p WHERE dp.pangkat = p.id_masterpangkat and MONTH(dp.kp_mendatang) = MONTH(CURDATE());");

        //$query = $this->db->query("SELECT * FROM data_pegawai dp, pangkat p WHERE MONTH(kgb_mendatang) = MONTH(CURDATE()) and dp.pangkat = p.id_masterpangkat;");

        $query = $this->db->query("SELECT * from data_pegawai where kp_mendatang between date(now()) and date(date_add(now(), interval +3 month));");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function hitung_kgb()
    {   
        $nilaiawal = 0;

        $query = $this->db->query("SELECT * from data_pegawai where kgb_mendatang between date(now()) and date(date_add(now(), interval +3 month));");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function hitung_diklat()
    {   
        $nilaiawal = 0;

        // $query = $this->db->query("SELECT * FROM data_diklat WHERE MONTH(berlaku_sampai) = MONTH(CURDATE());");

        $query = $this->db->query("SELECT * from data_diklat where berlaku_sampai between date(now()) and date(date_add(now(), interval +3 month));");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function hitung_diklat_pegawai($nip)
    {   
        $nilaiawal = 0;

        // $query = $this->db->query("SELECT * FROM data_diklat WHERE MONTH(berlaku_sampai) = MONTH(CURDATE());");

        $query = $this->db->query("SELECT * from data_diklat where berlaku_sampai between date(now()) and date(date_add(now(), interval +3 month)) and nip = '$nip';");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }



    public function hitung_komepetensi_expired_pegawai($nip)
    {   
        $nilaiawal = 0;


        $query = $this->db->query("SELECT * from data_kompetensi where tgl_expired between date(now()) and date(date_add(now(), interval +3 month)) AND nip = '$nip' ORDER BY tgl_expired DESC;");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    // public function hitung_total_pegawai()
    // {   
    //     $nilaiawal = 0;

    //     $query = $this->db->query("SELECT * FROM data_pegawai;");
        
    //     if($query->num_rows()>0)
    //     {
    //       return $query->num_rows();
    //     }
    //     else
    //     {
    //       return 0;
    //     }
    // }


    public function hitung_total_pns()
    {   
        $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM data_pegawai WHERE status_pegawai='1';");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function hitung_total_pppk()
    {   
        $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM data_pegawai WHERE status_pegawai='2';");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function hitung_total_non_pns()
    {   
        $nilaiawal = 0;

        $query = $this->db->query("SELECT * FROM data_pegawai WHERE status_pegawai='3';");
        
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

	

}

?>